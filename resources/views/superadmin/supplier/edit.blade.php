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
                        Supplier Update
                    </div>
                </div>
                <div class="card-body">
                    <form method="post" action="{{ route('superadmin.supplier.update') }}" enctype="multipart/form-data" id="supplierForm">
                        @csrf
                        <input type="hidden" name="recID" id="recID" value="{{ $data->id }}">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="sup_name" class="form-label fs-14 text-dark">Supplier Name</label>
                                    <div class="form-error-placing">
                                        <input type="text" class="form-control" id="sup_name" name="sup_name" placeholder="Supplier Name" @if(!empty($data->sup_name)) value="{{$data->sup_name}}" @endif />
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="sup_email" class="form-label fs-14 text-dark">Supplier Email</label>
                                    <div class="form-error-placing">
                                        <input type="email" class="form-control" id="sup_email" name="sup_email" placeholder="Supplier Email" @if(!empty($data->sup_email)) value="{{$data->sup_email}}" @endif />
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="sup_address" class="form-label fs-14 text-dark">Supplier Address</label>
                            <div class="form-error-placing">
                                <textarea class="form-control" id="sup_address" name="sup_address" placeholder="Supplier Address">@if(!empty($data->sup_address)){{$data->sup_address}}@endif</textarea>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="sup_number" class="form-label fs-14 text-dark">Supplier Phone Number</label>
                                    <div class="form-error-placing">
                                        <input type="text" class="form-control" id="sup_number" name="sup_number" placeholder="Supplier Phone Number" @if(!empty($data->sup_number)) value="{{$data->sup_number}}" @endif />
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="sup_status" class="form-label fs-14 text-dark">Supplier Status</label>
                                    <div class="form-error-placing">
                                        <select class="form-select" id="inlineFormSelectPref" id="sup_status" name="sup_status">
                                            <option value="1" @if(!empty($data->sup_status)){{$data->sup_status == 1 ? 'selected' : ''}}@endif>Active</option>
                                            <option value="2" @if(!empty($data->sup_status)){{$data->sup_status == 2 ? 'selected' : ''}}@endif>Inactive</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="sup_note" class="form-label fs-14 text-dark">Supplier Note</label>
                            <div class="form-error-placing">
                                <textarea class="form-control" id="sup_note" name="sup_note" placeholder="Supplier Note">@if(!empty($data->sup_note)){{$data->sup_note}}@endif</textarea>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="sup_image" class="form-label fs-14 text-dark">Supplier Image</label>
                            <div class="form-error-placing">
                                <input type="file" class="form-control" id="sup_image" name="sup_image" />
                            </div>
                            @if(!empty($data->sup_image))
                                <div class="img_Preview">
                                    <img src="{{ asset('backend/uploads/supplier') }}/{{ $data->sup_image }}" style="width: 70px;" >
                                </div>
                            @endif
                        </div>
                        <button class="btn btn-primary" type="submit">Update</button>
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
        $("#supplierForm").validate({
            rules: {
                sup_name: {
                    required: true
                },
                sup_email: {
                    required: true
                }
            },
            messages: {
                sup_name: {
                    required: "Please enter supplier name!"
                },
                sup_email: {
                    required: "Please enter supplier email!"
                }
            },
            errorPlacement: function (error, element) {
                error.insertAfter($(element).parents('div.form-error-placing')); 
            }
        });
    });
</script>
@stop