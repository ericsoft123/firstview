function buildTable(results){
//console.log(results);

	var markup = "<table class='table table-striped table-bordered table-hover' id='upload_table'>";
	var data = results.data;
		//alert(data.length);
		if(data.length<=10){
			//it is a time  where data will be less than 10 here i will load all table
			for(count=0;count<data.length;count++){
				markup+= "<tr>";
				var row = data[count];
				var cell_data  = row.join(",").split(",");
				
				for(cell_count=0;cell_count<cell_data.length;cell_count++){
					 if(count === 0)
			  {
			   markup += `<th>${cell_data[cell_count]}<input type="button" value="Map this column ${cell_count}" onclick="return test('${cell_count}')"></th>`;
				  
			  }
			  else
			  {
			   markup += '<td>'+cell_data[cell_count]+'</td>';
			  }
					
				}
				markup+=`</tr>`;
			}
			
			markup+= "</table>";
			
			
			$("#app").html(markup);

			//it is a time  where data will be less than 10 here i will load all table
		}
		else{
			data.length=5;//here i will load only 5 unity

			//

			for(count=0;count<data.length;count++){
				markup+= "<tr>";
				var row = data[count];
				var cell_data  = row.join(",").split(",");
				
				for(cell_count=0;cell_count<cell_data.length;cell_count++){
					 if(count === 0)
			  {
			   markup += `<th>${cell_data[cell_count]}<input type="button" value="Map this column ${cell_count}" onclick="return test('${cell_count}','${cell_data[cell_count]}')"></th>`;
				  
			  }
			  else
			  {
			   markup += '<td>'+cell_data[cell_count]+'</td>';
			  }
					
				}
				markup+=`</tr>`;
			}
			
			markup+= "</table>";
			
			
			$("#app").html(markup);


			//
		}
	
	
}


$(document).ready(function(){
		$('#submit').on("click",function(e){
			e.preventDefault();
			if (!$('#fileToUpload')[0].files.length){
				alert("Please choose at least one file to read the data.");
			}
		
			$('#fileToUpload').parse({
				config: {
					delimiter: "auto",
					complete: buildTable,
				},
				before: function(file, inputElem)
				{
					//console.log("Parsing file...", file);
				},
				error: function(err, file)
				{
					console.log("ERROR:", err, file);
				},
				complete: function()
				{
					//console.log("Done with all files");
				}
			});
		});
});

function test(i,j){
		$('#map_index').val(i);
		$('#map_name').val(j);
		$('#title_selected').text(j);
		$('#maptablemodal').show();
		false;
	}