@extends('layouts.app')

@section('css')
<style>
</style>
<style>

</style>
@endsection
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">Employees</div>

                <div class="card-body">
                    <div class="py-3">
                        <div class="alert alert-danger error d-none" role="alert">
                            <ul class="add-error-list"></ul>
                            </div>
                            <div class="alert alert-success success d-none" role="alert"></div>
                       <!-- Button trigger modal -->
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addModal">
                            Add Employees
                        </button>
                        
                       
                    </div>
                    <table class="table table-striped">
                        <thead>
                          <tr>
                            {{-- <th scope="col">#</th> --}}
                            <th scope="col">Name</th>
                            <th scope="col">Email</th>
                            <th scope="col">Company</th>
                            <th scope="col">Phone</th>
                            <th scope="col">Action</th>
                          </tr>
                        </thead>
                        <tbody>
                            @php  $s_no = 1; @endphp
                            @foreach ($employees as $list)
                            <tr>
                                {{-- <th scope="row">{{ $s_no }}</th> --}}
                                <td>{{$list['first_name']." " .$list['last_name']}}</td>
                                <td>{{$list['email']}}</td>
                                <td>{{$list['company_id']}}</td>
                                <td>{{$list['phone']}}</td>
                                <td>
                                    <button class="btn btn-sm btn-warning edit-employee" data-id="{{$list['id']}}">Edit</button>
                                    <button class="btn btn-sm btn-danger ml-1 delete-employee"  data-id="{{$list['id']}}">Delete</button>
                                </td>
                              </tr>
                              {{-- @php $s_no++;  @endphp --}}
                            @endforeach
                        </tbody>
                      </table>
                      <div class="row">
                        <div class="col">
                            {{ $employees->render("pagination::bootstrap-4") }}
                        </div>
                       
                      </div>
                      @include('partials.employees-modal')
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('js')

<script>
    $(document).ready( function () {
       
        
        $.ajaxSetup({
            headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        
        $('#add_form').on('submit', function(e){
            e.preventDefault();
            $.ajax({
                url:"{{url('employees')}}",
                method: 'POST',
                data: new FormData(this),
                dataType: 'json',
                contentType: false,
                cache: false,
                processData: false
            }).then(function(res){
                if(res.code == 1000){
                    $('.add-success').removeClass('d-none');
                    $('.add-success').html('<span>'+res.message+'</span>');
                    location.reload();
                }
                else{
                    $('.add-error').removeClass('d-none');
                    $.each( res.errors, function( key, err ) {
                        $('.add-error-list').append('<li>'+err+'</li>');
                    });
                    
                }
        });
    });

    $(".edit-employee").click(function(e){

        $.ajax({
                url:"{{url('employees')}}/"+$(this).attr('data-id')+'/edit',
                method: 'GET',
                contentType: false,
                cache: false,
                processData: false
            }).then(function(res){
                if(res.code == 1000){
                    var data = res.data;
                    $('#edit_first_name').val(data.first_name);
                    $('#edit_last_name').val(data.last_name);
                    $('#edit_email').val(data.email);
                    $('#edit_phone').val(data.phone);
                    $("#edit_company_id").val(data.company_id).change();
                    $('#employee_id').val(data.id);
                    $('#editModal').modal('show');
                }
                else{
                    $('.add-error').removeClass('d-none');
                    $.each( res.errors, function( key, err ) {
                        $('.add-error-list').append('<li>'+err+'</li>');
                    });
                    
                }
        });
        });


        $('#edit_form').on('submit', function(e){
            e.preventDefault();
            console.log($('#employee_id').val());
            // let myform = $("edit_form");
        // let fd = new FormData(myform );
        // let fd =  new FormData($('#edit_form').get(0))

        console.log($("edit_form").serialize());
                $.ajax({
                    url:"{{url('employees')}}/"+$('#employee_id').val(),
                    method: 'PUT',
                    // data:  new FormData($('#edit_form').get(0)),
                    data :   $("edit_form").serialize(),

                    // dataType: 'json',
                    dataType: $('#edit_form').serialize(),
                    contentType: false,
                    cache: false,
                    processData: false
                }).then(function(res){
                    if(res.code == 1000){
                        $('.add-success').removeClass('d-none');
                        $('.add-success').html('<span>'+res.message+'</span>');
                    }
                    else{
                        $('.add-error').removeClass('d-none');
                        $.each( res.errors, function( key, err ) {
                            // $('.add-error').html("<p>")
                            $('.add-error-list').append('<li>'+err+'</li>');
                        });
                        
                    }
            });
        });


    $(".delete-company").click(function(e){
        console.log('ll');

        $.ajax({
                url:"{{url('companies')}}/"+$(this).attr('data-id'),
                method: 'DELETE',
                // data: {},
                dataType: 'json',
                contentType: false,
                cache: false,
                processData: false
            }).then(function(res){
                if(res.code == 1000){
                    var data = res.data;
                    $('.success').removeClass('d-none');
                    $('.success').html(res.message);
                    location.reload();
                }
                else{
                    $('.add-error').removeClass('d-none');
                    $.each( res.errors, function( key, err ) {
                        $('.add-error-list').append('<li>'+err+'</li>');
                    });
                    
                }
        });


        });
        });




    




</script>

@endsection
