@extends('superadmin.layouts.app')

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
                    <form method="post" action="{{ route('superadmin.category.store') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                            <label for="cat_name" class="form-label fs-14 text-dark">Category Name</label>
                            <div class="form-error-placing">
                                <input type="text" class="form-control" id="cat_name" name="cat_name" placeholder="Category Name" />
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="cat_sort" class="form-label fs-14 text-dark">Category Order</label>
                            <div class="form-error-placing">
                                <input type="text" class="form-control" id="cat_sort" name="cat_sort" placeholder="Category Order" />
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="cat_status" class="form-label fs-14 text-dark">Category Status</label>
                            <div class="form-error-placing">
                                <select class="form-select" id="inlineFormSelectPref" id="cat_status" name="cat_status">
                                    <option>Please Select Status</option>
                                    <option value="1">Active</option>
                                    <option value="2">In Active</option>
                                </select>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="cat_image" class="form-label fs-14 text-dark">Category Image</label>
                            <div class="form-error-placing">
                                <input type="file" class="form-control" id="cat_image" name="cat_image" />
                            </div>
                        </div>
                        <button class="btn btn-primary" type="submit">Submit</button>
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
        $("#sliderForm").validate({
            rules: {
                heading: {
                    required: true
                },
                description: {
                    required: true
                }
            },
            messages: {
                heading: {
                    required: "Please enter heading!"
                },
                description: {
                    required: "Please enter the short description!"
                }
            },
            errorPlacement: function (error, element) {
                error.insertAfter($(element).parents('div.form-error-placing')); 
            }
        });
    });
</script>
@stop