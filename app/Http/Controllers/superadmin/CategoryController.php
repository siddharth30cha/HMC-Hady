<?php
namespace App\Http\Controllers\superadmin;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use Illuminate\Http\Request;
use App\Models\Category;
use Carbon\Carbon; 
use Auth;
use Session;
use DB; 
use Mail; 
use Str;


class CategoryController extends Controller{

	public function index(Request $request) {
		$category = Category::get();
		return view('superadmin.category.index', compact('category'));
	}

	public function create(Request $request) {
		return view('superadmin.category.add');
	}

	public function store(Request $request) {
		$data = $request->all();
		$category = new Category();
		$category->cat_name = $data['cat_name'];
        $category->cat_sort = $data['cat_sort'];
        $category->cat_status = $data['cat_status'];
		if ($request->file('cat_image')) {
            $random = Str::random(15);
            $image = $request->file('cat_image');
            $imageName = $random . '-' . time() . '.' . $image->extension();
            $image->move(public_path('backend/uploads/category'), $imageName);
            $category->cat_image = $imageName;
        }
        if($category->save()){
            return redirect()->route('superadmin.category.add')->with('success', 'Category added successfully!');
        }else{
            return redirect()->back()->with('error', 'Something went wrong!');
        }
	}

	public function edit(Request $request, $id) {
		$data = Category::find($id);
		return view('superadmin.category.edit', compact('data'));
	}

	public function update(Request $request) {
		$recd = $request->all();
		$data = Category::where('id', $recd['recID'])->first();
		$data->cat_name = $recd['cat_name'];
        $data->cat_sort = $recd['cat_sort'];
        $data->cat_status = $recd['cat_status'];
		if ($request->file('cat_image')) {
            $random = Str::random(15);
            $image = $request->file('cat_image');
            $imageName = $random . '-' . time() . '.' . $image->extension();
            $image->move(public_path('backend/uploads/category'), $imageName);
            $data->cat_image = $imageName;
        }
        if($data->update()){
            return redirect()->back()->with('success', 'Category updated successfully!');
        }else{
            return redirect()->back()->with('error', 'Something went wrong!');
        }
	}

	public function delete(Request $request){
		$data = $request->all();
        $category = Category::where('id', $data['recID'])->first();
        if(!empty($category)){
            $imagePath = public_path('backend/uploads/category/' . $category->cat_image);
            if (File::exists($imagePath)) {
                File::delete($imagePath);
                $category->delete();
            }
            return response()->json(['success' => 'Category deleted successfully!']);
        }else{
            return response()->json(['error' => 'Record not found!'], 404);
        }
	}
}
