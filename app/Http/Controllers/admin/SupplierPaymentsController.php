<?php

namespace App\Http\Controllers\admin;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use Illuminate\Http\Request;
use App\Models\SupplierPayments;
use App\Models\Supplier;
use Carbon\Carbon; 
use Auth;
use Session;
use DB; 
use Mail; 
use Str;

class SupplierPaymentsController extends Controller{

    public function index(Request $request) {
        $data = SupplierPayments::with('supplier')->orderBy('id', 'DESC')->get();
        return view('admin.supplier-payments.index', compact('data'));
    }

    public function create(Request $request) {
        $suppliers = Supplier::get();
        return view('admin.supplier-payments.add', compact('suppliers'));
    }

    public function store(Request $request) {
        $data = $request->all();
        $supplier = new SupplierPayments();
        $supplier->supplier_id = $data['supplier_id'];
        $supplier->sup_payment_date = $data['sup_payment_date'];
        $supplier->sup_payment_amount = $data['sup_payment_amount'];
        $supplier->sup_payment_mode = $data['sup_payment_mode'];
        $supplier->sup_payment_comment = $data['sup_payment_comment'];
        if($supplier->save()){
            return redirect()->route('admin.supplier-payment')->with('success', 'Supplier payment added successfully!');
        }else{
            return redirect()->back()->with('error', 'Something went wrong!');
        }
    }

    public function edit(Request $request, $id) {
        $data = SupplierPayments::find($id);
        $suppliers = Supplier::get();
        return view('admin.supplier-payments.edit', compact('data', 'suppliers'));
    }

    public function update(Request $request) {
        $data = $request->all();
        $supplier = SupplierPayments::where('id', $data['recID'])->first();
        $supplier->supplier_id = $data['supplier_id'];
        $supplier->sup_payment_date = $data['sup_payment_date'];
        $supplier->sup_payment_amount = $data['sup_payment_amount'];
        $supplier->sup_payment_mode = $data['sup_payment_mode'];
        $supplier->sup_payment_comment = $data['sup_payment_comment'];
        if($supplier->update()){
            return redirect()->back()->with('success', 'Supplier payment updated successfully!');
        }else{
            return redirect()->back()->with('error', 'Something went wrong!');
        }
    }

    public function delete(Request $request){
        $data = $request->all();
        $supplier = SupplierPayments::where('id', $data['recID'])->first();
        if(!empty($supplier)){
            $supplier->delete();
            return response()->json(['success' => 'Supplier payment deleted successfully!']);
        }else{
            return response()->json(['error' => 'Record not found!'], 404);
        }
    }
}
