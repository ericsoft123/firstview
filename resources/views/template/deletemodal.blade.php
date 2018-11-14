<div class="modal fade" id="deletemodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title " id="exampleModalLongTitle">Are you sure you want to delete <span class="companyname_title"> </span> ?</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
        <input type="hidden" name="id_delete" id="id_delete">
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal" onClick="return close_modal()">Cancel</button>
          <button type="button" class="btn btn-danger savechange" onclick="return confirmdelete()">Confirm</button>
        </div>
      </div>
    </div>
  </div>