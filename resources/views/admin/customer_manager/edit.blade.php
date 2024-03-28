@extends('layouts.admin-navbar')
@section('content')
    <section class="content-header">
        <div class="container-fluid my-2">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Edit Customer</h1>
                </div>
                <div class="col-sm-6 text-right">
                    <a href="{{route('customerAdmin.index')}}" class="btn btn-primary">Back</a>
                </div>
            </div>
        </div>
        <!-- /.container-fluid -->
    </section>
    <!-- Main content -->
    <section class="content">
        <!-- Default box -->
        <div class="container-fluid">
            <form action="" method="post" id="editCustomerForm" name="editCustomerForm">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="first_name">First Name</label>
                                    <input type="text" name="first_name" id="first_name" class="form-control" placeholder="First Name" value="{{$customer -> first_name}}">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="last_name">Last Name</label>
                                    <input type="text" name="last_name" id="last_name" class="form-control" placeholder="Last Name" value="{{$customer -> last_name}}">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="password">Password</label>
                                    <input type="password" name="password" id="password" class="form-control" placeholder="Password" value="{{$customer -> password}}">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="email">Email</label>
                                    <input type="email" name="email" id="email" class="form-control" placeholder="Email" value="{{$customer -> email}}">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="phone_number">Phone Number</label>
                                    <input type="text" name="phone_number"  id="phone_number" class="form-control" placeholder="0359887669" value="{{$customer -> phone_number}}">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="address">Address</label>
                                    <input type="text" name="address" id="address" class="form-control" placeholder="Address" value="{{$customer -> address}}">
                                </div>
                            </div>
                            <div class="col-md-1">
                                <div class="mb-3">
                                    <label for="status">Status</label>
                                    <select name="status" id="status" class="btn btn-dark bi bi-caret-down">
                                        <option {{($customer->status == 1) ? 'selected' : ''}} value="1" >Active</option>
                                        <option {{($customer->status == 0) ? 'selected' : ''}} value="0" >Block</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="pb-5 pt-3">
                    <button class="btn btn-primary" type="submit">Update</button>
                    <a href="{{route('customerAdmin.index')}}" class="btn btn-outline-dark ml-3">Cancel</a>
                </div>
            </form>
        </div>
        <!-- /.card -->
    </section>
@endsection
@section('customJs')
    <script>
        $("#editCustomerForm").submit(function (event){
            event.preventDefault();
            var element = $(this);
            $("button[type=submit]").prop('disabled', true)
            $.ajax({
                url: '{{route('customer.update', $customer->id)}}',
                type: 'put',
                data: element.serializeArray(),
                dataType: 'json',
                success: function (response){
                    $("button[type=submit]").prop('disabled', false)

                    if (response["status"] === true){
                        window.location.href='{{route('customerAdmin.index')}}';

                        $("#first_name").removeClass('is-invalid').siblings('p').removeClass('invalid-feedback').html("");
                        $("#last_name").removeClass('is-invalid').siblings('p').removeClass('invalid-feedback').html("");
                        $("#email").removeClass('is-invalid').siblings('p').removeClass('invalid-feedback').html("");
                        $("#password").removeClass('is-invalid').siblings('p').removeClass('invalid-feedback').html("");
                        $("#phone_number").removeClass('is-invalid').siblings('p').removeClass('invalid-feedback').html("");
                        $("#address").removeClass('is-invalid').siblings('p').removeClass('invalid-feedback').html("");
                        $("#status").removeClass('is-invalid').siblings('p').removeClass('invalid-feedback').html("");
                    }else {
                        var errors = response['errors'];
                        if (errors['first_name']){
                            $("#first_name").addClass('is-invalid').siblings('p').addClass('invalid-feedback').html(errors['first_name']);
                        }else {
                            $("#first_name").removeClass('is-invalid').siblings('p').removeClass('invalid-feedback').html("");
                        }


                        if (errors['last_name']){
                            $("#last_name").addClass('is-invalid').siblings('p').addClass('invalid-feedback').html(errors['last_name']);
                        }else {
                            $("#last_name").removeClass('is-invalid').siblings('p').removeClass('invalid-feedback').html("");
                        }


                        if (errors['password']){
                            $("#password").addClass('is-invalid').siblings('p').addClass('invalid-feedback').html(errors['password']);
                        }else {
                            $("#password").removeClass('is-invalid').siblings('p').removeClass('invalid-feedback').html("");
                        }


                        if (errors['phone_number']){
                            $("#phone_number").addClass('is-invalid').siblings('p').addClass('invalid-feedback').html(errors['phone_number']);
                        }else {
                            $("#phone_number").removeClass('is-invalid').siblings('p').removeClass('invalid-feedback').html("");
                        }


                        if (errors['address']){
                            $("#address").addClass('is-invalid').siblings('p').addClass('invalid-feedback').html(errors['address']);
                        }else {
                            $("#address").removeClass('is-invalid').siblings('p').removeClass('invalid-feedback').html("");
                        }


                        if (errors['status']){
                            $("#status").addClass('is-invalid').siblings('p').addClass('invalid-feedback').html(errors['status']);
                        }else {
                            $("#status").removeClass('is-invalid').siblings('p').removeClass('invalid-feedback').html("");
                        }

                    }

                }, error: function (jqXHR, exception){
                    console.log("Something went wrong");
                }
            })
        })
    </script>
@endsection
