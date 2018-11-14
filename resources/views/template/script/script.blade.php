<script type="text/javascript">
	
	$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});
	//////////////////////////////////MAIN CONTROLLER FUNCTION/////////////////////////////////////////////////////
		
		 

	
	


// get company

function getcompany(){
	//

oTable = $('#table_company').DataTable({
        "processing": true,
        "serverSide": true,
			"destroy":true,
        "ajax": "{{ route('get_company') }}",
		"columns": [
			{data: 'id', name: 'id'},
		 {data: 'company_name', name: 'company_name'},
           
			{data: 'company_email', name: 'company_email'},
			
			
			{data: 'company_website', name: 'company_website'},
		
			{data: 'action', name: 'action'}
	
 ],
 "order": [[ 0, "desc" ]]
	
	
				
    });

	//
}
// get company





 $('.preview').click(function(){
			 var url=$('#company_website').val();
				 window.location.href =url;
				 
				 //alert("hello");
		 });













	 



	
	



	

	
	
	
	
	
	

		 
		 
</script>
	   