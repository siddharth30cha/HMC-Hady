<?php

namespace App\Http\Controllers\admin;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use Illuminate\Http\Request;
use App\Models\Supplier;
use Carbon\Carbon; 
use Auth;
use Session;
use DB; 
use Mail; 
use Str;

class SupplierController extends Controller{

    public function index(Request $request) {
        $data = Supplier::get();
        return view('admin.supplier.index', compact('data'));
    }

    public function create(Request $request) {
        return view('admin.supplier.add');
    }

    public function store(Request $request) {
        $data = $request->all();
        $supplier = new Supplier();
        $supplier->sup_name = $data['sup_name'];
        $supplier->sup_email = $data['sup_email'];
        $supplier->sup_address = $data['sup_address'];
        $supplier->sup_number = $data['sup_number'];
        $supplier->sup_note = $data['sup_note'];
        $supplier->sup_status = $data['sup_status'];
        if ($request->file('sup_image')) {
            $random = Str::random(15);
            $image = $request->file('sup_image');
            $imageName = $random . '-' . time() . '.' . $image->extension();
            $image->move(public_path('backend/uploads/supplier'), $imageName);
            $supplier->sup_image = $imageName;
        }
        if($supplier->save()){
            return redirect()->route('admin.supplier')->with('success', 'Supplier added successfully!');
        }else{
            return redirect()->back()->with('error', 'Something went wrong!');
        }
    }

    public function edit(Request $request, $id) {
        $data = Supplier::find($id);
        return view('admin.supplier.edit', compact('data'));
    }

    public function update(Request $request) {
        $data = $request->all();
        $supplier = Supplier::where('id', $data['recID'])->first();
        $supplier->sup_name = $data['sup_name'];
        $supplier->sup_email = $data['sup_email'];
        $supplier->sup_address = $data['sup_address'];
        $supplier->sup_number = $data['sup_number'];
        $supplier->sup_note = $data['sup_note'];
        $supplier->sup_status = $data['sup_status'];
        if ($request->file('sup_image')) {
            $random = Str::random(15);
            $image = $request->file('sup_image');
            $imageName = $random . '-' . time() . '.' . $image->extension();
            $image->move(public_path('backend/uploads/supplier'), $imageName);
            $supplier->sup_image = $imageName;
        }
        if($supplier->update()){
            return redirect()->back()->with('success', 'Supplier updated successfully!');
        }else{
            return redirect()->back()->with('error', 'Something went wrong!');
        }
    }

    public function delete(Request $request){
        $data = $request->all();
        $supplier = Supplier::where('id', $data['recID'])->first();
        if(!empty($supplier)){
            $imagePath = public_path('backend/uploads/supplier/' . $supplier->sup_image);
            if (File::exists($imagePath)) {
                File::delete($imagePath);
                $supplier->delete();
            }
            return response()->json(['success' => 'Supplier deleted successfully!']);
        }else{
            return response()->json(['error' => 'Record not found!'], 404);
        }
    }
}
