<?php

namespace App\Http\Controllers\superadmin;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\Models\User;
use Carbon\Carbon; 
use Auth;
use Session;
use DB; 
use Mail; 
use Str;

class UserController extends Controller{

    public function index(Request $request) {
        $users = User::orderBy('id', 'desc')->get();
        return view('superadmin.user.index', compact('users'));
    }

    public function create(Request $request) {
        return view('superadmin.user.add');
    }

    public function store(Request $request) {
        $data = $request->all();
        $user = new User();
        $user->name = $data['name'];
        $user->email = $data['email'];
        $user->role = $data['role'];
        $user->password = Hash::make($data['password']);
        if($user->save()){
            return redirect()->route('superadmin.user')->with('success', 'User added successfully!');
        }else{
            return redirect()->back()->with('error', 'Something went wrong!');
        }
    }

    public function edit(Request $request, $id) {
        $data = User::find($id);
        return view('superadmin.user.edit', compact('data'));
    }

    public function update(Request $request) {
        $data = $request->all();
        $user = User::where('id', $data['recID'])->first();
        $user->name = $data['name'];
        $user->role = $data['role'];
        if($user->update()){
            return redirect()->back()->with('success', 'User updated successfully!');
        }else{
            return redirect()->back()->with('error', 'Something went wrong!');
        }
    }

    public function delete(Request $request){
        $data = $request->all();
        $user = User::where('id', $data['recID'])->first();
        if(!empty($user)){
            $user->delete();
            return response()->json(['success' => 'User deleted successfully!']);
        }else{
            return response()->json(['error' => 'Record not found!'], 404);
        }
    }
}
