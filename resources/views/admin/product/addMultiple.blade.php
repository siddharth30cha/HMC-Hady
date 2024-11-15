@extends('admin.layouts.app')
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
                        Multiple Product Add
                    </div>
                </div>
                <div class="card-body">
                    <form method="post" action="{{ route('admin.product.storeMultiple') }}" enctype="multipart/form-data" id="uploadCSV">
                        @csrf
                        <div class="row">
                            <div class="col-md-12">
                                <p><strong>Download Sample CSV File <a href="{{ asset('backend/products-sample.csv') }}" style="color: #845adf;text-decoration: underline;">here!</a></strong></p>
                            </div>
                            <div class="col-md-12">
                                <div class="mb-3">
                                    <label for="upload_CSV" class="form-label fs-14 text-dark">CSV Upload</label>
                                    <div class="form-error-placing">
                                        <input type="file" class="form-control" id="upload_CSV" name="upload_CSV" placeholder="Product Name" />
                                    </div>
                                </div>
                            </div>
                        </div>
                        <button class="btn btn-primary" type="submit">Upload</button>
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
        $("#uploadCSV").validate({
            rules: {
                upload_CSV: {
                    required: true,
                    extension: "csv"
                }
            },
            messages: {
                upload_CSV: {
                    required: "Please upload the csv file!",
                    extension: "Please upload the only csv file!",
                }
            },
            errorPlacement: function (error, element) {
                error.insertAfter($(element).parents('div.form-error-placing')); 
            }
        });
    });
</script>
@stop