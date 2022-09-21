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
                <div class="card-header">Companies</div>

                <div class="card-body">
                    <div class="py-3">
                        <div class="alert alert-danger error d-none" role="alert">
                            <ul class="add-error-list"></ul>
                            </div>
                            <div class="alert alert-success success d-none" role="alert"></div>
                       <!-- Button trigger modal -->
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addModal">
                            Add Company
                        </button>
                        
                       
                    </div>
                    <table class="table table-striped">
                        <thead>
                          <tr>
                            <th scope="col">#</th>
                            <th scope="col">Name</th>
                            <th scope="col">Email</th>
                            <th scope="col">Logo</th>
                            <th scope="col">Website</th>
                            <th scope="col">Action</th>
                          </tr>
                        </thead>
                        <tbody>
                            @php  $s_no = 1; @endphp
                            @foreach ($companies as $list)
                            <tr>
                                <th scope="row">{{ $s_no }}</th>
                                <td>{{$list['name']}}</td>
                                <td>{{$list['email']}}</td>
                                <td>{{$list['logo']}}</td>
                                <td>{{$list['website']}}</td>
                                <td>
                                    <button class="btn btn-sm btn-warning edit-company" data-id="{{$list['id']}}">Edit</button>
                                    <button class="btn btn-sm btn-danger ml-1 delete-company"  data-id="{{$list['id']}}">Delete</button>
                                </td>
                              </tr>
                              @php $s_no++;  @endphp
                            @endforeach
                        </tbody>
                      </table>
                      <div class="row">
                        <div class="col">
                            {{ $companies->render("pagination::bootstrap-4") }}
                        </div>
                       
                      </div>
                      @include('partials.companies-modal')
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
                url:"{{url('companies')}}",
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
                        // $('.add-error').html("<p>")
                        $('.add-error-list').append('<li>'+err+'</li>');
                    });
                    
                }
        });
    });

    $(".edit-company").click(function(e){

        $.ajax({
                url:"{{url('companies')}}/"+$(this).attr('data-id')+'/edit',
                method: 'GET',
                // data: {},
                dataType: 'json',
                contentType: false,
                cache: false,
                processData: false
            }).then(function(res){
                if(res.code == 1000){
                    var data = res.data;
                    $('#edit_name').val(data.name);
                    $('#edit_email').val(data.email);
                    $('#edit_url').val(data.website);
                    $('#company_id').val(data.id);
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
            console.log($('#company_id').val());
            // let myform = $("edit_form");
        // let fd = new FormData(myform );
        // let fd =  new FormData($('#edit_form').get(0))

        console.log($("edit_form").serialize());
                $.ajax({
                    url:"{{url('companies')}}/"+$('#company_id').val(),
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
