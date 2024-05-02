@extends('layouts.customer-nav')
@section('content')
    @vite(["resources/sass/app.scss", "resources/js/app.js"])
    <head>
        <title>Change Password</title>
        <link rel="stylesheet" href="{{asset('frontend/css/main.css')}}">
        <meta name="csrf-token" content="{{ csrf_token() }}">
    </head>
    <body style="background-color: #00001c">
    <hr class="text-white">
    <div class="container d-flex align-items-center mt-5 h-80 overflow-hidden">
        <div class="border w-20 rounded-start p-3 h-100 text-white" style="background-color: #191c33">
            @include('layouts/profile_menu')
        </div>
        <div class="border w-80 rounded-end p-3 h-100 text-white" style="background-color: #191c33">
            <div class="col-md-12">
                @include('admin.message')
            </div>
            <div class="fs-5">
                My profile
            </div>
            <div>
                Manage profile information to secure your account
            </div>
            <hr>
            <div>
                <form action="" id="changePasswordForm" name="changePasswordForm" class="row g-3 text-white">
                    <div class="col-md-12">
                        <label for="old_pwd" class="form-label">Old password</label>
                        <input type="password" class="form-control bg-dark border-0 text-white w-40" id="old_password"
                               name="old_password" placeholder="Old Password">
                        <p></p>
                    </div>

                    <div class="col-md-12">
                        <label for="new_pwd" class="form-label">New password</label>
                        <input type="password" class="form-control bg-dark border-0 text-white w-40" id="new_password"
                               name="new_password" placeholder="New Password">
                        <p></p>
                    </div>

                    <div class="col-md-12">
                        <label for="new_pwd2" class="form-label">Re-enter new password</label>
                        <input type="password" class="form-control bg-dark border-0 text-white w-40" id="confirm_password"
                               name="confirm_password" placeholder="Re-enter new password">
                        <p></p>
                    </div>
                    <div class="col-12">
                        <button id="submit" name="submit" type="submit" class="btn btn-primary rounded-5 px-4">Save</button>
                    </div>

                </form>
            </div>
        </div>
    </div>
    </body>
@endsection

@section('customJs')
    <script type="text/javascript">
        $("#changePasswordForm").submit(function (e){
            e.preventDefault()
            $('#submit').prop('disabled', true)
            $.ajax({
                url: '{{ route("process_change_password") }}',
                type: 'post',
                data: $(this).serializeArray(),
                dataType: 'json',
                success: function (response){
                    $('#submit').prop('disabled', false)
                    if (response.status == true){
                        $("#old_password").siblings('p').removeClass('invalid-feedback').html('');
                        $("#old_password").removeClass('is-invalid');
                        $("#new_password").siblings('p').removeClass('invalid-feedback').html('');
                        $("#new_password").removeClass('is-invalid');
                        $("#confirm_password").siblings('p').removeClass('invalid-feedback').html('');
                        $("#confirm_password").removeClass('is-invalid');
                        window.location.href = "{{ route('change_password') }}"
                    }else {
                        var errors = response.errors

                        if (errors.old_password) {
                            $("#old_password").siblings('p').addClass('invalid-feedback').html(errors.old_password);
                            $("#old_password").addClass('is-invalid');
                        }else {
                            $("#old_password").siblings('p').removeClass('invalid-feedback').html('');
                            $("#old_password").removeClass('is-invalid');
                        }

                        if (errors.new_password) {
                            $("#new_password").siblings('p').addClass('invalid-feedback').html(errors.new_password);
                            $("#new_password").addClass('is-invalid');
                        }else {
                            $("#new_password").siblings('p').removeClass('invalid-feedback').html('');
                            $("#new_password").removeClass('is-invalid');
                        }

                        if (errors.confirm_password) {
                            $("#confirm_password").siblings('p').addClass('invalid-feedback').html(errors.confirm_password);
                            $("#confirm_password").addClass('is-invalid');
                        }else {
                            $("#confirm_password").siblings('p').removeClass('invalid-feedback').html('');
                            $("#confirm_password").removeClass('is-invalid');
                        }
                    }
                }
            })
        })
    </script>
@endsection
