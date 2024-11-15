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
<link rel="stylesheet" href="{{ asset('backend/css/flatpickr.min.css') }}">
@stop

@section('content')
<div class="container-fluid">
    <div class="row mt-5">
        <div class="col-xl-12">
            <div class="card custom-card">
                <div class="card-header justify-content-between">
                    <div class="card-title">
                        Expense Update
                    </div>
                </div>
                <div class="card-body">
                    <form method="post" action="{{ route('admin.expense.update') }}" enctype="multipart/form-data" id="expenseForm">
                        @csrf
                        <input type="hidden" name="recID" id="recID" value="{{ $data->id }}">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="exp_name" class="form-label fs-14 text-dark">Expense Name</label>
                                    <div class="form-error-placing">
                                        <input type="text" class="form-control" id="exp_name" name="exp_name" placeholder="Expense Name" @if(!empty($data->exp_name)) value="{{$data->exp_name}}" @endif />
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="exp_date" class="form-label fs-14 text-dark">Expense Date</label>
                                    <div class="input-group">
                                        <div class="input-group-text text-muted"> <i class="ri-calendar-line"></i> </div>
                                        <input type="text" class="form-control flatpickr-input active" id="date" name="exp_date" placeholder="Choose date" readonly="readonly" @if(!empty($data->exp_date)) value="{{$data->exp_date}}" @endif>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="exp_amount" class="form-label fs-14 text-dark">Expense Amount</label>
                                    <div class="form-error-placing">
                                        <input type="text" class="form-control" id="exp_amount" name="exp_amount" placeholder="Expense Amount" @if(!empty($data->exp_amount)) value="{{$data->exp_amount}}" @endif />
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="exp_payment_mod" class="form-label fs-14 text-dark">Payment Mode</label>
                                    <div class="form-error-placing">
                                        <select class="form-select form-control" id="inlineFormSelectPref" id="exp_payment_mod" name="exp_payment_mod">
                                            <option>Please Select Payment Method</option>
                                            <option value="1" @if(!empty($data->exp_payment_mod)){{$data->exp_payment_mod == 1 ? 'selected' : ''}}@endif >Cash</option>
                                            <option value="2" @if(!empty($data->exp_payment_mod)){{$data->exp_payment_mod == 2 ? 'selected' : ''}}@endif >Check</option>
                                            <option value="3" @if(!empty($data->exp_payment_mod)){{$data->exp_payment_mod == 3 ? 'selected' : ''}}@endif>Credit Card</option>
                                            <option value="4" @if(!empty($data->exp_payment_mod)){{$data->exp_payment_mod == 4 ? 'selected' : ''}}@endif >Bank Transfer</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="mb-3">
                            <label for="exp_reason" class="form-label fs-14 text-dark">Expense Reason</label>
                            <div class="form-error-placing">
                                <textarea class="form-control" id="exp_reason" name="exp_reason" placeholder="Expense Reason">@if(!empty($data->exp_reason)){{$data->exp_reason}}@endif</textarea>
                            </div>
                        </div>
                        
                        <div class="mb-3">
                            <label for="exp_comment" class="form-label fs-14 text-dark">Expense Comments</label>
                            <div class="form-error-placing">
                                <textarea class="form-control" id="exp_comment" name="exp_comment" placeholder="Expense Comments">@if(!empty($data->exp_comment)){{$data->exp_comment}}@endif</textarea>
                            </div>
                        </div>

                        <div class="mb-3">
                            <label for="exp_receipt" class="form-label fs-14 text-dark">Receipt Image</label>
                            <div class="form-error-placing">
                                <input type="file" class="form-control" id="exp_receipt" name="exp_receipt" />
                            </div>
                            @if(!empty($data->exp_receipt))
                                <div class="img_Preview">
                                    <img src="{{ asset('backend/uploads/expense') }}/{{ $data->exp_receipt }}" style="width: 70px;" >
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
<script src="{{ asset('backend/js/flatpickr.min.js') }}"></script>
<script src="{{ asset('backend/js/date_time_pickers-43a066d2.js') }}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.21.0/jquery.validate.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.21.0/additional-methods.min.js"></script>
<script type="text/javascript">
    $(document).ready(function () {
        $("#expenseForm").validate({
            rules: {
                exp_name: {
                    required: true
                },
                exp_amount: {
                    required: true
                }
            },
            messages: {
                exp_name: {
                    required: "Please enter expense name!"
                },
                exp_amount: {
                    required: "Please enter expense amount!"
                }
            },
            errorPlacement: function (error, element) {
                error.insertAfter($(element).parents('div.form-error-placing')); 
            }
        });
    });
</script>
@stop