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
                        SupplierPayment Add
                    </div>
                </div>
                <div class="card-body">
                    <form method="post" action="{{ route('admin.supplier-payment.store') }}" enctype="multipart/form-data" id="SupplierPaymentForm">
                        @csrf
                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="supplier_id" class="form-label fs-14 text-dark">Supplier</label>
                                    <div class="form-error-placing">
                                        <select class="form-select form-control" id="inlineFormSelectPref" id="supplier_id" name="supplier_id">
                                            <option>Please Select Supplier</option>
                                            @if(!empty($suppliers))
                                                @foreach($suppliers as $value)
                                                    <option value="{{ $value->id }}">{{ $value->sup_name }}</option>
                                                @endforeach
                                            @endif
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="sup_payment_date" class="form-label fs-14 text-dark">Date</label>
                                    <div class="input-group">
                                        <div class="input-group-text text-muted"> <i class="ri-calendar-line"></i> </div>
                                        <input type="text" class="form-control flatpickr-input active" id="date" name="sup_payment_date" placeholder="Choose date" readonly="readonly">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="sup_payment_amount" class="form-label fs-14 text-dark">Amount</label>
                                    <div class="form-error-placing">
                                        <input type="text" class="form-control" id="sup_payment_amount" name="sup_payment_amount" placeholder="Amount" />
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="sup_payment_mode" class="form-label fs-14 text-dark">Payment Mode</label>
                                    <div class="form-error-placing">
                                        <select class="form-select form-control" id="inlineFormSelectPref" id="sup_payment_mode" name="sup_payment_mode">
                                            <option>Please Select Payment Mode</option>
                                            <option value="1">Cash</option>
                                            <option value="2">Check</option>
                                            <option value="3">Credit Card</option>
                                            <option value="4">Bank Transfer</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <div class="mb-3">
                            <label for="sup_payment_comment" class="form-label fs-14 text-dark">Comments</label>
                            <div class="form-error-placing">
                                <textarea class="form-control" id="sup_payment_comment" name="sup_payment_comment" placeholder="Comments"></textarea>
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
        $("#SupplierPaymentForm").validate({
            rules: {
                supplier_id: {
                    required: true
                },
                sup_payment_amount: {
                    required: true
                }
            },
            messages: {
                supplier_id: {
                    required: "Please select the supplier!"
                },
                sup_payment_amount: {
                    required: "Please enter the amount!"
                }
            },
            errorPlacement: function (error, element) {
                error.insertAfter($(element).parents('div.form-error-placing')); 
            }
        });
    });
</script>
@stop