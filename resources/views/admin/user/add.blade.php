@extends('admin.layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row mt-5">
        <div class="col-xl-12">
            <div class="card custom-card">
                <div class="card-header justify-content-between">
                    <div class="card-title">
                        User Add
                    </div>
                </div>
                <div class="card-body">
                    <form method="post" action="{{ route('admin.user.store') }}" enctype="multipart/form-data" id="userForm">
                        @csrf
                        <div class="mb-3">
                            <label for="name" class="form-label fs-14 text-dark">User Name</label>
                            <div class="form-error-placing">
                                <input type="text" class="form-control" id="name" name="name" placeholder="User Name" />
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label fs-14 text-dark">User Email</label>
                            <div class="form-error-placing">
                                <input type="email" class="form-control" id="email" name="email" placeholder="User Email" />
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="role" class="form-label fs-14 text-dark">User Role</label>
                            <div class="form-error-placing">
                                <select class="form-select" id="inlineFormSelectPref" id="role" name="role">
                                    <option>Please Select Status</option>
                                    <option value="1">Super-admin</option>
                                    <option value="2">Admin</option>
                                </select>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label fs-14 text-dark">Password</label>
                            <div class="form-error-placing">
                                <input type="password" class="form-control" id="password" name="password" placeholder="User Password" />
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="confirm_password" class="form-label fs-14 text-dark">Confirm Password</label>
                            <div class="form-error-placing">
                                <input type="password" class="form-control" id="confirm_password" name="confirm_password" placeholder="User Password" />
                            </div>
                        </div>
                        <button class="btn btn-primary" type="submit">Save</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('script')
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.21.0/jquery.validate.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.21.0/additional-methods.min.js"></script>
<script type="text/javascript">
    $(document).ready(function () {
        $("#userForm").validate({
            rules: {
                name: {
                    required: true
                },
                email: {
                    required: true
                },
                role: {
                    required: true
                },
                password: {
                    required: true,
                    minlength: 8
                },
                confirm_password: {
                    required: true,
                    minlength: 8,
                    equalTo: "#password"
                }
            },
            messages: {
                name: {
                    required: "Please enter the user name!"
                },
                email: {
                    required: "Please enter the user email!"
                },
                role: {
                    required: "Please select the user role!"
                },
                password: {
                    required: "Please enter password!",
                    minlength: "Please password enter atleast 8 caharcter!"
                },
                confirm_password: {
                    required: "Please enter confirm password!",
                    minlength: "Please password enter atleast 8 caharcter!",
                    equalTo: "password and confirm password does not match!"
                }
            },
            errorPlacement: function (error, element) {
                error.insertAfter($(element).parents('div.form-error-placing')); 
            }
        });
    });
</script>
@stop