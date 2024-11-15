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
                        General Settings
                    </div>
                </div>
                <div class="card-body">
                    <div class="card custom-card">
                        <div class="card-body">
                            <nav class="nav nav-style-6 nav-pills mb-3 nav-justified d-sm-flex d-block" role="tablist">
                                <a class="nav-link active" data-bs-toggle="tab" role="tab" aria-current="page" href="#identification" aria-selected="true">Identification</a>
                                <a class="nav-link" data-bs-toggle="tab" role="tab" aria-current="page" href="#posInfo" aria-selected="false">POS</a>
                                <a class="nav-link" data-bs-toggle="tab" role="tab" aria-current="page" href="#currency" aria-selected="false">Currency</a>
                                <a class="nav-link" data-bs-toggle="tab" role="tab" aria-current="page" href="#dateTab" aria-selected="false">Date</a>
                                <a class="nav-link" data-bs-toggle="tab" role="tab" aria-current="page" href="#exchangeRate" aria-selected="false">Exchange Rate</a>
                                <a class="nav-link" data-bs-toggle="tab" role="tab" aria-current="page" href="#backupTab" aria-selected="false">Backup</a>
                            </nav>
                            <div class="tab-content">
                                <div class="tab-pane show active text-muted" id="identification" role="tabpanel">
                                    <form method="post" action="{{ route('admin.storeInformation') }}" enctype="multipart/form-data" id="storeInfoForm">
                                        @csrf
                                        <input type="hidden" name="storeID" id="storeID" @if(!empty($store->id)) value="{{$store->id}}" @endif>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="mb-3">
                                                    <label for="store_name" class="form-label fs-14 text-dark">Store Name</label>
                                                    <div class="form-error-placing">
                                                        <input type="text" class="form-control" id="store_name" name="store_name" placeholder="Store Name" @if(!empty($store->store_name)) value="{{$store->store_name}}" @endif />
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="mb-3">
                                                    <label for="store_address" class="form-label fs-14 text-dark">Store Address</label>
                                                    <div class="form-error-placing">
                                                        <textarea class="form-control" id="store_address" name="store_address" placeholder="Store Address">@if(!empty($store->store_address)){{$store->store_address}}@endif</textarea>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="mb-3">
                                                    <label for="store_phone" class="form-label fs-14 text-dark">Store Phone</label>
                                                    <div class="form-error-placing">
                                                        <input type="text" class="form-control" id="store_phone" name="store_phone" placeholder="Store Phone" @if(!empty($store->store_phone)) value="{{$store->store_phone}}" @endif />
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="mb-3">
                                                    <label for="store_website" class="form-label fs-14 text-dark">Store Website</label>
                                                    <div class="form-error-placing">
                                                        <input type="text" class="form-control" id="store_website" name="store_website" placeholder="Store Website" @if(!empty($store->store_website)) value="{{$store->store_website}}" @endif />
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="mb-3">
                                                    <label for="store_email" class="form-label fs-14 text-dark">Store E-mail</label>
                                                    <div class="form-error-placing">
                                                        <input type="text" class="form-control" id="store_email" name="store_email" placeholder="Store E-mail" @if(!empty($store->store_email)) value="{{$store->store_email}}" @endif />
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="mb-3">
                                                    <label for="store_add_info" class="form-label fs-14 text-dark">Store Additional Info</label>
                                                    <div class="form-error-placing">
                                                        <textarea class="form-control" id="store_add_info" name="store_add_info" placeholder="Store Additional Info">@if(!empty($store->store_add_info)){{$store->store_add_info}}@endif</textarea>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="mb-3">
                                                    <label for="store_svg_logo" class="form-label fs-14 text-dark">Store SVG Logo</label>
                                                    <div class="form-error-placing">
                                                        <textarea class="form-control" id="store_svg_logo" name="store_svg_logo" placeholder="Store SVG Logo">@if(!empty($store->store_svg_logo)){{$store->store_svg_logo}}@endif</textarea>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="mb-3">
                                                    <label for="store_language" class="form-label fs-14 text-dark">Store Language</label>
                                                    <div class="form-error-placing">
                                                        <select class="form-select form-control" id="inlineFormSelectPref" id="store_language" name="store_language">
                                                            <option>Please Select Status</option>
                                                            <option value="1" @if(!empty($store->store_language)){{$store->store_language == 1 ? 'selected' : ''}}@endif >English</option>
                                                            <option value="2" @if(!empty($store->store_language)){{$store->store_language == 2 ? 'selected' : ''}}@endif >العربية</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        @if(!empty($store->id))
                                            <button class="btn btn-primary" type="submit">Update</button>
                                        @else
                                            <button class="btn btn-primary" type="submit">Save</button>
                                        @endif
                                    </form>
                                </div>
                                <div class="tab-pane text-muted" id="posInfo" role="tabpanel">
                                    <form method="post" action="{{ route('admin.posInformation') }}" enctype="multipart/form-data" id="posInfoForm">
                                        @csrf
                                        <input type="hidden" name="posID" id="posID" @if(!empty($pos->id)) value="{{$pos->id}}" @endif>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="mb-3">
                                                    <div class="form-error-placing">
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="checkbox" value="1" name="delivery_feature" id="delivery_feature" checked="">
                                                            <label class="form-check-label" for="delivery_feature">
                                                                Enable takeout and delivery feature
                                                            </label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="mb-3">
                                                    <div class="form-error-placing">
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="checkbox" value="1" name="cash_drawer_feature" id="cash_drawer_feature" checked="">
                                                            <label class="form-check-label" for="cash_drawer_feature">
                                                                Enable cash drawer feature
                                                            </label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="mb-3">
                                                    <label for="default_vat" class="form-label fs-14 text-dark">Default Vat</label>
                                                    <div class="form-error-placing">
                                                        <input type="text" class="form-control" id="default_vat" name="default_vat" placeholder="Default Vat" @if(!empty($pos->default_vat)) value="{{$pos->default_vat}}" @endif />
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="mb-3">
                                                    <label for="vat_type" class="form-label fs-14 text-dark">Vat Type</label>
                                                    <div class="form-error-placing">
                                                        <select class="form-select form-control" id="inlineFormSelectPref" id="vat_type" name="vat_type">
                                                            <option>Please Select Type</option>
                                                            <option value="1" @if(!empty($pos->vat_type)){{$pos->vat_type == 1 ? 'selected' : ''}}@endif >Exclude</option>
                                                            <option value="2" @if(!empty($pos->vat_type)){{$pos->vat_type == 2 ? 'selected' : ''}}@endif >Include</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="mb-3">
                                                    <label for="default_delivery_charge" class="form-label fs-14 text-dark">Default Delivery Charge Value (ريال)</label>
                                                    <div class="form-error-placing">
                                                        <input type="text" class="form-control" id="default_delivery_charge" name="default_delivery_charge" placeholder="Default Delivery Charge" @if(!empty($pos->default_delivery_charge)) value="{{$pos->default_delivery_charge}}" @endif />
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="mb-3">
                                                    <label for="default_discount" class="form-label fs-14 text-dark">Default Discount Value (ريال)</label>
                                                    <div class="form-error-placing">
                                                        <input type="text" class="form-control" id="default_discount" name="default_discount" placeholder="Default Discount" @if(!empty($pos->default_discount)) value="{{$pos->default_discount}}" @endif />
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="mb-3">
                                                    <div class="form-error-placing">
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="checkbox" value="1" name="item_audio" id="item_audio" checked="">
                                                            <label class="form-check-label" for="item_audio">
                                                                New Item Audio
                                                            </label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        @if(!empty($pos->id))
                                            <button class="btn btn-primary" type="submit">Update</button>
                                        @else
                                            <button class="btn btn-primary" type="submit">Save</button>
                                        @endif
                                    </form>
                                </div>
                                <div class="tab-pane text-muted" id="currency" role="tabpanel">
                                    <form method="post" action="{{ route('admin.currencyInformation') }}" enctype="multipart/form-data" id="posInfoForm">
                                        @csrf
                                        <input type="hidden" name="currencyID" id="currencyID" @if(!empty($currency->id)) value="{{$currency->id}}" @endif>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="mb-3">
                                                    <label for="currency_symbol" class="form-label fs-14 text-dark">Currency Symbol</label>
                                                    <div class="form-error-placing">
                                                        <input type="text" class="form-control" id="currency_symbol" name="currency_symbol" placeholder="Currency Symbol" @if(!empty($currency->currency_symbol)) value="{{$currency->currency_symbol}}" @endif />
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="mb-3">
                                                    <label for="currency_position" class="form-label fs-14 text-dark">Currency Position</label>
                                                    <div class="form-error-placing">
                                                        <select class="form-select form-control" id="inlineFormSelectPref" id="currency_position" name="currency_position">
                                                            <option>Please Select Position</option>
                                                            <option value="1" @if(!empty($currency->currency_position)){{$currency->currency_position == 1 ? 'selected' : ''}}@endif >Before the amount</option>
                                                            <option value="2" @if(!empty($currency->currency_position)){{$currency->currency_position == 1 ? 'selected' : ''}}@endif >After the amount</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="mb-3">
                                                    <label for="currency_thousand_separator" class="form-label fs-14 text-dark">Currency Thousand Separator</label>
                                                    <div class="form-error-placing">
                                                        <input type="text" class="form-control" id="currency_thousand_separator" name="currency_thousand_separator" placeholder="Currency Thousand Separator" @if(!empty($currency->currency_thousand_separator)) value="{{$currency->currency_thousand_separator}}" @endif />
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="mb-3">
                                                    <label for="currency_decimal_separator" class="form-label fs-14 text-dark">Currency Decimal Separator</label>
                                                    <div class="form-error-placing">
                                                        <input type="text" class="form-control" id="currency_decimal_separator" name="currency_decimal_separator" placeholder="Currency Decimal Separator" @if(!empty($currency->currency_decimal_separator)) value="{{$currency->currency_decimal_separator}}" @endif />
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="mb-3">
                                                    <label for="currency_precision" class="form-label fs-14 text-dark">Currency Precision</label>
                                                    <div class="form-error-placing">
                                                        <select class="form-select form-control" id="inlineFormSelectPref" id="currency_precision" name="currency_precision">
                                                            <option>Please Select Precision</option>
                                                            <option value="0" @if(!empty($currency->currency_precision)){{$currency->currency_precision == 0 ? 'selected' : ''}}@endif >0 numbers after the decimal</option>
                                                            <option value="1" @if(!empty($currency->currency_precision)){{$currency->currency_precision == 1 ? 'selected' : ''}}@endif >1 numbers after the decimal</option>
                                                            <option value="2" @if(!empty($currency->currency_precision)){{$currency->currency_precision == 2 ? 'selected' : ''}}@endif >2 numbers after the decimal</option>
                                                            <option value="3" @if(!empty($currency->currency_precision)){{$currency->currency_precision == 3 ? 'selected' : ''}}@endif >3 numbers after the decimal</option>
                                                            <option value="4" @if(!empty($currency->currency_precision)){{$currency->currency_precision == 4 ? 'selected' : ''}}@endif >4 numbers after the decimal</option>
                                                            <option value="5" @if(!empty($currency->currency_precision)){{$currency->currency_precision == 5 ? 'selected' : ''}}@endif >5 numbers after the decimal</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="mb-3 mt-4">
                                                    <div class="form-error-placing">
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="checkbox" value="1" name="currency_trailing_zeros" id="currency_trailing_zeros" checked="">
                                                            <label class="form-check-label" for="currency_trailing_zeros">
                                                                Show trailing zeros
                                                            </label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        @if(!empty($currency->id))
                                            <button class="btn btn-primary" type="submit">Update</button>
                                        @else
                                            <button class="btn btn-primary" type="submit">Save</button>
                                        @endif
                                    </form>
                                </div>
                                <div class="tab-pane text-muted" id="dateTab" role="tabpanel">
                                    Why delicious magazines are killing you. Why our world would end if restaurants disappeared. Why restaurants are on crack about restaurants. How restaurants are making the world a better place. 8 great articles about minute
                                    meals. Why our world would end if healthy snacks disappeared. Why the world would end without mexican food. The evolution of chef uniforms. How not knowing food processors makes you a rookie. Why whole foods markets beat
                                    peanut butter on pancakes.
                                </div>
                                <div class="tab-pane text-muted" id="exchangeRate" role="tabpanel">
                                    Why delicious magazines are killing you. Why our world would end if restaurants disappeared. Why restaurants are on crack about restaurants. How restaurants are making the world a better place. 8 great articles about minute
                                    meals. Why our world would end if healthy snacks disappeared. Why the world would end without mexican food. The evolution of chef uniforms. How not knowing food processors makes you a rookie. Why whole foods markets beat
                                    peanut butter on pancakes.
                                </div>
                                <div class="tab-pane text-muted" id="backupTab" role="tabpanel">
                                    Why delicious magazines are killing you. Why our world would end if restaurants disappeared. Why restaurants are on crack about restaurants. How restaurants are making the world a better place. 8 great articles about minute
                                    meals. Why our world would end if healthy snacks disappeared. Why the world would end without mexican food. The evolution of chef uniforms. How not knowing food processors makes you a rookie. Why whole foods markets beat
                                    peanut butter on pancakes.
                                </div>
                            </div>
                        </div>
                    </div>
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