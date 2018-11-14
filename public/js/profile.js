// JavaScript Document
$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

function addnew(){
	$('#companyform').attr('action',"add_company");
	$('.company_title').text("Add New Company");
	$('#companymodal').modal('show');
	$('#edit_company').hide();
	$('#add_company').show();

	$('.form-control').val("");
	return false;
}

/*$('#add_company').click(function(ev){
//


var company_name=$('#company_name').val();
if(company_name==''){
	alert("please Fill Company Name field?");
}
else{

//
$.ajax({
	url:"add_company",
	type:"post",
	data:$('#companyform').serialize(),
	success:function(data){

		if(data.message===0){
			alert("this Company is available please add new Company");
		}
		else if(data.message===1){
			alert("New company has been created successfuly");
			getcompany();
			$('.form-control').val("");
		}
		
		
//alert("done");
	
}

});

//
}

//
	ev.preventDefault();
});*/


/*$('#edit_company').click(function(ev){
	//
	
	
	var company_name=$('#company_name').val();
	if(company_name==''){
		alert("please Fill Company Name field?");
	}
	else{
	
	//
	$.ajax({
		url:"edit_company",
		type:"post",
		data:$('#companyform').serialize(),
		success:function(data){
	
			if(data.message===0){
				alert("this Company is available please add new Company");
			}
			else if(data.message===1){
				alert("Your Company has been successfully edited");
				getcompany();
				//$('.form-control').val("");
			}
			
			
	//alert("done");
		
	}
	
	});
	
	//
	}
	
	//
		ev.preventDefault();
	});*/

function view_company(id,company_name,company_email,company_website,company_desc,company_model,rand_value,company_logo){

	$('#companydetail_modal').modal('show');
	$('.company_name').text(company_name);
	$('.company_email').text(company_email);
	$('.company_website').text(company_website);
	$('.company_desc').text(company_desc);
	$('.company_model').text(company_model);
	$('.rand_value').text(rand_value);
	$('.company_logo').html('<img src="'+company_logo+'" style="width:200px;height:auto;">');
}


function viewedit_company(id,company_name,company_email,company_website,company_desc,company_model,rand_value,company_logo){

	$('#companyform').attr('action',"edit_company");

	$('.company_title').text("Edit New Company");
	$('#companymodal').modal('show');
	$('#edit_company').show();
	$('#add_company').hide();
	$('#company_logo').val(company_logo);
	


	$('#id_company').val(id);
	$('#company_name').val(company_name);
	$('#company_email').val(company_email);
	$('#company_website').val(company_website);
	$('#company_desc').val(company_desc);
	$('#company_model').val(company_model);
	$('#rand_value').val(rand_value);
}

function viewdelete_company(id,company_name,company_logo){
$('#deletemodal').modal('show');
	$('#id_delete').val(id);
	$('.companyname_title').text(company_name);
	$('#company_logo').val(company_logo);
	
}

	



	function confirmdelete(){
		//
		var company= $('.companyname_title').text();
		$.ajax({
			url:"delete_company",
			type:"post",
			data:$('#companyform').serialize(),
			success:function(data){
		
				
			 if(data.message===1){
					alert("You have successfully deleted "+company);
					getcompany();
					$('#deletemodal').modal('hide');
				}
				
				
		//alert("done");
			
		}
		
		});
		//
		return false;
	}












$(function(){
	getcompany();
	//$('#companymodal').modal('show');
	
	/*var jsonStr = $("pre").text();
	var jsonObj = JSON.parse(jsonStr);
	var jsonPretty = JSON.stringify(jsonObj, null, '\t');
	
	$("pre").text(jsonPretty);*/
});




$('#logotest').click(function(ev){
//
/*var img = document.getElementById('logo'); 
//or however you get a handle to the IMG
var width = img.clientWidth;
var height = img.clientHeight;*/
//var ext = fileName.split('.').pop();
var width=110;
var height=100;

if(width>=100 && height>=100){
alert("done");
}
else{
	alert("failed");
}

//
ev.preventDefault();
});



//
$("body").on("click","#add_company",function(e){




    $(this).parents("form").ajaxForm(options);
	 
	 
	 /*alert(response.done);
	 location.reload();*/
	 
  });


  var options = { 
    complete: function(response) 
    {
		
    	if($.isEmptyObject(response.responseJSON.error)){
    		//$("input[name='title']").val('');
			
			if(response.responseJSON.message===0)
			{
			
				alert("this Company is taken. please add new Company");
				//location.reload();
			}
			else if(response.responseJSON.message===1){
				alert("New company has been created successfuly");
				getcompany();
				$('.form-control').val("");
			}
			else if(response.responseJSON.message===2){
				alert("please make sure logo must be minimum 100*100");
			}
			else if(response.responseJSON.message===3){
				alert("please use right format");
			}

			
			
			
			
			///
			
				

			
			
			
			
			///
			
			
    	}else{
    		printErrorMsg(response.responseJSON.error);
    	}
    }
  };



  $("body").on("click","#edit_company",function(e){




    $(this).parents("form").ajaxForm(options);
	 
	 
	 /*alert(response.done);
	 location.reload();*/
	 
  });


  var options = { 
    complete: function(response) 
    {
		
    	if($.isEmptyObject(response.responseJSON.error)){
    		//$("input[name='title']").val('');
			
			if(response.responseJSON.message===0)
			{
			
				alert("this Company is taken. please add new Company");
				//location.reload();
			}
			else if(response.responseJSON.message===1){
				alert("Query has been executed successfuly");
				getcompany();
				$('.form-control').val("");
			}
			else if(response.responseJSON.message===2){
				alert("please make sure logo must be minimum 100*100");
			}
			else if(response.responseJSON.message===3){
				alert("please use right format");
			}

			
			
			
			
			///
			
				

			
			
			
			
			///
			
			
    	}else{
    		printErrorMsg(response.responseJSON.error);
    	}
    }
  };