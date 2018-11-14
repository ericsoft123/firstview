// JavaScript Document
$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});
//draw




/*
function get_draw(){
	'use strict';
	
	$.ajax({
		url:"./getdraw",
		type:"get",
		success:function(data){
			var str1=data.random_user[0].fname;
			var str2=data.random_user[0].lname;
			var name = str1 +" "+ str2;
				$('#name').text(name);
			$('#name').text(name);
			
		
		}
	});
}
*/
function get_winner(){
	'use strict';
	$.ajax({
		url:"./getdraw",
		type:"get",
		success:function(data){
			
			
				$('#name').text(data.random_user[0].fname);
			$('#cell').text(data.random_user[0].id);
			$('#email').text(data.random_user[0].email);
			$('#winner').text(data.random_user[0].lname);
		
		}
	});
}

function getrandom(){
	"use strict";
	
	var test=setInterval(function(){
	get_winner();	
	},200);
		
	
	setTimeout(function(){
	clearTimeout(test);
		
		$('#name').hide();

		$('#png').show();
		$('#cell').show();
		$('#winner').show();
		$('#email').show();
		$('#cell').show();
		$('#gif').hide();
		
		
	},2500);
	
	
}


$(document).ready(function(){
	
	"use strict";
	$('#randomsubmit').click(function(ev){
		$('#name').show();
		$('#gif').show();
		$('#png').hide();
		$('#email').hide();
		$('#cell').hide();
		$('#winner').hide();
		getrandom();
		ev.preventDefault();
	});
	
});

/////////////////////////////////////////////////////////////////////////////////////////////////////////////




/////////////////////////////////////////////////////////////SBV CHILD////////////////////////////////



///////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////

//load data when apps running

$(document).ready(function(){
	//secret is to hide when login and control with account function
	"use strict";
	
	//get_draw();
	
});

///
//$("input").attr('disabled','disabled');
//To enable again, the proper method is to use .removeAttr()
//
//$("input").removeAttr('disabled');

///