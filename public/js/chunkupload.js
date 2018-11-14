/*upload chunk script


	const BYTES_PER_CHUNK = 1024 * 1024; // 1MB chunk sizes.
	var slices; // slices, value that gets decremented
	var slicesTotal; // total amount of slices, constant once calculated
	
	/**
	 * Calculates slices and indirectly uploads a chunk of a file via uploadFile()
	**/
	function sendRequest() {
		var xhr;
		var blob = document.getElementById('fileToUpload').files[0];
	
		var start = 0;
		var end;
		var index = 0;
	
		// calculate the number of slices 
		slices = Math.ceil(blob.size / BYTES_PER_CHUNK);
		slicesTotal = slices;
	
		while(start < blob.size) {
			end = start + BYTES_PER_CHUNK;
			if(end > blob.size) {
				end = blob.size;
			}
	
			uploadFile(blob, index, start, end);
	
			start = end;
			index++;
		}
		return false;
	}
	
	/**
	 * Blob to ArrayBuffer (needed ex. on Android 4.0.4)
	**/
	var str2ab_blobreader = function(str, callback) {
		var blob;
		BlobBuilder = window.MozBlobBuilder || window.WebKitBlobBuilder || window.BlobBuilder;
		if (typeof(BlobBuilder) !== 'undefined') {
		  var bb = new BlobBuilder();
		  bb.append(str);
		  blob = bb.getBlob();
		} else {
		  blob = new Blob([str]);
		}
		var f = new FileReader();
		f.onload = function(e) {
			callback(e.target.result)
		}
		f.readAsArrayBuffer(blob);
	}
	
	function uploadFile(blob, index, start, end) {
		var xhr;
		var end;
		var chunk;
	
		xhr = new XMLHttpRequest();
	
		xhr.onreadystatechange = function() {
			if(xhr.readyState == 4) {
				if(xhr.responseText) {
					alert(xhr.responseText);
				}
	
				slices--;
	
				// if we have finished all slices
				if(slices == 0) {
					mergeFile(blob);
				}
			}
		};
	
		if (blob.webkitSlice) {
			chunk = blob.webkitSlice(start, end);
		} else if (blob.mozSlice) {
			chunk = blob.mozSlice(start, end);
		} else {
			chunk = blob.slice(start, end); 
		}
	
		xhr.addEventListener("load",  function (evt) {
			var percentageDiv = document.getElementById("percent");  
			var progressBar = document.getElementById("progressBar"); 
	
			progressBar.max = progressBar.value = 100;  
			percentageDiv.innerHTML = "100%";  
		}, false);
	
		xhr.upload.addEventListener("progress", function (evt) {
			var percentageDiv = document.getElementById("percent");  
			var progressBar = document.getElementById("progressBar");
	
			if (evt.lengthComputable) {
				progressBar.max = slicesTotal;  
				progressBar.value = index;  
				percentageDiv.innerHTML = Math.round(index/slicesTotal * 100) + "%";  
			} 
		}, false);
	
	
		xhr.open("post", "upload.php", true);
		xhr.setRequestHeader("X-File-Name", blob.name);             // custom header with filename and full size
		xhr.setRequestHeader("X-File-Size", blob.size);
		xhr.setRequestHeader("X-Index", index);                     // part identifier
		
		if (blob.webkitSlice) {                                     // android default browser in version 4.0.4 has webkitSlice instead of slice()
			var buffer = str2ab_blobreader(chunk, function(buf) {   // we cannot send a blob, because body payload will be empty
				   xhr.send(buf);                                      // thats why we send an ArrayBuffer
			});	
		} else {
			xhr.send(chunk);                                        // but if we support slice() everything should be ok
		}
	}
	
	/**
	 *  Function executed once all of the slices has been sent, "TO MERGE THEM ALL!"
	**/
	function mergeFile(blob) {
		var xhr;
		var fd;
		var compaignnamechunk = document.getElementById('compaignnamechunk').value;
		xhr = new XMLHttpRequest();
	
		fd = new FormData();
		fd.append("compaignnamechunk", compaignnamechunk);
		fd.append("name", blob.name);
		fd.append("index", slicesTotal);
	
		xhr.open("POST", "merge.php", true);
		xhr.send(fd);
		
		//server response
		xhr.onreadystatechange = function() {
  if (xhr.readyState === 4)  { 
	var serverResponse = xhr.responseText;
	if(xhr.responseText==='1'){
		alert("import successfully");
	}
  }
};


		//

	}
	
	
	//-upload chunk script