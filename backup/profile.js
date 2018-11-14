// JavaScript Document
$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});
//draw


///



$(document).ready(function(){
	
	"use strict";
	$('#payme').click(function(ev){
		$.ajax({
			url:"./payme",
			type:"get",
			data:$('#submit_invest').serialize(),
			success:function(data){
				var message=data.message;
			//alert(message);
				
				swal({
                title: "well Done!",
               text:message,
                type: "success"
	 
          });
				$('#close').click();
				location.reload();
			}
			
		});
		
		ev.preventDefault();
	});
	
});

$(document).ready(function(){
	
	"use strict";
	$('#btcpayme').click(function(ev){
		$.ajax({
			url:"./btc_payme",
			type:"get",
			data:$('#submit_invest').serialize(),
			success:function(data){
				var message=data.message;
			//alert(message);
				
				swal({
                title: "well Done!",
               text:message,
                type: "success"
	 
          });
				location.reload();
				$('#close').click();
			}
			
		});
		
		ev.preventDefault();
	});
	
});

///


function approve(id)
{
	"use strict";
	$.ajax({
		url:"./approve",
		type:"get",
		data:{id:id},
		success:function(data){
			//$('#btcconfirm').hide();
			$('#confirm').show();
			$('#user_approveid').val(data.allocate[0].id);
			$('#user_approve').val(data.allocate[0].user_asktopay);
			$('#user_approvestatus').val(data.allocate[0].button_status);
			$('#user_approveamount').val(data.allocate[0].user_asktopayamount);
			$('#user_approvetype').val(data.allocate[0].invest_type);
			
		}
	});
}

function btcapprove(id)
{
	"use strict";
	$.ajax({
		url:"./approve",
		type:"get",
		data:{id:id},
		success:function(data){
			$('#btcconfirm').show();
			$('#randconfirm').hide();
			$('#user_approveid').val(data.allocate[0].id);
			$('#user_approve').val(data.allocate[0].user_asktopay);
			$('#user_approvestatus').val(data.allocate[0].button_status);
			$('#user_approveamount').val(data.allocate[0].user_asktopayamount);
			$('#user_approvetype').val(data.allocate[0].invest_type);
			
			
		}
	});
}



//
//function get_service(){
//	'use strict';
//	$.ajax({
//		url:"./get_service",
//		type:"get",
//		success:function(data){
//			$('#services_name').html(data);
//			//alert("get");
//			
//			$('#service_message').html(data);
//		}
//	});
//}

///user created by admin
///load table ///



///load table ///

//update  profile

$(document).ready(function(){
	
	"use strict";
	$('#update_profile').click(function(ev){
		$.ajax({
			url:"./update_profile",
			type:"post",
			data:$('#submit_invest').serialize(),
			success:function(data){
				var message=data.message;
				swal({
                title: "well Done!",
               text:message,
                type: "success"
	 
          });
			}
			
		});
		
		ev.preventDefault();
	});
	
});




//update profile



///ask to pay
$(document).ready(function(){
	
	"use strict";
	$('#asktopay').click(function(ev){
		$.ajax({
			url:"./asktopay",
			type:"post",
			data:$('#submit_invest').serialize(),
			success:function(data){
				var message=data.message;
			//alert(message);
				
					swal({
                title: "well Done!",
               text:message,
                type: "success"
	 
          });
				location.reload();
			}
			
		});
		
		ev.preventDefault();
	});
	
});
//ask to pay


$(document).ready(function(){
	
	"use strict";
	$('#btcasktopay').click(function(ev){
		$.ajax({
			url:"./btc_asktopay",
			type:"post",
			data:$('#submit_invest').serialize(),
			success:function(data){
				var message=data.message;
			//alert(message);
				
					swal({
                title: "well Done!",
               text:message,
                type: "success"
	 
          });
				
				location.reload();
			}
			
		});
		
		ev.preventDefault();
	});
	
});
//ask to pay

///payme
/*$(document).ready(function(){
	
	"use strict";
	$('#btcpayme').click(function(ev){
		$.ajax({
			url:"./payme",
			type:"post",
			data:$('#submit_invest').serialize(),
			success:function(data){
				var message=data.message;
			//alert(message);
					swal({
                title: "well Done!",
               text:message,
                type: "success"
	 
          });
				
				location.reload();
			}
			
		});
		
		ev.preventDefault();
	});
	
})*/
//payme

$(document).ready(function(){
	"use strict";
	$('#amount').keydown(function(){
		var amount=$('#amount').val();
		var interest=(amount*50)/100;
		var total_amount=parseInt(amount)+interest;
		$('#total_amount').val(total_amount);
	});
});
$(document).ready(function(){
	"use strict";
	$('#amount').keyup(function(){
		var amount=$('#amount').val();
		var interest=(amount*50)/100;
		var total_amount=parseInt(amount)+interest;
		$('#total_amount').val(total_amount);
	});
});


$(document).ready(function(){
	"use strict";
	$('#btc').keydown(function(){
		var amount=$('#btc').val();
		var interest=(amount*100)/100;
		var total_amount=parseFloat(amount)+interest;
		$('#btc_total').val(total_amount);
	});
});
$(document).ready(function(){
	"use strict";
	$('#btc').keyup(function(){
		var amount=$('#btc').val();
		var interest=(amount*100)/100;
		var total_amount=parseFloat(amount)+interest;
		$('#btc_total').val(total_amount);
	});
});




///////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////

//load data when apps running

$(document).ready(function(){
	//secret is to hide when login and control with account function
	"use strict";
	
	
	
});

///
//$("input").attr('disabled','disabled');
//To enable again, the proper method is to use .removeAttr()
//
//$("input").removeAttr('disabled');

///