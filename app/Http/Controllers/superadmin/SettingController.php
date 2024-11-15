<?php

namespace App\Http\Controllers\superadmin;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use Illuminate\Http\Request;
use App\Models\StoreInformation;
use App\Models\POSInformation;
use App\Models\CurrencyInformation;
use Carbon\Carbon; 
use Auth;
use Session;
use DB; 
use Mail; 
use Str;

class SettingController extends Controller{

    public function index(Request $request) {
        $store = StoreInformation::first();
        $pos = POSInformation::first();
        $currency = CurrencyInformation::first();
        return view('superadmin.settings.add', compact('store', 'pos', 'currency'));
    }

    public function storeInformation(Request $request) {
        $data = $request->all();
        if(!empty($data['storeID'])){
            $store = StoreInformation::where('id', $data['storeID'])->first();
            $store->store_name = $data['store_name'];
            $store->store_address = $data['store_address'];
            $store->store_phone = $data['store_phone'];
            $store->store_website = $data['store_website'];
            $store->store_email = $data['store_email'];
            $store->store_add_info = $data['store_add_info'];
            $store->store_svg_logo = $data['store_svg_logo'];
            $store->store_language = $data['store_language'];
            if($store->update()){
                return redirect()->route('superadmin.settings')->with('success', 'Store information updated successfully!');
            }else{
                return redirect()->back()->with('error', 'Something went wrong!');
            }
        }else{
            $store = new StoreInformation();
            $store->store_name = $data['store_name'];
            $store->store_address = $data['store_address'];
            $store->store_phone = $data['store_phone'];
            $store->store_website = $data['store_website'];
            $store->store_email = $data['store_email'];
            $store->store_add_info = $data['store_add_info'];
            $store->store_svg_logo = $data['store_svg_logo'];
            $store->store_language = $data['store_language'];
            if($store->save()){
                return redirect()->route('superadmin.settings')->with('success', 'Store information added successfully!');
            }else{
                return redirect()->back()->with('error', 'Something went wrong!');
            }
        }
    }

    public function posInformation(Request $request) {
        $data = $request->all();
        if(!empty($data['posID'])){
            $pos = POSInformation::where('id', $data['posID'])->first();
            $pos->delivery_feature = $data['delivery_feature'];
            $pos->cash_drawer_feature = $data['cash_drawer_feature'];
            $pos->default_vat = $data['default_vat'];
            $pos->vat_type = $data['vat_type'];
            $pos->default_delivery_charge = $data['default_delivery_charge'];
            $pos->default_discount = $data['default_discount'];
            $pos->item_audio = $data['item_audio'];
            if($pos->update()){
                return redirect()->route('superadmin.settings')->with('success', 'POS information updated successfully!');
            }else{
                return redirect()->back()->with('error', 'Something went wrong!');
            }
        }else{
            $pos = new POSInformation();
            $pos->delivery_feature = $data['delivery_feature'];
            $pos->cash_drawer_feature = $data['cash_drawer_feature'];
            $pos->default_vat = $data['default_vat'];
            $pos->vat_type = $data['vat_type'];
            $pos->default_delivery_charge = $data['default_delivery_charge'];
            $pos->default_discount = $data['default_discount'];
            $pos->item_audio = $data['item_audio'];
            if($pos->save()){
                return redirect()->route('superadmin.settings')->with('success', 'POS information added successfully!');
            }else{
                return redirect()->back()->with('error', 'Something went wrong!');
            }
        }
    }

    public function currencyInformation(Request $request) {
        $data = $request->all();
        if(!empty($data['currencyID'])){
            $currency = CurrencyInformation::where('id', $data['currencyID'])->first();
            $currency->currency_symbol = $data['currency_symbol'];
            $currency->currency_position = $data['currency_position'];
            $currency->currency_thousand_separator = $data['currency_thousand_separator'];
            $currency->currency_decimal_separator = $data['currency_decimal_separator'];
            $currency->currency_precision = $data['currency_precision'];
            $currency->currency_trailing_zeros = $data['currency_trailing_zeros'];
            if($currency->update()){
                return redirect()->route('superadmin.settings')->with('success', 'Currency information updated successfully!');
            }else{
                return redirect()->back()->with('error', 'Something went wrong!');
            }
        }else{
            $currency = new CurrencyInformation();
            $currency->currency_symbol = $data['currency_symbol'];
            $currency->currency_position = $data['currency_position'];
            $currency->currency_thousand_separator = $data['currency_thousand_separator'];
            $currency->currency_decimal_separator = $data['currency_decimal_separator'];
            $currency->currency_precision = $data['currency_precision'];
            $currency->currency_trailing_zeros = $data['currency_trailing_zeros'];
            if($currency->save()){
                return redirect()->route('superadmin.settings')->with('success', 'Currency information added successfully!');
            }else{
                return redirect()->back()->with('error', 'Something went wrong!');
            }
        }
    }
}
