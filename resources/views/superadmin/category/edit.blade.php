@extends('superadmin.layouts.app')
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
                        Category Add
                    </div>
                </div>
                <div class="card-body">
                    <form method="post" action="{{ route('superadmin.category.update') }}" enctype="multipart/form-data" id="categoryForm">
                        @csrf
                        <input type="hidden" name="recID" id="recID" value="{{ $data->id }}">
                        <div class="mb-3">
                            <label for="cat_name" class="form-label fs-14 text-dark">Category Name</label>
                            <div class="form-error-placing">
                                <input type="text" class="form-control" id="cat_name" name="cat_name" placeholder="Category Name" @if(!empty($data->cat_name)) value="{{$data->cat_name}}" @endif />
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="cat_sort" class="form-label fs-14 text-dark">Category Order</label>
                            <div class="form-error-placing">
                                <input type="text" class="form-control" id="cat_sort" name="cat_sort" placeholder="Category Order" @if(!empty($data->cat_sort)) value="{{$data->cat_sort}}" @endif />
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="cat_status" class="form-label fs-14 text-dark">Category Status</label>
                            <div class="form-error-placing">
                                <select class="form-select" id="inlineFormSelectPref" id="cat_status" name="cat_status">
                                    <option>Please Select Status</option>
                                    <option value="1" @if(!empty($data->cat_status)){{$data->cat_status == 1 ? 'selected' : ''}}@endif>Active</option>
                                    <option value="2" @if(!empty($data->cat_status)){{$data->cat_status == 2 ? 'selected' : ''}}@endif>In Active</option>
                                </select>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="cat_image" class="form-label fs-14 text-dark">Category Image</label>
                            <div class="form-error-placing">
                                <input type="file" class="form-control" id="cat_image" name="cat_image" />
                            </div>
                            @if(!empty($data->cat_image))
                                <div class="img_Preview">
                                    <img src="{{ asset('backend/uploads/category') }}/{{ $data->cat_image }}" style="width: 70px;" >
                                </div>
                            @endif
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
        $("#categoryForm").validate({
            rules: {
                cat_name: {
                    required: true
                },
                cat_status: {
                    required: true
                }
            },
            messages: {
                cat_name: {
                    required: "Please enter category name!"
                },
                cat_status: {
                    required: "Please select the category status!"
                }
            },
            errorPlacement: function (error, element) {
                error.insertAfter($(element).parents('div.form-error-placing')); 
            }
        });
    });
</script>
@stop