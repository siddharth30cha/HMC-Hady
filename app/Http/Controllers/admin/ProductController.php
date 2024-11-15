<?php
namespace App\Http\Controllers\admin;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use Carbon\Carbon; 
use Auth;
use Session;
use DB; 
use Mail; 
use Str;

class ProductController extends Controller{

    public function index(Request $request) {
        $data = Product::with('category')->orderBy('id', 'DESC')->get();
        return view('admin.product.index', compact('data'));
    }

    public function create(Request $request) {
        $categories = Category::get();
        return view('admin.product.add', compact('categories'));
    }

    public function store(Request $request) {
        $data = $request->all();
        $product = new Product();
        $product->category_id      = $data['category_id'];
        $product->prd_name      = $data['prd_name'];
        $product->prd_status    = $data['prd_status'];
        $product->prd_description = $data['prd_description'];
        $product->prd_order    = $data['prd_order'];
        $product->main_price   = $data['main_price'];
        $product->retail_price = $data['retail_price'];
        $product->wholesale_price    = $data['wholesale_price'];
        $product->prd_stock   = $data['prd_stock'];
        $product->prd_track_stock   = $data['prd_track_stock'];
        $product->prd_selling_out_stock   = $data['prd_selling_out_stock'];
        $product->prd_reatil_barcode   = $data['prd_reatil_barcode'];
        $product->prd_reatil_sku   = $data['prd_reatil_sku'];
        $product->prd_wholesale_barcode   = $data['prd_wholesale_barcode'];
        $product->prd_wholesale_sku   = $data['prd_wholesale_sku'];
        if ($request->file('prd_image')) {
            $random = Str::random(15);
            $image = $request->file('prd_image');
            $imageName = $random . '-' . time() . '.' . $image->extension();
            $image->move(public_path('backend/uploads/product'), $imageName);
            $product->prd_image = $imageName;
        }
        if($product->save()){
            return redirect()->route('admin.product')->with('success', 'Product added successfully!');
        }else{
            return redirect()->back()->with('error', 'Something went wrong!');
        }
    }

    public function edit(Request $request, $id) {
        $data = Product::find($id);
        $categories = Category::get();
        return view('admin.product.edit', compact('data', 'categories'));
    }

    public function update(Request $request) {
        $data = $request->all();
        $product = Product::where('id', $data['recID'])->first();
        $product->category_id      = $data['category_id'];
        $product->prd_name      = $data['prd_name'];
        $product->prd_status    = $data['prd_status'];
        $product->prd_description = $data['prd_description'];
        $product->prd_order    = $data['prd_order'];
        $product->main_price   = $data['main_price'];
        $product->retail_price = $data['retail_price'];
        $product->wholesale_price    = $data['wholesale_price'];
        $product->prd_stock   = $data['prd_stock'];
        $product->prd_track_stock   = $data['prd_track_stock'];
        $product->prd_selling_out_stock   = $data['prd_selling_out_stock'];
        $product->prd_reatil_barcode   = $data['prd_reatil_barcode'];
        $product->prd_reatil_sku   = $data['prd_reatil_sku'];
        $product->prd_wholesale_barcode   = $data['prd_wholesale_barcode'];
        $product->prd_wholesale_sku   = $data['prd_wholesale_sku'];
        if ($request->file('prd_image')) {
            $random = Str::random(15);
            $image = $request->file('prd_image');
            $imageName = $random . '-' . time() . '.' . $image->extension();
            $image->move(public_path('backend/uploads/product'), $imageName);
            $product->prd_image = $imageName;
        }
        if($product->update()){
            return redirect()->back()->with('success', 'Product updated successfully!');
        }else{
            return redirect()->back()->with('error', 'Something went wrong!');
        }
    }

    public function delete(Request $request){
        $data = $request->all();
        $product = Product::where('id', $data['recID'])->first();
        if(!empty($product)){
            $imagePath = public_path('backend/uploads/product/' . $product->prd_image);
            if (File::exists($imagePath)) {
                File::delete($imagePath);
                $product->delete();
            }
            return response()->json(['success' => 'Product deleted successfully!']);
        }else{
            return response()->json(['error' => 'Record not found!'], 404);
        }
    }

    public function addMultiple(Request $request) {
        return view('admin.product.addMultiple');
    }

    public function storeMultiple(Request $request){
        // dd($request->all());

        $file = $request->file('upload_CSV');

        // Open the file and read data line by line
        $fileHandle = fopen($file, 'r');
        $isFirstRow = true;

        while (($row = fgetcsv($fileHandle, 1000, ",")) !== false) {
            if ($isFirstRow) {
                $isFirstRow = false; // Skip the header row
                continue;
            }

            $product = new Product();
            $product->category_id      = $row[1];
            $product->prd_name      = $row[2];
            $product->prd_description = $row[3];
            $product->prd_status    = $row[4];
            $product->prd_order    = $row[5];
            $product->main_price   = $row[6];
            $product->retail_price = $row[7];
            $product->wholesale_price    = $row[8];
            $product->prd_stock   = $row[10];
            $product->prd_track_stock   = $row[11];
            $product->prd_selling_out_stock   = $row[12];
            $product->prd_reatil_barcode   = $row[13];
            $product->prd_reatil_sku   = $row[14];
            $product->prd_wholesale_barcode   = $row[15];
            $product->prd_wholesale_sku   = $row[16];
            $imageUrl = $row[9];
            $imageName = $this->downloadImage($imageUrl);

            $product->prd_image = $imageName;

            if($product->save()){
                echo "Product imported successfully!";
            }else{
                echo "Something went wrong!";
            }
        }
        fclose($fileHandle);
        return redirect()->route('admin.product')->with('success', 'Product imported successfully!');
    }

    private function downloadImage($url){
        $imageContents = @file_get_contents($url);
        if ($imageContents === false) {
            return null;
        }

        $imageName = Str::random(10) . '.jpg';
        $imageNameUpload = 'backend/uploads/product/' . $imageName;
        $destinationPath = public_path($imageNameUpload);
        File::put($destinationPath, $imageContents);
        return $imageName;
    }
}
