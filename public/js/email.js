// JavaScript Document

$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

 $(document).ready(function(){
	 "use strict";

	 $('#sendmsg').click(function(ev){
		 	$('.loader').show();
		  $.ajax({
		 url:"./sendemail",
		 type:"post",
		 data:$('#contactForm').serialize(),
		 success:function(data){
			 	$('.loader').hide();
			 var erro=data.errors;
			if(erro===1)
				{
					
					$('#message2').show();
				}
			 else if(erro===2){
				$('#message2').hide();
					$('#message1').show(); 	
			 }
		 }
	 });
		ev.preventDefault(); 
	 });
	
	 });
