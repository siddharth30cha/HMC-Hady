@extends('admin.layouts.app')
@section('styles')
<style type="text/css">
    .img_Preview{
        margin-top: 15px;
        float: left;
        margin-left: 5px;
        margin-right: 5px;
        width: 100%;
        margin-bottom: 10px;
    }
    .img_Preview img {
        border: 3px solid #ddd;
    }
</style>
@stop

@section('content')
<div class="container-fluid">
    <div class="row mt-5">
        <div class="col-xl-12">
            <div class="card custom-card">
                <div class="card-header justify-content-between">
                    <div class="card-title">
                        User Edit
                    </div>
                </div>
                <div class="card-body">
                    <form method="post" action="{{ route('admin.user.update') }}" enctype="multipart/form-data" id="userForm">
                        @csrf
                        <input type="hidden" name="recID" id="recID" value="{{ $data->id }}">
                        <div class="mb-3">
                            <label for="name" class="form-label fs-14 text-dark">Category Name</label>
                            <div class="form-error-placing">
                                <input type="text" class="form-control" id="name" name="name" placeholder="User Name" @if(!empty($data->name)) value="{{$data->name}}" @endif />
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label fs-14 text-dark">User Email</label>
                            <div class="form-error-placing">
                                <input type="email" class="form-control" id="email" name="email" readonly disabled placeholder="User Email" @if(!empty($data->email)) value="{{$data->email}}" @endif />
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="role" class="form-label fs-14 text-dark">User Role</label>
                            <div class="form-error-placing">
                                <select class="form-select" id="inlineFormSelectPref" id="role" name="role">
                                    <option>Please Select Status</option>
                                    <option value="1" @if(!empty($data->role)){{$data->role == 1 ? 'selected' : ''}}@endif>Super-admin</option>
                                    <option value="2" @if(!empty($data->role)){{$data->role == 2 ? 'selected' : ''}}@endif>Admin</option>
                                </select>
                            </div>
                        </div>
                        <div class="mb-3">
                            <button class="btn btn-primary" type="submit">Update</button>
                        </div>
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
                role: {
                    required: true
                }
            },
            messages: {
                name: {
                    required: "Please enter the user name!"
                },
                role: {
                    required: "Please select the user role!"
                }
            },
            errorPlacement: function (error, element) {
                error.insertAfter($(element).parents('div.form-error-placing')); 
            }
        });
    });
</script>
@stop