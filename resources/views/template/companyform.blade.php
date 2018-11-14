
<div class="modal inmodal" id="companymodal" tabindex="-1" role="dialog" aria-hidden="true" style="overflow-y: scroll; max-height:85%;  margin-top: 50px; margin-bottom:50px;">
    <div class="modal-dialog">
    <div class="modal-content animated bounceInRight" id="animatedsuper">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" id="close" onClick="close_modal();"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
               
              
                <h4 class="font-bold company_title" style="color: firebrick" >Add New Company</h4>
            </div>
            <div class="modal-body">
<!--company-->

<!--visible only on user-->	

   


<div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
    <label for="email" class="control-label">Company Name</label>
<input type="text" id="company_name" name="company_name" class="form-control " required>
<input type="hidden" name="id_company" id="id_company">



</div>


<div class="form-group{{ $errors->has('name') ? ' has-error' : '' }} ">
    <label for="email" class="control-label">Email</label>
    <input type="email" id="company_email" name="company_email" class="form-control " required>



</div>

<div class="form-group{{ $errors->has('name') ? ' has-error' : '' }} ">
    <label for="email" class="control-label websitelink">Campany website</label>
    <div class="input-group">
<input type="text" id="company_website" name="company_website" class="form-control" placeholder="Compaign Website Url i.e:https://example.co.za">

<span class="input-group-addon btn btn-danger preview" id="basic-addon1" >Website</span>

</div>

</div>


<div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
    <label for="email" class="control-label description">Company Description</label>
<textarea class="form-control" id="company_desc" name="company_desc" rows="20"></textarea>


</div>




<div class="form-group{{ $errors->has('name') ? ' has-error' : '' }} ">
    <label for="email" class="control-label">Model</label>
    <input type="text" id="company_model" name="company_model" class="form-control">



</div>


<div class="form-group{{ $errors->has('name') ? ' has-error' : '' }} ">
    <label for="email" class="control-label">Rand value</label>
    <input type="text" id="rand_value" name="rand_value" class="form-control">



</div>

<div class="form-group{{ $errors->has('name') ? ' has-error' : '' }} ">
    <label for="email" class="control-label">Logo</label>
    <input type="file" id="logo" name="logo[]" class="form-control" accept="image/gif,image/jpeg,image/jpg,image/png," required >

    <input type="hidden" id="company_logo" name="company_logo" class="form-control">

</div>

<input type="submit" class="btn btn-success" id="add_company" name="add_company" value="Create Company" >

<input type="submit" class="btn btn-success" id="edit_company" name="edit_company" value="Edit Company" style="display:none">





<!--company-->

                             
   
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-white" data-dismiss="modal" onClick="return close_modal()">Cancel</button>
              
            </div>
        </div>
    </div>
</div>
