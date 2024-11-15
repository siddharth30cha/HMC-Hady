<?php

namespace App\Http\Controllers\admin;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use Illuminate\Http\Request;
use App\Models\Expense;
use Carbon\Carbon; 
use Auth;
use Session;
use DB; 
use Mail; 
use Str;

class ExpenseController extends Controller{

    public function index(Request $request) {
        $data = Expense::get();
        return view('admin.expense.index', compact('data'));
    }

    public function create(Request $request) {
        return view('admin.expense.add');
    }

    public function store(Request $request) {
        $data = $request->all();
        $expense = new Expense();
        $expense->exp_name      = $data['exp_name'];
        $expense->exp_date      = $data['exp_date'];
        $expense->exp_amount    = $data['exp_amount'];
        $expense->exp_payment_mod = $data['exp_payment_mod'];
        $expense->exp_reason    = $data['exp_reason'];
        $expense->exp_comment   = $data['exp_comment'];
        if ($request->file('exp_receipt')) {
            $random = Str::random(15);
            $image = $request->file('exp_receipt');
            $imageName = $random . '-' . time() . '.' . $image->extension();
            $image->move(public_path('backend/uploads/expense'), $imageName);
            $expense->exp_receipt = $imageName;
        }
        if($expense->save()){
            return redirect()->route('admin.expense')->with('success', 'Expense added successfully!');
        }else{
            return redirect()->back()->with('error', 'Something went wrong!');
        }
    }

    public function edit(Request $request, $id) {
        $data = Expense::find($id);
        return view('admin.expense.edit', compact('data'));
    }

    public function update(Request $request) {
        $data = $request->all();
        $expense = Expense::where('id', $data['recID'])->first();
        $expense->exp_name = $data['exp_name'];
        $expense->exp_date = $data['exp_date'];
        $expense->exp_amount = $data['exp_amount'];
        $expense->exp_payment_mod = $data['exp_payment_mod'];
        $expense->exp_reason = $data['exp_reason'];
        $expense->exp_comment = $data['exp_comment'];
        if ($request->file('exp_receipt')) {
            $random = Str::random(15);
            $image = $request->file('exp_receipt');
            $imageName = $random . '-' . time() . '.' . $image->extension();
            $image->move(public_path('backend/uploads/expense'), $imageName);
            $expense->exp_receipt = $imageName;
        }
        if($expense->update()){
            return redirect()->back()->with('success', 'Expense updated successfully!');
        }else{
            return redirect()->back()->with('error', 'Something went wrong!');
        }
    }

    public function delete(Request $request){
        $data = $request->all();
        $expense = Expense::where('id', $data['recID'])->first();
        if(!empty($expense)){
            $imagePath = public_path('backend/uploads/expense/' . $expense->exp_receipt);
            if (File::exists($imagePath)) {
                File::delete($imagePath);
                $expense->delete();
            }
            return response()->json(['success' => 'Expense deleted successfully!']);
        }else{
            return response()->json(['error' => 'Record not found!'], 404);
        }
    }
}
