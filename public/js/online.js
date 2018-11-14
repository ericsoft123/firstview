
// JavaScript Document
$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

$(function(){
//
$.ajax({
	url:"./get_formshare",
	type:"get",
	
	success:function(data){
	
		$('#overflow_package').html(data);

			//	
		
	
		
		
	}
});
//
});





function getformshare_option(){
	'use strict';
	//when only there is package_name
//alert("done");
var package_name = $("#package_name option:selected").val(); 
var compaign_id = $("#compaign_id").val(); 
var package_option = $("#package_option option:selected").val(); 

	var packageoption_available=$('#packageoption_available').val();
	//alert(packageoption_available);
	
		//
		$.ajax({
			url:"./getformshare_option",
			type:"get",
			data:{package_name:package_name,package_option:package_option,compaign_id:compaign_id,packageoption_available:packageoption_available},
			success:function(data){
			
				$('#packagecover_div').html(data);
		
					//	
				
			
				
				
			}
		});
		//
	
	
	return false;
}





$(document).ready(function(){
	//$('#statusModal').show();
	"use strict";
	$('#saledata').click(function(ev){
		$.ajax({
			url:"./onlinecapture",
			type:"post",
			data:$('#onlineform').serialize(),
			success:function(data){
				var message=data.message;
			//alert(message);
				
					if(message===1){
						
						///
						
						swal({
                title: "well Done!",
               text:"Your agent users has been inserted successful",
                type: "success"
	 
          });
					
				$('.confirm').click(function(){
			
				location.reload(); 
						$('.capture').val("");
			  
		  });
						
						
						///
					}
				else if(message===2){
					
					////
					
					swal({
                title: "something wrong",
               text:"unfortunatelly we are unable to process this request",
                type: "error"
	 
          });
				
					
					
					///
					
					
				}
				
				
				
			}
			
		});
		
		ev.preventDefault();
	});
	
});