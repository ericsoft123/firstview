// JavaScript Document
$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

////////////////////EDIT PROFILE///////////////////////////////////////////////////////////////////////////
$(document).ready(function(){
	"use strict";
	$('#editprofile').click(function(eve){
		////////////////////
		
		
	
		
		
		
		
		
		
		//////////////
		$.ajax({
			url:"./editprofile",
			type:"post",
			data:$('#formeditprofile').serialize(),
			success:function(){
					
				//.hide();
				
				//location.reload();
				$('#closedone').click();
				
				
			}
			
		});
		
		eve.preventDefault();
	});
});


///////////////////////////////////////////////////////////////////////////////////////////////////////////

///TRIANGLE SPLIT/////
function trianglesplit()
{
	$.ajax({
		url:"./trianglesplit",
		type:"get",
		success:function()
		{
			
		}
	});
}

//////////


//////////////////////////////////MAIN CONTROLLER FUNCTION/////////////////////////////////////////////////////
function account()
{
	//this will give us full multi control application without strugling
"use strict";	
	$.ajax({
		url:"./account",
		type:"get",
		success:function(data){
			//console.log(data.profile);
			console.log(data.users);
			console.log(data.users[0].platform);
			var platform=data.users[0].platform;
			var child_money=data.users[0].child_money;
			if(platform==='none')
				{
					//$('#values').hide();
					//this is on first Registration  Method by Activating His Account //for new Register users
					
					check_reg_charge();
					
				$('.activate').attr('id','creator_activated');//To activate registration on mini triangle 
				
				$('.activate').text('Convert in Bitcoin');
				//remove .activate class
				
				//$('.activate').removeClass('activate');
				//remove .activate class
				//////////////////////////////
					
					$('#registration_charge').val('200');
				$('#registration_charge').attr('readonly','readyonly');
				
					
					/////////////////////
					$('#none').hide();
					$('#complete').show();
					$('#formname').text("Complete Your Profile By Activating your Account");
					$('#nextstep').text('Creating A Triangle By Investing ');
					
				}
			else if(platform==='creator_activated'){//something wrong
				//This is for The Reinvest Users or Registers users who what to be creator after clicking Reinvest button ;Reinvest button will update platform to Creator_activated
				check_pay();
			    moneyvalidation();
				$('#creator_money').attr("placeholder", "Enter Values Between 500 - 500000");
				$('#formname').text("Create A Triangle.");
				$('#child2').hide();
				$('#child1').hide();
				$('#platformdata').hide();
				$('#registrationchargedata').hide();
				$('#none').show();
				$('#complete').show();
			     $('.activate').text('Submit');
				$('.activate').attr('id','sbv');//to create a table with child
				$('#bitcoin_address').val(data.users[0].bitcoin_address);
				//$('#bitcoin_addressdata').hide();
				$('#nextstep').text('Is To  Add Users in Your Triangle');
			}
			else if(platform==='creatormini_activated'){//something wrong
			$('#creator_money').attr("placeholder", "Enter Values Between 500 - 500000");
				$('#formname').text("Create A Triangle.");
				$('#child2').hide();
				$('#child1').hide();
				$('#platformdata').hide();
				$('#registrationchargedata').hide();
				$('#none').show();
				$('#complete').show();
			     $('.activate').text('Submit');
				$('.activate').attr('id','sbvmini');//to create a table with child
				$('#bitcoin_address').val(data.users[0].bitcoin_address);
				//$('#bitcoin_addressdata').hide();
				$('#nextstep').text('Is To  Add Users in Your Triangle');
			}
			else if(platform==='sbvanotherchild')
				{
					//take money to mainwallet
					
					mainwallet();
					
					checkstatus();
					//where one child is added through sbv then we want to add the last new child with
					//sbvanotherchild Method
					//$('#creator_money').attr("placeholder", "Enter Values Between 500 - 500000");
				$('#formname').text("Add A Standard User 1");
				$('#child2').hide();
				$('#platformdata').hide();
				$('#registrationchargedata').hide();
				$('#creator_money').val(child_money);
				/*$('#int_wallet').val(data.users[0].internal_wallet);
				$('#btc_creamoney').val(data.users[0].btc_childmoney);*/
					$('#int_wallet').val(data.users[0].internal_wallet);
				$('#btc_creamoney').val(data.users[0].btc_childmoney);
					
				$('#creator_moneydata').hide();
				$('#none').show();
				$('#complete').show();
			     $('.activate').text('Submit');
				$('.activate').attr('id','sbvanotherchild');//to create a table with child
				
				$('#bitcoin_addressdata').hide();
					$('#nextstep').text('To Add Next User To Your Triangle');
				}
			else if(platform==='sbvminianotherchild')
				{
					//checkstatus();
					//where one child is added through sbvmini then we want to add the last new child with
					//sbvminianotherchild Method
					$('#formname').text("Add A Standard User 1");
				$('#child2').hide();
				$('#platformdata').hide();
				$('#registrationchargedata').hide();
				$('#creator_money').val(child_money);
				$('#creator_moneydata').hide();
				$('#none').show();
				$('#complete').show();
			     $('.activate').text('Submit');
				$('.activate').attr('id','sbvminianotherchild');//to create a table with child
				$('#bitcoin_addressdata').hide();
				$('#int_wallet').val(data.users[0].internal_wallet);	
				}
			else if(platform==='sbvnextchild')
				{
					mainwallet();
					//checkstatus();
					$('#int_wallet').val(data.users[0].internal_wallet);
				$('#btc_creamoney').val(data.users[0].btc_childmoney);
					$('#formname').text("Add A Standard User 2");
				$('#child2').hide();
				$('#platformdata').hide();
				$('#registrationchargedata').hide();
				$('#creator_money').val(child_money);
				$('#creator_moneydata').hide();
				$('#none').show();
				$('#complete').show();
			     $('.activate').text('Submit');
				$('.activate').attr('id','sbvnextchild');//to create a table with child
				$('#int_wallet').val(data.users[0].internal_wallet);
				$('#bitcoin_addressdata').hide();
				$('#nextstep').text('is to see In Our Profile About Triangle');	
				}
			else if(platform==='sbvmininextchild')
				{
					checkstatus();
					$('#formname').text("Add A Standard User 2");
				$('#child2').hide();
				$('#platformdata').hide();
				$('#registrationchargedata').hide();
				$('#creator_money').val(child_money);
				$('#creator_moneydata').hide();
				$('#none').show();
				$('#complete').show();
			     $('.activate').text('Submit');
				$('.activate').attr('id','sbvmininextchild');//to create a table with child
				$('#bitcoin_addressdata').hide();
					$('#int_wallet').val(data.users[0].internal_wallet);
					
				}
			else if(platform==='sbvfilled')
				{
					$('body').css('background-color','#312c32');
					$('#sbvfilled').show();
					$('#int_wallet').val(data.users[0].internal_wallet);
				}
			else if(platform==='sbvminifilled')
				{
					$('#sbvfilled').show();
					$('body').css('background-color','#312c32');
					$('#int_wallet').val(data.users[0].internal_wallet);
				}
			else if(platform==='sbvprofile')//this is withdraw
				{
					getsbvtriangle();
					getcountervcm();
				$('body').css('background-color','#2b3e50');
					
				$('#profile').show();
			    $('#withdraw').show();
					$('#int_wallet').val(data.users[0].internal_wallet);
					$('#bitcoin_address').val(data.users[0].bitcoin_address);
					//alert(data.users[0].internal_wallet);
					$('#nextstep').text('May Be To Invest Again in Our Business');
				}
			else if(platform==='sbvminiprofile')//this is withdraw
				{
					$('#complete').hide();
					$('#profile').show();
					$('#withdraw').show();
					$('#int_wallet').val(data.users[0].internal_wallet);
				}
			else if(platform==='sbvreinvest')//this is Reinvest
				{
					getsbvtriangle();
					getcountervcm();
				$('body').css('background-color','#2b3e50');
					
				$('#profile').show();
					$('#reinvest').show();
					
					$('#int_wallet').val(data.users[0].internal_wallet);
					$('#nextstep').text('May Be To Invest Again in Our Business');
				}
			else if(platform==='sbvminireinvest')//this is Reinvest
				{
					$('#complete').hide();
					$('#profile').show();
					$('#reinvest').show();
					$('#int_wallet').val(data.users[0].internal_wallet);
				}
			else if(platform==='child_grand'){
				check_childrecharge();
				checkstatus();
				//here child is going to pay registration fees by Activating his/her Account
				//$('#complete').hide();
				$('#editmodal').show();
				$('#formname').text("Activate Your Account Note:One Transaction will be Occured.");
				$('#registration_charge').val('200');
				$('#registration_charge').attr('readonly','readyonly');
				//$('#creatortext').text("Money to Invest");
				$('#creator_money').val(child_money);
				$('#creator_money').attr('readonly','readyonly');
				
				$('#platformdata').hide();
				$('#none').hide();
				$('#complete').show();
				$('.activate').attr('id','activate_childgrand');
				$('#nextstep').text('To Invest Money In this Business');
				$('#int_wallet').val(data.users[0].internal_wallet);
			}
			else if(platform==='child_minis'){
				checkstatus();
				//here child is going to pay registration fees by Activating his/her Account
				//$('#complete').hide();
				$('#editmodal').show();
				$('#formname').text("Activate Your Account Note:One Transaction will be Occured.");
				$('#registration_charge').val('20');
				$('#registration_charge').attr('readonly','readyonly');
				
				$('#creator_money').val(child_money);
				$('#creator_money').attr('readonly','readyonly');
				$('#platformdata').hide();
				$('#none').hide();
				$('#complete').show();
				$('.activate').attr('id','activate_childmini');
				$('#int_wallet').val(data.users[0].internal_wallet);
			}
			else if(platform==='childgrand_activated'){
				check_childpaye();
				checkstatus();
				$('#formname').text("Invest on This Triangle Note:One Transaction will be Occured.");
				$('.registration_charge').attr('id','child_money');
				$('.registration_charge').attr('name','child_money');
				$('#child_money').val(child_money);
				$('#child_money').attr('readonly','readyonly');
				$('#childmoneytext').text("Money to Invest");
				$('#platformdata').hide();
				$('#none').hide();
				$('#complete').show();
				$('.activate').attr('id','childgrand_activated');
				$('.activate').text('Invest On This Triangle');
				$('#nextstep').text('To  wait Other child and Then start own Triangle ');
				$('#bitcoin_address').val(data.users[0].bitcoin_address);
				$('#int_wallet').val(data.users[0].internal_wallet);
			}
			else if(platform==='childmini_activated')
				{
					checkstatus();
					$('#formname').text("Invest on This Triangle Note:One Transaction will be Occured.");
				$('.registration_charge').attr('id','child_money');
				$('.registration_charge').attr('name','child_money');
				$('#child_money').val(child_money);
				$('#child_money').attr('readonly','readyonly');
				$('#childmoneytext').text("Money to Invest");
				$('#platformdata').hide();
				$('#none').hide();
				$('#complete').show();
					$('.activate').attr('id','childmini_activated');
					$('.activate').text('Invest On This Triangle');
					$('#bitcoin_address').val(data.users[0].bitcoin_address);
					$('#int_wallet').val(data.users[0].internal_wallet);
				}
			else if(platform==='child1_invested')
				{
					trianglesplit();
					$('body').css('background-color','#173e43');
					$('#childfilled').show();
						$('#complete').hide();
					
					$('#int_wallet').val(data.users[0].internal_wallet);
				}
			else if(platform==='child_trianglesplit')
				{
						$('#complete').hide();
					$('#int_wallet').val(data.users[0].internal_wallet);
				}
			else if(platform==='admin')
				{
					$('body').css('background-color','#22264b');
					getAdminData();
					$('#admin').show();
					$('#int_wallet').val(data.users[0].internal_wallet);
					$('#bitcoin_address').val(data.users[0].bitcoin_address);
					$('#adminregister').show();
					
				}
			else if(platform==='adminregister')
				{
					$('body').css('background-color','#22264b');
					
					$('#adminregister').show();
					
				}
			else if(platform==='super_childgrand')// super triangle
				{
				//nukuvugango button ya super igomba kuba ihari 	
					supercheck_childrecharge();
				    checkstatus();
				//here child is going to pay registration fees by Activating his/her Account
				//$('#complete').hide();
				$('#editmodal').show();
				$('#formname').text("Activate Your Account Note:One Transaction will be Occured.");
				$('#registration_charge').val('200');
				$('#registration_charge').attr('readonly','readyonly');
				//$('#creatortext').text("Money to Invest");
				$('#creator_money').val(child_money);
				$('#creator_money').attr('readonly','readyonly');
				
				$('#platformdata').hide();
				$('#none').hide();
				$('#complete').show();
				$('.activate').attr('id','activate_superchildgrand');
				$('#nextstep').text('To Invest Money In this Business');
				$('#int_wallet').val(data.users[0].internal_wallet);
				}
			else if(platform==='superchildgrand_activated')
				{
					$('#youwillget').css("font-size","25px");
					$('#supermoneydisplay').css("font-size","25px");
					$('#youwillget').text("Invest  ");
					
						$('#supermoneydisplay').text(" In This Triangle");
					$('#view_supertriangle').click();
				}
			else{
				$('#complete').hide();
				$('#int_wallet').val(data.users[0].internal_wallet);
			}
			
			
		}
	});
	
	
}

/////////////////////////////////////////////////////////////////////////////////////////////////////////////




/////////////////////////////////////////////////////////////SBV CHILD////////////////////////////////


$(document).on("click","#sbvmininextchild",function(ev){
	"use strict";
		///////////////////////////////////
	//not complete
		$.ajax({
				url:"./sbvmininextchild",
				method:"post",
				data:$("#formdata").serialize(),
				success:function()
				{
						$('#loading').hide();
					console.log('sent');
					
				
					
				}
				
			});
	ev.preventDefault();
});
//after 
////Start Code Addanothergrand Child
$(document).on("click","#sbvminianotherchild",function(ev){
	"use strict";
		$('#loading').show();
	//not complete
		$.ajax({
				url:"./sbvminianotherchild",
				method:"post",
				data:$("#formdata").serialize(),
				success:function()
				{
						$('#loading').hide();
					console.log('sent');
				
					
				}
				
			});
	ev.preventDefault();
});
//$(document).on("click","#addanothergrand",function(ev){
//	"use strict";
//	//alert('add');
//	$('#child2').show();
//	ev.preventDefault();
//});
//$(document).on("click","#removegrand",function(){
//	"use strict";
//	$('#child2').hide();
//});
//
////end Code Addanother Child
//Start code creator grand activated
//after creator grand activated his account



//end code creator grand activated

//Start code creator mini activated
//after creator grand activated his account
$(document).on("click","#creatormini_activated",function(ev){
	"use strict";
		///////////////////////////////
	$('.overlay').css(
			{
			 "font-size": "200%",
			  "position":"fixed",
    "top": "0",
    "left": "0",
    "height":"100%",
    "width":"100%",
    "background-color":"rgba(0,0,0,0.5)",
    "z-index":"10"
			 
			 
			});
		
		
		//////////////////LOADING
		
		$('#loading').css({
	
    "position":"fixed",
    "top":"50%", 
    "left":"50%",
   
    "z-index":"11",
			
		});
		$('#loading').show();
	
	/////////////////////////////////////
	//not complete
		$.ajax({
				url:"./creatormini_activated",
				method:"post",
				data:$("#formdata").serialize(),
				success:function()
				{
						$('#loading').hide();
					$('.overay').hide();
					console.log('sent');
					
					
				}
				
			});
	ev.preventDefault();
});
//after creator mini activated his account
//end code creator grand activated

//Start code to Activate childmini
$(document).on("click","#activate_childmini",function(ev){
	"use strict";
	
	
		$.ajax({
				url:"./activate_childmini",
				method:"post",
				data:$("#formdata").serialize(),
				success:function()
				{
					console.log('sent');
					
					
				}
				
			});
	ev.preventDefault();
});
//end code to Activate childmini







//start code Childgrand invest On Triangle
$(document).on("click","#childmini_activated",function(ev){
	"use strict";
	//here child grand will invest in Triangle
	
		$.ajax({
				url:"./childmini_activated",
				method:"post",
				data:$("#formdata").serialize(),
				success:function()
				{
					console.log('sent');
					
					
				}
				
			});
	ev.preventDefault();
});
//End code Child grand Invest In Triangle
////////////////////////////////////////////////////////////////////////////////////////////////////


function platform(){
	"use strict";	
	$('#platform').change(function(){
		var platform=$('#platform').val();
		if(platform==='Super Bitcoin Value')
			{
				//$('.activate').removeAttr('id','*');
				//$('.activate').removeAttr('id','activate');
//				$('.activate').removeAttr('id','sbvmini');
				
				$('.activate').attr('id','creator_activated');//To activate registration on mini triangle 
				
				$('.activate').text('Convert in Bitcoin');
				//remove .activate class
				
				//$('.activate').removeClass('activate');
				//remove .activate class
				$('#registration_charge').val('200');
				$('#registration_charge').attr('readonly','readyonly');
				  
				  $('#creator_money').attr("placeholder", "Enter Values Between 500 - 500000");
				$('#paymessage').show();
				$('#pay').text('For This Platform You Must Pay:R60 To Activate This Account');
			}
		else if(platform==='SBV Mini')
		{
			$('.activate').text('Convert in Bitcoin');
			//$('.activate').removeAttr('id','*');
			//$('.activate').removeAttr('id','activate');
			//$('.activate').removeAttr('id','sbv');
			$('#registration_charge').val('20');
			$('#registration_charge').attr('readonly','readyonly');
			
			$('.activate').attr('id','creatormini_activated');//to activate register user on sbvmini
			
			$('#paymessage').show();
			 $('#creator_money').attr("placeholder", "Enter Values between 500 - 3500");
			$('#pay').text('For This Platform You Must Pay:R20 To Activate This Account');
		}
		else{
			$('#paymessage').hide();
			$('#registration_charge').attr("placeholder", "Registration R20 or R60");
			$('#creator_money').attr("placeholder", "There is no Values Selected");
		}
	});
}


//$(document).on("blur","#creator_money",function(){
//	"use strict";
//	onlyNumbers();
//});
$(document).ready(function(){
	"use strict";
	$('.activate').dblclick(function(){
		//alert("hello");

	});
});





//sbv mini Triangle action

$(document).on('click',"#sbvmini",function(eve){
	"use strict";
	$.ajax({
				url:"./createsbvmini",
				method:"post",
				data:$("#formdata").serialize(),
				success:function()
				{
					console.log('sent');
					
				}
				
			});
	eve.preventDefault();
	
});












////////////////////////////////////////////////////////////////////////////////////////////////////////////////
//////////////////////////////////SBV TRIANGLE CONTROLLER //////////////////////////////////////////////////////
//////////////////////////SBV GRAND CHILD/////////////////////////////////
$(document).on("click","#activate_superchildgrand",function(ev){//Start code to Activate childgrand just add
	"use strict";
	
		//////////////////
	$('.overlay').css(
			{
			 "font-size": "200%",
			  "position":"fixed",
    "top": "0",
    "left": "0",
    "height":"100%",
    "width":"100%",
    "background-color":"rgba(0,0,0,0.5)",
    "z-index":"10"
			 
			 
			});
		
		
		//////////////////LOADING
		
		$('#loading').css({
	
    "position":"fixed",
    "top":"50%", 
    "left":"50%",
   
    "z-index":"11",
			
		});
		$('#loading').show();
	
	
	///////////////////////////
		$.ajax({
				url:"./activate_superchildgrand",
				method:"post",
				data:$("#formdata").serialize(),
				success:function()
				{
						$('#loading').hide();
					$('.overay').hide();
					getaccountregcharge();
					$('.popup').click();
					console.log('sent');
					
					
				}
				
			});
	ev.preventDefault();
});//end code to Activate childgrand


$(document).on("click","#sbvnextchild",function(ev){//ADD NEXT CHILD OR CHILD2
	"use strict";
		//////////////////////////////////
	
	$('.overlay').css(
			{
			 "font-size": "200%",
			  "position":"fixed",
    "top": "0",
    "left": "0",
    "height":"100%",
    "width":"100%",
    "background-color":"rgba(0,0,0,0.5)",
    "z-index":"10"
			 
			 
			});
		
		
		//////////////////LOADING
		
		$('#loading').css({
	
    "position":"fixed",
    "top":"50%", 
    "left":"50%",
   
    "z-index":"11",
			
		});
		$('#loading').show();
	
	////////////////////////////////
	//not complete
		$.ajax({
				url:"./sbvnextchild",
				method:"post",
				data:$("#formdata").serialize(),
				success:function(data)
				{
						$('#loading').hide();
					$('.overay').hide();
					if(data)
						{
						//	$("body").hide().fadeIn(1500);
							//alert('error');
				//			 swal({
//                title: "Your Transaction is still processing",
//                text:'error',
//                type: "success"
//		 
//            });
							swal ( "Oops" ,  "Something went wrong!" ,  "error" );
						}
					else{
						$('.popup').click();
					}
				},
				
				
				
				
			});
	ev.preventDefault();
});


$(document).on("click","#sbvanotherchild",function(ev){// A CODE TO ADD FIRST CHILD
	"use strict";
	/////////////////////////
	
	$('.overlay').css(
			{
			 "font-size": "200%",
			  "position":"fixed",
    "top": "0",
    "left": "0",
    "height":"100%",
    "width":"100%",
    "background-color":"rgba(0,0,0,0.5)",
    "z-index":"10"
			 
			 
			});
		
		
		//////////////////LOADING
		
		$('#loading').css({
	
    "position":"fixed",
    "top":"50%", 
    "left":"50%",
   
    "z-index":"11",
			
		});
		$('#loading').show();
	
	
	
	
	
/////////////////////////////
	//not complete
		$.ajax({
				url:"./sbvanotherchild",
				method:"post",
				data:$("#formdata").serialize(),
				success:function(data)
				{
					$('#loading').hide();
					$('.overay').hide();
					//console.log('sent');
					
					if(data)
						{
						//	$("body").hide().fadeIn(1500);
							//alert('error');
				//			 swal({
//                title: "Your Transaction is still processing",
//                text:'error',
//                type: "success"
//		 
//            });
							swal ( "Oops" ,  "Something went wrong!" ,  "error" );
						}
					else{
						$('.popup').click();
					}
				},
				
			});
	ev.preventDefault();
});

$(document).on("click","#activate_childgrand",function(ev){//Start code to Activate childgrand
	"use strict";
	//////////////////////////////////
	
	$('.overlay').css(
			{
			 "font-size": "200%",
			  "position":"fixed",
    "top": "0",
    "left": "0",
    "height":"100%",
    "width":"100%",
    "background-color":"rgba(0,0,0,0.5)",
    "z-index":"10"
			 
			 
			});
		
		
		//////////////////LOADING
		
		$('#loading').css({
	
    "position":"fixed",
    "top":"50%", 
    "left":"50%",
   
    "z-index":"11",
			
		});
		$('#loading').show();
	
	
	//////////////////////////////////
	
		$.ajax({
				url:"./activate_childgrand",
				method:"post",
				data:$("#formdata").serialize(),
				success:function()
				{
					$('#loading').hide();
					$('.overay').hide();
					getaccountregcharge();
					$('.popup').click();
					console.log('sent');
					
					
				}
				
			});
	ev.preventDefault();
});//end code to Activate childgrand
$(document).on("click","#childgrand_activated",function(ev){//start code Childgrand invest On Triangle
	"use strict";
	
	//here child grand will invest in Triangle
	/////////////////////////
	
	$('.overlay').css(
			{
			 "font-size": "200%",
			  "position":"fixed",
    "top": "0",
    "left": "0",
    "height":"100%",
    "width":"100%",
    "background-color":"rgba(0,0,0,0.5)",
    "z-index":"10"
			 
			 
			});
		
		
		//////////////////LOADING
		
		$('#loading').css({
	
    "position":"fixed",
    "top":"50%", 
    "left":"50%",
   
    "z-index":"11",
			
		});
		$('#loading').show();
	
	//////////////////////////////////
		$.ajax({
				url:"./childgrand_activated",
				method:"post",
				data:$("#formdata").serialize(),
				success:function()
				{
					$('#loading').hide();
					$('.overay').hide();
					getaccountpaydata();
					console.log('sent');
					$('.popup').click();
				
					
				}
				
			});
	ev.preventDefault();
});//End code Child grand Invest In Triangle


///////////////////////SBV CHILD /////////////////////////////////


//////////////DYNAMIC EVENT ////////////
$(document).on("click",".confirm",function(){
	"use strict";
	
	
	 location.reload();
	
});
$(document).on("click","#creator_activated",function(ev){
	"use strict";
	/////////////////////////
	
	$('.overlay').css(
			{
			 "font-size": "200%",
			  "position":"fixed",
    "top": "0",
    "left": "0",
    "height":"100%",
    "width":"100%",
    "background-color":"rgba(0,0,0,0.5)",
    "z-index":"10"
			 
			 
			});
		
		
		//////////////////LOADING
		
		$('#loading').css({
	
    "position":"fixed",
    "top":"50%", 
    "left":"50%",
   
    "z-index":"11",
			
		});
		$('#loading').show();
	
	////////////////////////////
	//not complete
		$.ajax({
				url:"./creator_activated",
				method:"post",
				data:$("#formdata").serialize(),
				success:function()
				{
					
					$('#loading').hide();
					$('.overay').hide();
					getaccountregcharge();
					$('.popup').click();
					console.log('sent');
				
				
				}
				
			});
	ev.preventDefault();
});


$(document).on("click","#activate",function(){
	
"use strict";
	onlyNumbers();
	//console.log("hello");
	if(onlyNumbers())
		{
			console.log("function is number");
		}
		else{
			console.log("failed");
		}
			
});
$(document).on('click',"#sbv",function(ev){
	"use strict";
	/////////////////////////////
	
	$('.overlay').css(
			{
			 "font-size": "200%",
			  "position":"fixed",
    "top": "0",
    "left": "0",
    "height":"100%",
    "width":"100%",
    "background-color":"rgba(0,0,0,0.5)",
    "z-index":"10"
			 
			 
			});
		
		
		//////////////////LOADING
		
		$('#loading').css({
	
    "position":"fixed",
    "top":"50%", 
    "left":"50%",
   
    "z-index":"11",
			
		});
		$('#loading').show();
	
	/////////////////////////////
	
		$.ajax({
				url:"./createsbv",
				method:"post",
				data:$("#formdata").serialize(),
				success:function()
				{
					$('#loading').hide();
					$('.overay').hide();
					getaccountpaydata();
					console.log('sent');
					$('.popup').click();
				}
				
			});
	ev.preventDefault();
	
});//sbv grand triangle action

//////////////DYNAMIC EVENT ////////////
//////////////POPUP EVENT/////////////
$(document).ready(function(){
	"use strict";
	 $('.popup').click(function(){
			var nextstep=$('#nextstep').text();
	var accname=$('#accname').val();
	var message=`Dear ${accname} , The Next Step Will Be ${nextstep}`;
	 swal({
                title: "Good job!",
                text:message,
                type: "success"
		 
            });
           
        });
});


//////////POPUP EVENT///////////////
//////////////NORMAL EVENT//////////////

$(document).ready(function(){
	"use strict";
	$('#sbvwithdraw').click(function(){
		//alert("draw");
		$.ajax({
		url:"./creator_withdraw",
		
		method:"post",
		data:$("#formdata").serialize(),
		success:function(){
			//$('#reinvest').show();
			//$('#withdraw').hide();
			
			var message=`Do not Leave us we still Need you! you can Invest Again in This Business`;
	 swal({
                title: "Your Transaction is still processing",
                text:message,
                type: "success"
		 
            });
		}
			});
	});
	
});

$(document).ready(function(){
	"use strict";
	
	$('#reinvest').click(function(re){
	$.ajax({
		url:"./checkreinvest",
		type:"get",
		success:function(data){
			var cases=data.cases;
			if(cases===1)
				{
					$('#creator_money').attr("placeholder", "Enter Values Between 500 - 500000");
				$('#formname').text("Create A Triangle.");
				$('#child2').hide();
				$('#child1').hide();
				$('#platformdata').hide();
				$('#registrationchargedata').hide();
				$('#none').show();
				$('#complete').show();
			     $('.activate').text('Submit');
				$('.activate').attr('id','reinvvalue');//to create a table with child
				//$('#bitcoin_address').val(data.users[0].bitcoin_address);
				//$('#bitcoin_addressdata').hide();
				$('#nextstep').text('Is To  Add Users in Your Triangle');
				}
			else{
				swal ( "Oops" ,  "It is Impossible To Create Twice SBV Triangle! on Same username" ,  "error" );
			}
		}
		
	});	
	
	
		re.preventDefault();
	});
	
});



$(document).ready(function(){
	"use strict";
	$('#adfirstWithdraw').click(function(e){
		alert("admin");
		$.ajax({
		url:"./adfirstWithdraw",
		method:"post",
		data:$("#formdata").serialize(),
		success:function(){
			//$('#reinvest').show();
			//$('#withdraw').hide();
		}
			});
		
		e.preventDefault();
	});
});
/////////////////////////////ADMIN REGISTRATION WITHDRAW//////////////
$(document).ready(function(){
	"use strict";
	$('#adregwithdraw').click(function(e){
		alert("adregwithdraw");
		$.ajax({
		url:"./adregwithdraw",
		method:"post",
		data:$("#formdata").serialize(),
		success:function(){
			//$('#reinvest').show();
			//$('#withdraw').hide();
		}
			});
		
		e.preventDefault();
	});
});

/////////////////////////////ADMIN REGISTRATION WITHDRAW///////////////
/////////////////////////////ADMIN SUPER TRIANGLE WITHDRAW//////////////
$(document).ready(function(){
	"use strict";
	$('#adswithdraw').click(function(e){
		alert("adswithdraw");
		$.ajax({
		url:"./adswithdraw",
		method:"post",
		data:$("#formdata").serialize(),
		success:function(){
			//$('#reinvest').show();
			//$('#withdraw').hide();
		}
			});
		
		e.preventDefault();
	});
});

/////////////////////////////ADMIN SUPER TRIANGLE WITHDRAW///////////////

///////////////NORMAL EVENT////////////
///////////******************//////////
///////////////NORMAL FUNCTION////////
function getaccountregcharge(){//here after click convert you will get This data on form from database
	"use strict";
	
	$.ajax({
		url:"./account",
		type:"get",
		success:function(data){
			var btc_charge=parseFloat(data.users[0].btc_charge)+0.00123;
			var internal_wallet=data.users[0].internal_wallet;
			$('#btc_charge').text(btc_charge);
			$('#internal_wallet').text(internal_wallet);
			$('#btc_charge').show();
			$('#internal_wallet').show();
			alert('You Must Pay:BTC:'+btc_charge.toFixed(6)+' On This Address '+internal_wallet+' To Activate This Account');
			$('#pay').text('You Must Pay:BTC:'+btc_charge.toFixed(6)+' On This Address '+internal_wallet+' To Activate This Account');
			$('.overay').hide();
			$('#loading').hide();
		}
		
	});
}
function onlyNumbers()
{
	"use strict";
	var creator_money=$('#creator_money').val();
  var searchForNonNumbers = /\D+/;
	if (searchForNonNumbers.test(creator_money) === false)
	 {
		 console.log("it number");
		 
	 }
	else{
		console.log("not number");
		
	}
 //if (searchForNonNumbers.test(creator_money) === false)
//	 {
//		 console.log("it number");
//	 }
} 

function getaccountpaydata(){//here after click convert you will get This data on form from database
	"use strict";
	$.ajax({
		url:"./account",
		type:"get",
		success:function(data){
			//var x=0.0012;
			var btc_childmoney=parseFloat(data.users[0].btc_childmoney)+0.00123;
			var internal_wallet=data.users[0].internal_wallet;
			$('#btc_investcharge').text(btc_childmoney);
			$('#internal_investwallet').text(internal_wallet);
			$('#btc_investcharge').show();
			$('#internal_investwallet').show();
			alert('You Must Pay:BTC:'+btc_childmoney.toFixed(6)+' On This Address '+internal_wallet+' To Activate This Account');
			console.log("test");
			$('.overay').hide();
			$('#loading').hide();
		}
		
	});
}
//sbv grand money
function getcountervcm()//start code to count sbv triangle where vcm=100
{
	"use strict";
	$.ajax({
		url:"./getcountervcm",
		method:"get",
		success:function(data){
			
			console.log(data.sum[0].sum);
			$('#bonus').text(data.sum[0].sum);
			var vcm=data.sum[0].sum;
			var vcmcounter=data.getcountervcm[0].vcmcounter/2;
			
			console.log(vcmcounter);
			if(vcmcounter>=5)
				{
					//here i will put a button text for status to make it to be vcm means that when user split 5 triangle his status will be vcm and then when user withdraw vcm Man it will reset  money
					
					//here triangle 1 equal to 500
					console.log("Value creation manager");
					if(vcm===5000)
						{
							$('#plus').show();
							$('#vcm').text(5000);
							$('#vcm').show();
						}
					
					
				}
			
			console.log("creation Manager");
			$('#profile_status1').text('Creator ');
			$('#profile_status2').text('Creator ');
			var triangle=vcm/500;
			$('#pfolie_nooftriangle').text(triangle);
			
			//console.log(data.getsbvtriangle[0].creator_values);
			//$('#profile_earning1').text(data.getsbvtriangle[0].creator_values);
			//$('#profile_earning2').text(data.getsbvtriangle[0].creator_values);
		}
	});
}//End code to count sbv triangle where vcm=100

function getsbvtriangle()//Start code get Sbv triangle Data that creator_values is not null
{
	"use strict";
	$.ajax({
		url:"./getsbvtriangle",
		method:"get",
		success:function(data){
			//console.log(data.getsbvtriangle);
			//console.log(data.getsbvtriangle[0].creator_values);
			///$('#creator_money').val(data.getsbvtriangle[0].creator_values);
			///$('#profile_earning1').text(data.getsbvtriangle[0].creator_values);
			///$('#profile_earning2').text(data.getsbvtriangle[0].creator_values);
			///$('#btcearn').text(data.btc_money);
			///$('#btc_creamoney').val(data.btc_money);
			///$('#btc_zar').text(data.zar);
			$('#creator_money').val(data.getsbvtriangle[0].total);
			$('#profile_earning1').text(data.getsbvtriangle[0].total);
			$('#profile_earning2').text(data.getsbvtriangle[0].total);
			$('#btcearn').text(data.btc_money);
			$('#btc_creamoney').val(data.btc_money);
			$('#btc_zar').text(data.zar);
		}
	});
}//End code get Sbv triangle Data that creator_values is not null
function getAdminData(){//Start Code get Admin Data
	"use strict";
	$.ajax({
		url:"./getAdminData",
		method:"get",
		success:function(data){
			console.log(data.getsbvtriangle[0].sum);
			console.log(data.getsbvminitriangle[0].sum);
			$('#first_triangle').text(data.getsbvtriangle[0].sum);
			$('#second_triangle').text(data.getsbvminitriangle[0].sum);
			$('#creator_money').val(data.getsbvtriangle[0].sum);
			$('#btc_admin').text(data.btc_money);
			$('#btc_zaradmin').text(data.zar);
			//console.log(data.getsbvtriangle[0].creator_values);
			
		}
	});
}
///////////////NORMAL FUNCTION////////

///////////check code sbv
function moneyvalidation(){///Money validation
"use strict";
	
	$('#creator_money').keydown(function(){
		var creator_money=$('#creator_money').val();
		if(creator_money>500000)
			{
				 $('#sbv').hide();	
				$('#reinvvalue').hide();
			}
		else if(creator_money>=500)
			{
				$('#sbv').show();
				$('#reinvvalue').show();
			}
		
		else{
          $('#sbv').hide();		
			$('#reinvvalue').hide();
			
		}
		
		
	});
	$('#creator_money').keyup(function(){
		var creator_money=$('#creator_money').val();
		if(creator_money>500000)
			{
				 $('#sbv').hide();
				$('#reinvvalue').hide();
				
			}
		else if(creator_money>=500)
			{
				$('#sbv').show();
				$('#reinvvalue').show();
			}
		
		else{
          $('#sbv').hide();		
			$('#reinvvalue').hide();
		}
		
	});
}///Money Validation
function checkusername(){
	"use strict";
	$.ajax({
		url:"./checkusername",
		method:"get",
		success:function(data){
			console.log(data.users);
			console.log(data.users[0].triangle_parents);
			$('#triangle_parents').val(data.users[0].triangle_parents);
		}
	});
}

function checkstatus(){
	"use strict";
	$.ajax({
		url:"./checkstatus",
		method:"get",
		success:function(data){
			console.log(data.status[0].status);
			//console.log(data.users[0].triangle_parents);
			//$('#triangle_parents').val(data.users[0].triangle_parents);
			$('#status').val(data.status[0].status);
			
		}
	});
}
//sbv mini Triangle action
// end code this is to check what will display on users account and what will not display on Account (profile page)
//
function check_reg_charge(){//Start Code check_reg_charge This code will be placed on none platform
	"use strict";
	$.ajax({
		url:"./check_reg_charge",
		method:"get",
		success:function(data){
			//alert(data.api_money);
			//alert(data.done);
			if(data)
				{
					var api_money=data.api_money;
			var btc_charge=parseFloat(data.btc_charge)+0.00123;
			var remain=btc_charge-api_money;
			//var remain=btc_charge;
			 if(btc_charge==='none')
				{
					var notpaid="Make sure Your Registration  Fees has been Paid successfully? ";
			 swal({
                title: "STEP 0",
                text:notpaid,
                type: "success"
		 
            });
					$('.confirm').removeClass('confirm');
				}
			 
			else{
				    var internal_wallet=data.internal_wallet;
					var notfullpaid=`you have  ${api_money} in your wallet Remaining are ${remain.toFixed(6)} pay on This ${internal_wallet}`;
			 swal({
                title: "You have not yet Full paid Registration fees",
                text:notfullpaid,
                type: "success"
				 
		 
            });
			$('.confirm').removeClass('confirm');	
				
			}
			
			//console.log(data.getsbvtriangle[0].creator_values);
			
				}
			else{
				var paid="Your Account have been Activated Successfully ";
					
				 swal({
               title: "Well Done!",
                text:paid,
                type: "success"
		 
            });
			}
			
		},
		
	});
}

function check_pay(){//Start Code check_reg_charge This code will be placed on none platform
	"use strict";
	$.ajax({
		url:"./check_pay",
		method:"get",
		success:function(data){
	if(data)
				{
			var api_money=data.api_money;
			var btc_childmoney=parseFloat(data.btc_childmoney)+0.00123;
			var btc_charge=data.btc_charge;
			var invest_money=api_money-btc_charge;
			var remain=btc_childmoney-invest_money;
			
			 if(btc_childmoney==='none')
				{
					var notpaid="Make sure Your Investment Values has been successfully Submitted?";
			 swal({
                title: "STEP1",
                text:notpaid,
                type: "success"
		 
            });
					$('.confirm').removeClass('confirm');
				}
			 
			else{
				    var internal_wallet=data.internal_wallet;
					var notfullpaid=`you have ${invest_money}  in Your wallet Remaining are ${remain.toFixed(6)} pay on This ${internal_wallet}`;
			 swal({
                title: "You have not yet Full paid Registration fees",
                text:notfullpaid,
                type: "success"
				 
		 
            });
			$('.confirm').removeClass('confirm');	
				
			}
			
			//console.log(data.getsbvtriangle[0].creator_values);
			
				}
			else{
				var paid="Let us continue To Invest In Triangle ";
					
				 swal({
               title: "Good Jobs Your Payment is Verified !",
                text:paid,
                type: "success"
		 
            });
			}
			
		},
			//console.log(data.getsbvtriangle[0].creator_values);
	});
}
//////////////////////////////////////////////CHILD CHECK//////////////////////////////////////////


function check_childrecharge(){//Start Code check_reg_charge This code will be placed on none platform
	"use strict";
	$.ajax({
		url:"./check_childrecharge",
		method:"get",
		success:function(data){
			//alert(data.api_money);
			//alert(data.done);
			if(data)
				{
					var api_money=data.api_money;
			var btc_charge=parseFloat(data.btc_charge)+0.00123;
			var remain=btc_charge-api_money;
			
			 if(btc_charge==='none')
				{
					var notpaid="Look Like you are not yet paid Investment Money";
			 swal({
                title: "OOPS!",
                text:notpaid,
                type: "success"
		 
            });
					$('.confirm').removeClass('confirm');
				}
			 
			else{
				    var internal_wallet=data.internal_wallet;
					var notfullpaid=`you have  ${api_money} in Your wallet Remaining are ${remain.toFixed(6)} pay on This ${internal_wallet}`;
			 swal({
                title: "You have not yet Full paid Registration fees",
                text:notfullpaid,
                type: "success"
				 
		 
            });
			$('.confirm').removeClass('confirm');	
				
			}
			
			//console.log(data.getsbvtriangle[0].creator_values);
			
				}
			else{
				var paid="Let us continue To Invest In Triangle ";
					
				 swal({
               title: "Good Jobs Your Payment is Verified !",
                text:paid,
                type: "success"
		 
            });
			}
			
		},
		
	});
}

function check_childpaye()
{
	"use strict";
	$.ajax({
		url:"./check_childpaye",
		method:"get",
		success:function(data){
	if(data)
				{
			var api_money=data.api_money;
			var btc_childmoney=parseFloat(data.btc_childmoney)+0.00123;
			var btc_charge=data.btc_charge;
			var invest_money=api_money-btc_charge;
			var remain=btc_childmoney-invest_money;
			
			 if(btc_childmoney==='none')
				{
					var notpaid="Look Like you are not yet paid registration fees";
			 swal({
                title: "OOPS!",
                text:notpaid,
                type: "success"
		 
            });
					$('.confirm').removeClass('confirm');
				}
			 
			else{
				    var internal_wallet=data.internal_wallet;
					var notfullpaid=`you have  ${invest_money} in your Wallet Remaining are ${remain.toFixed(6)} pay on This ${internal_wallet}`;
			 swal({
                title: "You have not yet Full paid Registration fees",
                text:notfullpaid,
                type: "success"
				 
		 
            });
			$('.confirm').removeClass('confirm');	
				
			}
			
			//console.log(data.getsbvtriangle[0].creator_values);
			
				}
			else{
				var paid="Let us continue To Invest In Triangle ";
					
				 swal({
               title: "Good Jobs Your Payment is Verified !",
                text:paid,
                type: "success"
		 
            });
			}
			
		},
			//console.log(data.getsbvtriangle[0].creator_values);
	});
}
///////////////////////////////////////////////CHILD CHECK///////////////////////////////////////////

/////////////////////check code


////////////////////////////////////////////////////////////////////////////////////////////////////////////////

//////////////********************************************************************///////////////////////////////
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////
/////////////////////////////////SUPER TRIANGLE////////////////////////////////////////////////////////////
////////////////////////////post METHOD TRIANGLES ////
function supercheck_childrecharge(){//Start Code check_reg_charge This code will be placed on none platform
	"use strict";
	$.ajax({
		url:"./supercheck_childrecharge",
		method:"get",
		success:function(data){
			//alert(data.api_money);
			//alert(data.done);
			if(data)
				{
					var api_money=data.api_money;
			var btc_charge=parseFloat(data.btc_charge)+0.00123;
			var remain=btc_charge-api_money;
			
			 if(btc_charge==='none')
				{
					var notpaid="Look Like you are not yet paid Registration fees";
			 swal({
                title: "OOPS!",
                text:notpaid,
                type: "success"
		 
            });
					$('.confirm').removeClass('confirm');
				}
			 
			else{
				    var internal_wallet=data.internal_wallet;
					var notfullpaid=`you have  ${api_money} in your Wallet Remaining are ${remain.toFixed(6)} pay on This ${internal_wallet}`;
			 swal({
                title: "You have not yet Full paid Registration fees",
                text:notfullpaid,
                type: "success"
				 
		 
            });
			$('.confirm').removeClass('confirm');	
				
			}
			
			//console.log(data.getsbvtriangle[0].creator_values);
			
				}
			else{
				var paid="Let us continue To Invest In Triangle ";
					
				 swal({
               title: "Good Jobs Your Payment is Verified !",
                text:paid,
                type: "success"
		 
            });
			}
			
		},
		
	});
}


////////////////////super Monitor


function super_monitorsplit(){
	"use strict";
	$.ajax({
		type:"get",
		url:"./super_monitorsplit",
		success:function()
		{
			
		}
	});
}








//////////////////////////
//$(document).on("click","#createsuper",function(ev){
//	"use strict";
//	
//	//not complete
//		$.ajax({
//				url:"./createsuper",
//				method:"post",
//				data:$("#formsuper").serialize(),
//				success:function()
//				{
//					console.log('sent');
//					
//				
//					
//				}
//				
//			});
//	ev.preventDefault();
//});
$(document).on("click","#adfirstchild",function(ev){
	"use strict";
	//////////////////////////////
	$('#supertriangle').hide();
	$('.overlay').css(
			{
			 "font-size": "200%",
			  "position":"fixed",
    "top": "0",
    "left": "0",
    "height":"100%",
    "width":"100%",
    "background-color":"rgba(0,0,0,0.5)",
    "z-index":"10"
			 
			 
			});
		
		
		//////////////////LOADING
		
		$('#loading').css({
	
    "position":"fixed",
    "top":"50%", 
    "left":"50%",
   
    "z-index":"11",
			
		});
		$('#loading').show();
	
	/////////////////////////////
	//not complete
		$.ajax({
				url:"./adfirstchild",
				method:"post",
				data:$("#formpata").serialize(),
				success:function()
				{
					//console.log('sent');
					//location.reload();
					$('.popup').click();
	
					
				$('#loading').hide();
				$('.overay').hide();
					
				}
				
			});
	ev.preventDefault();
});

$(document).on("click","#adnextchild",function(ev){
	"use strict";
	////////////////////////
	$('#supertriangle').hide();
	$('.overlay').css(
			{
			 "font-size": "200%",
			  "position":"fixed",
    "top": "0",
    "left": "0",
    "height":"100%",
    "width":"100%",
    "background-color":"rgba(0,0,0,0.5)",
    "z-index":"10"
			 
			 
			});
		
		
		//////////////////LOADING
		
		$('#loading').css({
	
    "position":"fixed",
    "top":"50%", 
    "left":"50%",
   
    "z-index":"11",
			
		});
		$('#loading').show();
	
	///////////////////////
	//not complete
		$.ajax({
				url:"./adnextchild",
				method:"post",
				data:$("#formpata").serialize(),
				success:function()
				{
					//console.log('sent');
					$('.popup').click();
	
					//$('#supertriangle').show();
					$('#loading').hide();
					$('.overay').hide();
				
					
				}
				
			});
	ev.preventDefault();
});


$(document).on("click","#super_child1converted",function(ev){
	"use strict";
	//////////////////////////////////
	$('#supertriangle').hide();
	$('.overlay').css(
			{
			 "font-size": "200%",
			  "position":"fixed",
    "top": "0",
    "left": "0",
    "height":"100%",
    "width":"100%",
    "background-color":"rgba(0,0,0,0.5)",
    "z-index":"10"
			 
			 
			});
		
		
		//////////////////LOADING
		
		$('#loading').css({
	
    "position":"fixed",
    "top":"50%", 
    "left":"50%",
   
    "z-index":"11",
			
		});
		$('#loading').show();
	
	
	
	//////////////////////////////
	//not complete
		$.ajax({
				url:"./super_child1converted",
				method:"post",
				data:$("#formpata").serialize(),
				success:function(data)
				{
					$('#supertriangle').show();
					$('.overay').hide();
					$('#loading').hide();
			var btc_charge=parseFloat(data.super_child1btcmoney)+0.00123;
			var internal_wallet=data.super_creatorinternwallet;
					
				alert('You Must Pay:BTC:'+btc_charge.toFixed(6)+' On This Address '+internal_wallet+' To Activate This Account');
					$('.overay').hide();
			$('#loading').hide();
				}
				
			});
	ev.preventDefault();
});



$(document).on("click","#super_child2converted",function(ev){
	"use strict";
	///////////////////////////////////////
	$('#supertriangle').hide();
	
	$('.overlay').css(
			{
			 "font-size": "200%",
			  "position":"fixed",
    "top": "0",
    "left": "0",
    "height":"100%",
    "width":"100%",
    "background-color":"rgba(0,0,0,0.5)",
    "z-index":"10"
			 
			 
			});
		
		
		//////////////////LOADING
		
		$('#loading').css({
	
    "position":"fixed",
    "top":"50%", 
    "left":"50%",
   
    "z-index":"11",
			
		});
		$('#loading').show();
	
	/////////////////////////////////////
	//not complete
		$.ajax({
				url:"./super_child2converted",
				method:"post",
				data:$("#formpata").serialize(),
				success:function(data)
				{
					$('#supertriangle').show();
					$('.overay').hide();
					$('#loading').hide();
					var btc_charge=parseFloat(data.super_child2btcmoney)+0.00123;
			var internal_wallet=data.super_creatorinternwallet;
					
				alert('You Must Pay:BTC:'+btc_charge.toFixed(6)+' On This Address '+internal_wallet+' To Activate This Account');
				$('.overay').hide();
			$('#loading').hide();	
				
					
				}
				
			});
	ev.preventDefault();
});


///////////////////////////////POST METHOD TRIANGLE////////
function supermoneyvalidation(){///Money validation
"use strict";
	
	$('#supercreator_money').keydown(function(){
		var supercreator_money=$('#supercreator_money').val();
		if(supercreator_money>500000)
			{
				 $('#supersbv').hide();	
				$('#supermoneydisplay').text("The Investment money is not valid");
				$('#youwillget').text('Eish!');
				
			}
		else if(supercreator_money>=1000)
			{
				$('#youwillget').text('You Will Get:');
				//$('#supersbv').show();
				var calcul=(supercreator_money*2)+((supercreator_money*20)/100);
				$('#supermoneydisplay').text(calcul);
				
			}
		
		else{
          $('#supersbv').hide();
			$('#youwillget').text('Eish!');
			$('#supermoneydisplay').text("The Investment money is not valid");
		}
		
		
	});
	$('#supercreator_money').keyup(function(){
		var supercreator_money=$('#supercreator_money').val();
		if(supercreator_money>500000)
			{
				$('#youwillget').text('Eish!');
				 $('#supersbv').hide();	
				$('#supermoneydisplay').text("The Investment money is not valid");
				
			}
		else if(supercreator_money>=1000)
			{
				$('#youwillget').text('You Will Get:');
				var calcul=(supercreator_money*2)+((supercreator_money*20)/100);
				$('#supermoneydisplay').text(calcul);
				//$('#supersbv').show();
			}
		
		else{
			$('#youwillget').text('Eish!');
          $('#supersbv').hide();	
			$('#supermoneydisplay').text("The Investment money is not valid");
		}
		
	});
}///Money Validation
///////////////////////////////////////////	VIEW SBV TRIANGLE//////////////////
$(document).ready(function(){
	"use strict";
	$('#view_sbv').click(function(ev){
		getsbvtriangle();
					getcountervcm();
				$('body').css('background-color','#2b3e50');
					
				$('#profile').show();
			    $('#withdraw').show();
					$('#int_wallet').val(data.users[0].internal_wallet);
					$('#bitcoin_address').val(data.users[0].bitcoin_address);
		ev.preventDefault();
	});
});

////////////////////////////////////////
///////////////////////////////////////////////////////VIEW SUPER TRIAGLE///////////////////////////////
$(document).ready(function(){
	"use strict";
$('#view_supertriangle').click( function(ev){
	
$.ajax({
	type:"POST",
	url:"./super_triangle",
	data:$('#formsuper').serialize(),
	//data:$('#formdata').serialize(),
	success:function(data)
	{
		
		//var super_child1platform=data.child1[0].super_child1platform,
		//var super_child2platform=data.child2[0].super_child2platform,
		var supersi=data.supersi;
		
		if(supersi==='creator')
			{
				var super_platform=data.supers[0].super_platform;	
				//alert("This is creator");
				//This is creator
				if(super_platform==='super_creatoractivate')
				{
					$('#nextstep').text('To Add Second User To Your Triangle');
					$('#youwillget').css("font-size","25px");
					$('#supermoneydisplay').css("font-size","25px");
					$('#youwillget').text("Add  ");
					
						$('#supermoneydisplay').text(" Standard User 1 to Your Triangle");
					$('#supertriangle').show();
						$('#super_child').show();
					   // $('.supersbv').attr('id','adfirstchild');
					///////////////////
					   //$('.supersbv').show();
					   //$('#test').hide();
					$('.supersbv').hide();
					$('.test').attr('id','adfirstchild');
					
					$('.test').text("Add First User");
					$('.test').show();
					   ////////////////
					    
					
					}
				else if(super_platform==='adnextchild')
					{
						$('#nextstep').text(' To View all users in  Triangle');
						$('#youwillget').css("font-size","25px");
					$('#supermoneydisplay').css("font-size","25px");
						$('#youwillget').text("Add  ");
						$('#supermoneydisplay').text(" Standard User 2 to Your Triangle");
						$('#supertriangle').show();
						$('#super_child').show();
					   // $('.supersbv').attr('id','adnextchild');
						////////////////////
						
						 $('.supersbv').hide();
					   //$('#test').hide();
						/////////////
						$('.test').attr('id','adnextchild');
					
					$('.test').text("Add Next User");
					$('.test').show();
					}
				else if(super_platform==='super_filled')
					{
						mainwallet();
						$('#super_filled').show();
					}
				else if(super_platform==='super_profile')
					{
						$('#super_profile').show();
					}
				//This is creator
			}
		 else if(supersi==='child1')
			 {
				 //alert("This is a child 1");
				 //This is child1
				 var super_child1platform=data.child1[0].super_child1platform;
				 var super_child1money=data.child1[0].super_creatormoney;
				 //alert(super_child1platform);
				 if(super_child1platform==='super_child1activate')
				 {
					 super_checkchild1pay();
				
				       $('#supertriangle').show();
					 $('#supercreator_money').attr('readonly','readyonly');
					 $('#supercreator_money').val(super_child1money);
		               $('#super_payment').show();
					 
					
					 // $('.test').attr('id','super_child1converted');
					 $('.test').show();
					 $('.test').attr('id','super_child1converted');
					 $('.test').text("convert");
					 }
				 else if(super_child1platform==='super_child1filled')
					 {
						// alert("child1 filled");//here he/she will see where she is in triangle
						 mainwallet();
						 super_monitorsplit();
						 $('#super_childfilled').show();
						 $('body').css('background-color','#7d4627');
					 }
				 
				
			 }
		else if(supersi==='child2')
			{
				//alert("this is child2");
				//this is child2
				var super_child2platform=data.child2[0].super_child2platform;
				var super_child2money=data.child2[0].super_creatormoney;
				if(super_child2platform==='super_child2activate')
					{
						
						 super_checkchild2pay();
						
						 $('#supertriangle').show();
						 $('#supercreator_money').attr('readonly','readyonly');
						$('#supercreator_money').val(super_child2money);
		               $('#super_payment').show();
					   $('.test').show();
					 $('.test').attr('id','super_child2converted');
					 $('.test').text("convert");
					}
				else if(super_child2platform==='super_child2filled'){
					// alert("child2 filled");//here he/she will see where she is in triangle
				mainwallet();
					super_monitorsplit();
					 $('body').css('background-color','#7d4627');
					 $('#super_childfilled').show();
				}
				
			}
		else{
			var message="Eish! seems That You are not in Super triangle Try To split one triangle or Get an invitation";
		
		swal ( "Oops" ,  message ,  "error" );
		}
	
			
	
		
		
		
		///////////////////////////////////////////////child2 type
		
	
	}
	
});	
ev.preventDefault();
});	
});

///////////////////////

//function super_monitorsplit(){
//	"use strict";
//	$.ajax({
//		type:"get",
//		url:"./super_monitorsplit",
//		success:function()
//		{
//			
//		}
//	});
//}
//////////////////////////upgrade
$(document).ready(function(){
	"use strict";
	
	$('#upgrade').click(function(ev){
		$('#supertriangle').hide();
		///////////////////////////////
	$('.overlay').css(
			{
			 "font-size": "200%",
			  "position":"fixed",
    "top": "0",
    "left": "0",
    "height":"100%",
    "width":"100%",
    "background-color":"rgba(0,0,0,0.5)",
    "z-index":"10"
			 
			 
			});
		
		
		//////////////////LOADING
		
		$('#loading').css({
	
    "position":"fixed",
    "top":"50%", 
    "left":"50%",
   
    "z-index":"11",
			
		});
		$('#loading').show();
	
	
	///////////////////////////////
		$.ajax({
				url:"./upgrade",
				method:"post",
				data:$("#upgradeusername").serialize(),
				success:function(data)
				{
					$('#supertriangle').show();
					$('.overay').hide();
					$('#loading').hide();
					
							var check=data.resultcheck;
					if(check==='data')
						{
							swal ( "Oops" ,  "You Can not Invest Twice in Super Triangle!" ,  "error" );
						}
					else{
						super_checkcreatorpay();
			
						var btc_zar=$('#btc_zar').text();
						//var btc_zar=60000;
						var profile_earning2=$('#profile_earning2').text();
						//var profile_earning2=1500;
						var req_money=0;
						if(profile_earning2>=req_money)
							{
						//$('#supercreator_money').attr('readonly','readyonly');
						$('#supercreator_money').val(profile_earning2);
			///////////////////////////////
								$('#youwillget').text('You Will Get:');
				
				var calcul=(profile_earning2*2)+((profile_earning2*20)/100);
				$('#supermoneydisplay').text(calcul);
								
					//////////////////////////////////
						$('#supertriangle').show();
						$('#supersbv').show();
						$('.test').hide();
		                 $('#super_payment').show();
							}
						else{
							var calcul2=req_money-profile_earning2;
							var remain=parseFloat(calcul2/btc_zar)+0.00123;
							 var internal_wallet=$('#super_creatorinternwallet').val();
					var notfullpaid=`you have  ${profile_earning2} Remaining are BTC:${remain.toFixed(6)} pay on This ${internal_wallet}  "R1000" This The Minimum Amount To Upgrade`;
			 swal({
                title: "OOPS look like you have insufficient Money to Upgrade",
                text:notfullpaid,
                type: "success"
				 
		 
            });
						}
			
			
						
						
					}
							
		
					
				
		
				}
				
			});
	ev.preventDefault();
		
		
	});
	
});






//////////////////////////


///////////////////////////////super sbv
$(document).ready(function(){
	"use strict";

	
	////////////////
	$('#supersbv').click(function(ev){
		//alert("test");
			/////////////////
	$('#supertriangle').hide();
	$('.overlay').css(
			{
			 "font-size": "200%",
			  "position":"fixed",
    "top": "0",
    "left": "0",
    "height":"100%",
    "width":"100%",
    "background-color":"rgba(0,0,0,0.5)",
    "z-index":"10"
			 
			 
			});
		
		
		//////////////////LOADING
		
		$('#loading').css({
	
    "position":"fixed",
    "top":"50%", 
    "left":"50%",
   
    "z-index":"11",
			
		});
		$('#loading').show();
		$.ajax({
			type:"POST",
			url:"./createsuper",
			data:$('#formpata').serialize(),
			success:function(data)
			{
				$('#supertriangle').show();
				$('.overay').hide();
				$('#loading').hide();
			var errors=data.errors;
					if(errors===0){
				//		var paid="The Next STEP is To Add Child In Your Triangle ";
//					
//				 swal({
//               title: "Well Done!",
//                text:paid,
//                type: "success"
//		 
//            });
						swal ( "Well done!" ,  "The Next STEP is To Add Child In Your Triangle" ,  "success" );	
						$('#view_supertriangle').click();
						
						$('.confirm').removeClass('confirm');
						$('#super_payment').hide();
					}
					else if(errors===1)
						{
							 var req_money=1000;
	   var internal_wallet=$('#super_creatorinternwallet').val();
	   var btc_zar=$('#btc_zar').text();
	   var profile_earning2=$('#profile_earning2').text();
							var remainzar=req_money-profile_earning2;
							var remain=parseFloat(remainzar/btc_zar)+0.00123;
							
							var mess=`You have ${profile_earning2} You Must Add ${remain.toFixed(6)} To ${internal_wallet} for Minimum Creating Account`;
						swal ( "Look like You Have insufficient money" , mess ,  "error" );	
							//$('.confirm').removeClass('confirm');
						}
					else if(errors===2)
						{
								 var req_money2=1000;
	   var internal_wallet2=$('#super_creatorinternwallet').val();
	   var btc_zar2=$('#btc_zar').text();
	   var profile_earning3=$('#profile_earning2').text();
							var remainzar2=req_money2-profile_earning3;
							var remain2=parseFloat(remainzar2/btc_zar2)+0.00123;
							var mess2=`You have ${profile_earning3} You Must Add ${remain2.toFixed(6)} To ${internal_wallet2} for Minimum Creating Account`;
							swal ( "Oops Do  Not Act Smart!The System is Protected!" , mess2 ,  "error" );
							//$('.confirm').removeClass('confirm');
						}
					
		}
		});
		ev.preventDefault();
	});
});

/////////////////////////////////////////


$(document).ready(function(){
	"use strict";
	$('#closesupertriangle1,#closesupertriangle2').click(function(ev){
		
	$('#supertriangle').hide();
	$('.overay').hide();
		ev.preventDefault();
	});
});

///////////////////////////////////////////////////////////////////////////////////////////////////////

//////////////////////////////SUPER TRIANGLE///////////////////////////////////////////////////////////////

function super_checkchild1pay()
{
	"use strict";
	$.ajax({
		url:"./super_checkchild1pay",
		method:"get",
		success:function(data){
	if(data)
				{
			var api_money=data.api_money;
			var btc_childmoney=parseFloat(data.super_child1btcmoney)+0.00123;
			var btc_charge=data.btc_charge;
			var invest_money=api_money-btc_charge;
			var remain=btc_childmoney-invest_money;
			
			 if(btc_childmoney==='none')
				{
					var notpaid="Look Like you are not yet paid Registration fees";
			 swal({
                title: "OOPS!",
                text:notpaid,
                type: "success"
		 
            });
					$('.confirm').removeClass('confirm');
				}
			 
			else{
				    var internal_wallet=data.internal_wallet;
					var notfullpaid=`you have  ${invest_money} in your Wallet Remaining are ${remain.toFixed(6)} pay on This ${internal_wallet}`;
			 swal({
                title: "You have not yet Full paid Registration fees",
                text:notfullpaid,
                type: "success"
				 
		 
            });
			$('.confirm').removeClass('confirm');	
				
			}
			
			//console.log(data.getsbvtriangle[0].creator_values);
			
				}
			else{
				var paid="Let us continue To Invest In Triangle ";
					
				 swal({
               title: "Good Jobs Your Payment is Verified !",
                text:paid,
                type: "success"
		 
            });
			}
			
		},
			//console.log(data.getsbvtriangle[0].creator_values);
	});
}


function super_checkchild2pay()
{
	"use strict";
	$.ajax({
		url:"./super_checkchild2pay",
		method:"get",
		success:function(data){
	if(data)
				{
			var api_money=data.api_money;
			var btc_childmoney=parseFloat(data.super_child2btcmoney)+0.00123;
			var btc_charge=data.btc_charge;
			var invest_money=api_money-btc_charge;
			var remain=btc_childmoney-invest_money;
			
			 if(btc_childmoney==='none')
				{
					var notpaid="Look Like you are not yet paid Registration fees";
			 swal({
                title: "OOPS!",
                text:notpaid,
                type: "success"
		 
            });
					$('.confirm').removeClass('confirm');
				}
			 
			else{
				    var internal_wallet=data.internal_wallet;
					var notfullpaid=`you have  ${invest_money} in your Wallet Remaining are ${remain.toFixed(6)} pay on This ${internal_wallet}`;
			 swal({
                title: "You have not yet Full paid Registration fees",
                text:notfullpaid,
                type: "success"
				 
		 
            });
			$('.confirm').removeClass('confirm');	
				
			}
			
			//console.log(data.getsbvtriangle[0].creator_values);
			
				}
			else{
				var paid="Let us continue To Invest In Triangle ";
					
				 swal({
               title: "Good Jobs Your Payment is Verified !",
                text:paid,
                type: "success"
		 
            });
			}
			
		},
			//console.log(data.getsbvtriangle[0].creator_values);
	});
}
function super_checkcreatorpay(){
	"use strict";
	$.ajax({
		url:"./super_checkcreatorpay",
		method:"get",
		success:function(){
	
		}
			//console.log(data.getsbvtriangle[0].creator_values);
	});
	
}
///////////////////////////////////////NEW FEATURES///////////////////////////////
$(document).on('click',"#reinvvalue",function(ev){
	"use strict";
	////////////////////////////////////
	
	$('.overlay').css(
			{
			 "font-size": "200%",
			  "position":"fixed",
    "top": "0",
    "left": "0",
    "height":"100%",
    "width":"100%",
    "background-color":"rgba(0,0,0,0.5)",
    "z-index":"10"
			 
			 
			});
		
		
		//////////////////LOADING
		
		$('#loading').css({
	
    "position":"fixed",
    "top":"50%", 
    "left":"50%",
   
    "z-index":"11",
			
		});
		$('#loading').show();
	
	/////////////////
		$.ajax({
				url:"./reinvest",
				method:"post",
				data:$("#formdata").serialize(),
				success:function(data)
				{
					$('#loading').hide();
					$('.overay').hide();
					var errors=data.errors;
					if(errors===0){
				//		var paid="The Next STEP is To Add Child In Your Triangle ";
//					
//				 swal({
//               title: "Well Done!",
//                text:paid,
//                type: "success"
//		 
//            });
						swal ( "Well done!" ,  "The Next STEP is To Add Child In Your Triangle" ,  "success" );	
					}
					else if(errors===1)
						{
							 var req_money=500;
	   var internal_wallet=$('#super_creatorinternwallet').val();
	   var btc_zar=$('#btc_zar').text();
	   var profile_earning2=$('#profile_earning2').text();
							var remainzar=req_money-profile_earning2;
							var remain=parseFloat(remainzar/btc_zar)+0.00123;
							
							var mess=`You have ${profile_earning2} You Must Add ${remain.toFixed(6)} To ${internal_wallet} for Minimum Creating Account`;
						swal ( "Look like You Have insufficient money" , mess ,  "error" );	
							//$('.confirm').removeClass('confirm');
						}
					else if(errors===2)
						{
								 var req_money2=500;
	   var internal_wallet2=$('#super_creatorinternwallet').val();
	   var btc_zar2=$('#btc_zar').text();
	   var profile_earning3=$('#profile_earning2').text();
							var remainzar2=req_money2-profile_earning3;
							var remain2=parseFloat(remainzar2/btc_zar2)+0.00123;
							var mess2=`You have ${profile_earning3} You Must Add ${remain2.toFixed(6)} To ${internal_wallet2} for Minimum Creating Account`;
							swal ( "Oops Do  Not Act Smart!The System is Protected!" , mess2 ,  "error" );
							//$('.confirm').removeClass('confirm');
						}
					
					
				}
				
			});
	ev.preventDefault();
	
});//sbv grand triangle action
///////////////////////////////////////////////////SUPER REINVEST

$(document).on('click',"#super_reinvestvalue",function(ev){
	"use strict";
	/////////////////////////////////
	$('#supertriangle').hide();
	$('.overlay').css(
			{
			 "font-size": "200%",
			  "position":"fixed",
    "top": "0",
    "left": "0",
    "height":"100%",
    "width":"100%",
    "background-color":"rgba(0,0,0,0.5)",
    "z-index":"10"
			 
			 
			});
		
		
		//////////////////LOADING
		
		$('#loading').css({
	
    "position":"fixed",
    "top":"50%", 
    "left":"50%",
   
    "z-index":"11",
			
		});
		$('#loading').show();
	
	////////////////////////////////
	
		$.ajax({
				url:"./super_reinvest",
				method:"post",
				data:$('#formpata').serialize(),
				success:function(data)
				{
					$('#supertriangle').hide();
					$('.overay').hide();
					$('#loading').hide();
					var errors=data.errors;
					if(errors===0){
				//		var paid="The Next STEP is To Add Child In Your Triangle ";
//					
//				 swal({
//               title: "Well Done!",
//                text:paid,
//                type: "success"
//		 
//            });
						swal ( "Well done!" ,  "The Next STEP is To Add Child In Your Triangle" ,  "success" );	
					}
					else if(errors===1)
						{
							 var req_money=1000;
	   var internal_wallet=$('#super_creatorinternwallet').val();
	   var btc_zar=$('#btc_zar').text();
	   var profile_earning2=$('#super_profileamount').text();
							var remainzar=req_money-profile_earning2;
							var remain=parseFloat(remainzar/btc_zar)+0.00123;
							
							var mess=`You have ${profile_earning2} You Must Add ${remain.toFixed(6)} To ${internal_wallet} for Minimum Creating Account`;
						swal ( "Look like You Have insufficient money" , mess ,  "error" );	
							//$('.confirm').removeClass('confirm');
						}
					else if(errors===2)
						{
								 var req_money2=1000;
	   var internal_wallet2=$('#super_creatorinternwallet').val();
	   var btc_zar2=$('#btc_zar').text();
	   var profile_earning3=$('#super_profileamount').text();
							var remainzar2=req_money2-profile_earning3;
							var remain2=parseFloat(remainzar2/btc_zar2)+0.00123;
							var mess2=`You have ${profile_earning3} You Must Add ${remain2.toFixed(6)} To ${internal_wallet2} for Minimum Creating Account`;
							swal ( "Oops Do  Not Act Smart!The System is Protected!" , mess2 ,  "error" );
							//$('.confirm').removeClass('confirm');
						}
					
					
				}
				
			});
	ev.preventDefault();
	
});//sbv grand triangle action
///////////////////////////////////////////////////SUPER REINVEST
$(document).ready(function(){
	"use strict";
	$('#super_reinvest').click(function(ev){
		$('#supertriangle').show();
						$('#supersbv').show();
						
		                 $('#super_payment').show();
		var super_profileamount=$('#super_profileamount').text();
		$('#supercreator_money').val(super_profileamount);
		$('#supermoneydisplay').text("Type Amount You want To Reinvest");
		$('#youwillget').text('');
		$('.test').attr("id",'super_reinvestvalue');
		$('.test').text("submit Your Investment");
		$('.test').show();
		$('#supersbv').hide();
//		alert("do");
//		$.ajax({
//			type:"./super_reinvest",
//			url:"post",
//			data:$("#upgradeusername").serialize(),
//			success:function(data)
//			{
//			var errors=data.errors;
//				if(errors===0){
//					alert("succeed");
//				}
//				else if(errors===1)
//					{
//						alert("failed");
//					}
//				else if(errors===1)
//					{
//						
//					}
//			}
//		});
		
		
		ev.preventDefault();
	});
});

function mainwallet(){
	"use strict";
	$.ajax({
		url:"./mainwallet",
		type:"get",
		success:function()
		{
			
		}
	});
}
///////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////

//load data when apps running

$(document).ready(function(){
	//secret is to hide when login and control with account function
	"use strict";
	$('#paymessage').hide();
	$('#complete').hide();
	$('#profile').hide();
	$('#sbvfilled').hide();
	$('#editmodal').hide();
	$('#triangle_parents').hide();
	$('#nextstep').hide();
	$('#admin').hide();
	
	$('#plus').hide();
	
	$('#vcm').hide();
	
	$('#btc_charge').hide();
	$('#internal_wallet').hide();
	
	$('#btc_investcharge').hide();
    $('#internal_investwallet').hide();
	
	//$('#reinvest').hide();
	//$('#withdraw').hide();
	
	
	//$('#complete').show();
	account();
	//this is select option
	platform();
	checkusername();
	//checkstatus();
	$('#childfilled').hide();
	$('.popup').hide();
	/////////////////////////////////////////////////////////////////////////////////////////
	/////////////////////////////Super Triangle Data Hidden//////////////////////////////////////////
	//$('#supertriangle').show();
	supermoneyvalidation();
	///$('#editmodal').hide();
	
	
	$('#super_hiddeninput').hide();
	
	$('#super_child').hide();
	
	
	$('#super_payment').hide();
	$('#supersbv').hide();
	
	
	$('#super_filled').hide();
	$('#super_profile').hide();
	$('#super_childfilled').hide();
	$('#super_profile').hide();
	
	//////////////////////////////////////////////////////////////////////////////////////////////
	
		$('#loading').hide();
	
	
	moneyvalidation();
	
	
	/////////////////hide Platform data //////////////
	$('#platform').hide();
	$('#plat').hide();
	$('#adminregister').hide();
	//$('.overay').hide();
	////////////////////////////
});

///
//$("input").attr('disabled','disabled');
//To enable again, the proper method is to use .removeAttr()
//
//$("input").removeAttr('disabled');

///