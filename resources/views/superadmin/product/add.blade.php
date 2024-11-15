@extends('superadmin.layouts.app')
@section('styles')
<link rel="stylesheet" href="{{ asset('backend/css/flatpickr.min.css') }}">
@stop

@section('content')
<div class="container-fluid">
    <div class="row mt-5">
        <div class="col-xl-12">
            <div class="card custom-card">
                <div class="card-header justify-content-between">
                    <div class="card-title">
                        Product Add
                    </div>
                </div>
                <div class="card-body">
                    <form method="post" action="{{ route('superadmin.product.store') }}" enctype="multipart/form-data" id="productForm">
                        @csrf
                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="category_id" class="form-label fs-14 text-dark">Category</label>
                                    <div class="form-error-placing">
                                        <select class="form-select form-control" id="inlineFormSelectPref" id="category_id" name="category_id">
                                            <option>Please Select Category</option>
                                            @if(!empty($categories))
                                                @foreach($categories as $value)
                                                    <option value="{{ $value->id }}">{{ $value->cat_name }}</option>
                                                @endforeach
                                            @endif
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="prd_name" class="form-label fs-14 text-dark">Product Name</label>
                                    <div class="form-error-placing">
                                        <input type="text" class="form-control" id="prd_name" name="prd_name" placeholder="Product Name" />
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="prd_status" class="form-label fs-14 text-dark">Status</label>
                                    <div class="form-error-placing">
                                        <select class="form-select form-control" id="inlineFormSelectPref" id="prd_status" name="prd_status">
                                            <option>Please Select Status</option>
                                            <option value="1">Active</option>
                                            <option value="2">Inactive</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="prd_description" class="form-label fs-14 text-dark">Description</label>
                                    <div class="form-error-placing">
                                        <textarea class="form-control" id="prd_description" name="prd_description" placeholder="Description"></textarea>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="prd_order" class="form-label fs-14 text-dark">Product Sorting</label>
                                    <div class="form-error-placing">
                                        <input type="text" class="form-control" id="prd_order" name="prd_order" placeholder="Product Sorting" />
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="main_price" class="form-label fs-14 text-dark">Product Price</label>
                                    <div class="form-error-placing">
                                        <input type="text" class="form-control" id="main_price" name="main_price" placeholder="Product Price" />
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="retail_price" class="form-label fs-14 text-dark">Retailsale Price</label>
                                    <div class="form-error-placing">
                                        <input type="text" class="form-control" id="retail_price" name="retail_price" placeholder="Retailsale Price" />
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="wholesale_price" class="form-label fs-14 text-dark">Wholesale Price</label>
                                    <div class="form-error-placing">
                                        <input type="text" class="form-control" id="wholesale_price" name="wholesale_price" placeholder="Wholesale Price" />
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="prd_stock" class="form-label fs-14 text-dark">In Stock</label>
                                    <div class="form-error-placing">
                                        <input type="text" class="form-control" id="prd_stock" name="prd_stock" placeholder="In Stock" />
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3 mt-4">
                                    <div class="form-error-placing">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" value="1" name="prd_track_stock" id="prd_track_stock" checked="">
                                            <label class="form-check-label" for="prd_track_stock">
                                                Track Stock
                                            </label>
                                        </div>
                                    </div>

                                    <div class="form-error-placing">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" value="1" name="prd_selling_out_stock" id="prd_selling_out_stock" checked="">
                                            <label class="form-check-label" for="prd_selling_out_stock">
                                                Keep selling when out of stock
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="prd_reatil_barcode" class="form-label fs-14 text-dark">Retail Barcode</label>
                                    <div class="form-error-placing">
                                        <input type="text" class="form-control" id="prd_reatil_barcode" name="prd_reatil_barcode" placeholder="Retail Barcode" />
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="prd_reatil_sku" class="form-label fs-14 text-dark">Retail SKU</label>
                                    <div class="form-error-placing">
                                        <input type="text" class="form-control" id="prd_reatil_sku" name="prd_reatil_sku" placeholder="Retail SKU" />
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="prd_wholesale_barcode" class="form-label fs-14 text-dark">Wholesale Barcode</label>
                                    <div class="form-error-placing">
                                        <input type="text" class="form-control" id="prd_wholesale_barcode" name="prd_wholesale_barcode" placeholder="Wholesale Barcode" />
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="prd_wholesale_sku" class="form-label fs-14 text-dark">Wholesale SKU</label>
                                    <div class="form-error-placing">
                                        <input type="text" class="form-control" id="prd_wholesale_sku" name="prd_wholesale_sku" placeholder="Wholesale SKU" />
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="prd_image" class="form-label fs-14 text-dark">Product Image</label>
                                    <div class="form-error-placing">
                                        <input type="file" class="form-control" id="prd_image" name="prd_image" />
                                    </div>
                                </div>
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
<script src="{{ asset('backend/js/flatpickr.min.js') }}"></script>
<script src="{{ asset('backend/js/date_time_pickers-43a066d2.js') }}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.21.0/jquery.validate.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.21.0/additional-methods.min.js"></script>
<script type="text/javascript">
    $(document).ready(function () {
        $("#productForm").validate({
            rules: {
                prd_name: {
                    required: true
                },
                prd_description: {
                    required: true
                }
            },
            messages: {
                prd_name: {
                    required: "Please enter the product name!"
                },
                prd_description: {
                    required: "Please enter the product description!"
                }
            },
            errorPlacement: function (error, element) {
                error.insertAfter($(element).parents('div.form-error-placing')); 
            }
        });
    });
</script>
@stop