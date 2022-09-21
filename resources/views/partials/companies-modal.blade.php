 <!-- add Modal -->
 <div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="addModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form id="add_form" enctype="multipart/form-data">
                @csrf
                <div class="modal-header">
                <h5 class="modal-title" id="addModalLabel">Add Company</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                </div>
                <div class="modal-body">
                    
                    <div class="alert alert-danger add-error d-none" role="alert">
                        <ul class="add-error-list"></ul>
                        </div>
                        <div class="alert alert-success add-success d-none" role="alert"></div>
                        
                        <div class="row">
                            <div class="col-12">
                                <div class="form-group">
                                    <label for="">Company Name</label>
                                    <input type="text" class="form-control form-control-sm" id="name" name="name">
                                </div>
                                <div class="form-group">
                                    <label for="">Email</label>
                                    <input type="email" class="form-control form-control-sm" id="email" name="email">
                                </div>
                                <div class="form-group">
                                    <label for="">URL</label>
                                    <input type="text" class="form-control form-control-sm" id="url" name="url">
                                </div>
                                <div class="form-group">
                                    <label for="">Logo</label>
                                    <input type="file" class="form-control form-control-sm" id="logo" name="logo">
                                </div>
                            </div>
                        </div>
                    
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <input type="submit" id="add_company" type="submit" class="btn btn-primary" value="Save">
                </div>
            </form>
        </div>
    </div>
</div>


 <!-- Edit Modal -->
 <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form  id="edit_form" enctype="multipart/form-data">
                @csrf
                <div class="modal-header">
                <h5 class="modal-title" id="editModalLabel">Edit Company</h5>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                </div>
                <div class="modal-body">
                    
                    <div class="alert alert-danger add-error d-none" role="alert">
                        <ul class="add-error-list"></ul>
                        </div>
                        <div class="alert alert-success add-success d-none" role="alert"></div>
                        
                        <div class="row">
                            <div class="col-12">
                                <div class="form-group">
                                    <label for="">Company Name</label>
                                    <input type="text" class="form-control form-control-sm" id="edit_name" name="edit_name">
                                </div>
                                <div class="form-group">
                                    <label for="">Email</label>
                                    <input type="email" class="form-control form-control-sm" id="edit_email" name="edit_email">
                                </div>
                                <div class="form-group">
                                    <label for="">URL</label>
                                    <input type="text" class="form-control form-control-sm" id="edit_url" name="edit_url">
                                </div>
                                <div class="form-group">
                                    <label for="">Logo</label>
                                    <input type="file" class="form-control form-control-sm" id="edit_logo" name="edit_logo">
                                </div>
                                <input type="hidden" id="company_id">
                            </div>
                        </div>
                    
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <input type="submit" id="edit_company" type="submit" class="btn btn-primary" value="Save">
                </div>
            </form>
        </div>
    </div>
</div>