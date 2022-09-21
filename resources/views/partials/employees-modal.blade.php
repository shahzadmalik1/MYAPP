 <!-- add Modal -->
 <div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="addModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form id="add_form" enctype="multipart/form-data">
                @csrf
                <div class="modal-header">
                <h5 class="modal-title" id="addModalLabel">Add Employee</h5>
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
                                <label for="">First Name</label>
                                <input type="text" class="form-control form-control-sm" id="first_name" name="first_name">
                            </div>
                            <div class="form-group">
                                <label for="">Last Name</label>
                                <input type="text" class="form-control form-control-sm" id="last_name" name="last_name">
                            </div>
                            <div class="form-group">
                                <label for="">Email</label>
                                <input type="email" class="form-control form-control-sm" id="email" name="email">
                            </div>
                            <div class="form-group">
                                <label for="">Phone#</label>
                                <input type="number" class="form-control form-control-sm" id="phone" name="phone">
                            </div>
                            <div class="form-group">
                                <label for="company_id">Company</label>
                                <select class="form-control" id="company_id" name="company_id">
                                    @foreach ($companies  as $item)
                                        <option value="{{$item->id}}">{{$item->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <input type="submit" id="edit-employee" type="submit" class="btn btn-primary" value="Save">
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
                <h5 class="modal-title" id="editModalLabel">Edit Employee</h5>
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
                                    <label for="">First Name</label>
                                    <input type="text" class="form-control form-control-sm" id="edit_first_name" name="edit_first_name">
                                </div>
                                <div class="form-group">
                                    <label for="">Last Name</label>
                                    <input type="text" class="form-control form-control-sm" id="edit_last_name" name="edit_last_name">
                                </div>
                                <div class="form-group">
                                    <label for="">Email</label>
                                    <input type="email" class="form-control form-control-sm" id="edit_email" name="edit_email">
                                </div>
                                <div class="form-group">
                                    <label for="">Phone#</label>
                                    <input type="number" class="form-control form-control-sm" id="edit_phone" name="edit_phone">
                                </div>
                                <div class="form-group">
                                    <label for="company_id">Company</label>
                                    <select class="form-control" id="edit_company_id" name="edit_company_id">
                                        @foreach ($companies  as $item)
                                            <option value="{{$item->id}}">{{$item->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <input type="hidden" id="employee_id" name="employee_id">
                            </div>
                        </div>
                    
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <input type="submit" id="edit_employee" type="submit" class="btn btn-primary" value="Save">
                </div>
            </form>
        </div>
    </div>
</div>