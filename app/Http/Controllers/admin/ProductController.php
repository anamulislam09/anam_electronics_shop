<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use App\Models\Subcategory;
use Illuminate\Http\Request;
use Illuminate\Validation\Rules\Unique;

class ProductController extends Controller
{
    public function Index()
    {
        $products = Product::latest()->get();
        return view('admin.allproducts', compact('products'));
    }
    public function AddProduct()
    {
        $category = Category::latest()->get();
        $subcategory = Subcategory::latest()->get();
        return view('admin.addproduct', compact('category', 'subcategory'));
    }

    public function StoreProduct(Request $request)
    {
        $request->validate([
            'product_name' => 'required | unique:products',
            'product_short_des' => 'required',
            'product_long_des' => 'required',
            'price' => 'required ',
            'product_category_id' => 'required',
            'product_subcategory_id' => 'required',
            'quantity' => 'required',
            'product_img' => 'required | image| mimes:jpeg,png,jpg,gif,svg|max:2048',

        ]);

        // Image upload start here
        $image = $request->file('product_img');
        $img_name = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();
        $request->product_img->move(public_path('upload'), $img_name);
        $img_url = 'upload/' . $img_name;

        // get category/subcategory id/name
        $category_id = $request->product_category_id;
        $subcategory_id = $request->product_subcategory_id;

        $category_name = Category::where('id', $category_id)->value('category_name');
        $subcategory_name = Subcategory::where('id', $subcategory_id)->value('subcategory_name');

        Product::insert([
            'product_name' => $request->product_name,
            'slug' => strtolower(str_replace(' ', '-', $request->product_name)),
            'product_short_des' => $request->product_short_des,
            'product_long_des' => $request->product_long_des,
            'price' => $request->price,
            'quantity' => $request->quantity,
            'product_category_name' => $category_name,
            'product_subcategory_name' => $subcategory_name,
            'product_category_id' => $request->product_category_id,
            'product_subcategory_id' => $request->product_subcategory_id,
            'product_img' => $img_url,
        ]);


        Category::where('id', $category_id)->increment('product_count', 1);
        Subcategory::where('id', $subcategory_id)->increment('product_count', 1);

        return redirect()->route('allproducts')->with('msg', 'Product Added successfully');
        // echo "hello";

    }

    public function EditProduct($id)
    {

        // $category  = Category::get();
        // $subcategory  = Subcategory::get();
        $product_info = Product::findOrFail($id);
        return view('admin.editproduct', compact('product_info'));
        // echo "hello";
    }

    public function UpdateProduct(Request $request)
    {
        $productId = $request->id;
        $request->validate([
            'product_name' => 'required ',
            'product_short_des' => 'required',
            'product_long_des' => 'required',
            'price' => 'required ',
            'quantity' => 'required',
            // 'product_img' => 'required | image| mimes:jpeg,png,jpg,gif,svg|max:2048',

        ]);

        // Image upload start here
        // $image = $request->file('product_img');
        // $img_name = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();
        // $request->product_img->move(public_path('upload'), $img_name);
        // $img_url = 'upload/' . $img_name;

        // get category/subcategory id/name
        // $category_id = $request->product_category_id;
        // $subcategory_id = $request->product_subcategory_id;

        // $category_name = Category::where('id', $category_id)->value('category_name');
        // $subcategory_name = Subcategory::where('id', $subcategory_id)->value('subcategory_name');

        Product::findOrFail($productId)->update([
            'product_name' => $request->product_name,
            'slug' => strtolower(str_replace(' ', '-', $request->product_name)),
            'product_short_des' => $request->product_short_des,
            'product_long_des' => $request->product_long_des,
            'price' => $request->price,
            'quantity' => $request->quantity,
            // 'product_img' => $img_url,
        ]);

        return redirect()->route('allproducts')->with('msg', 'Product Update successfully');
        // echo "hello";
    }


    public function DeleteProduct($id)
    {
        $cat_id = Product::where('id', $id)->value('product_category_id');
        $subcat_id = Product::where('id', $id)->value('product_subcategory_id');
        Product::findOrFail($id)->delete();
        Category::where('id', $cat_id)->decrement('product_count', 1);
        Subcategory::where('id', $subcat_id)->decrement('product_count', 1);

        return redirect()->route('allproducts')->with('msg', 'Product deleted successfully');
        // echo "hello";
    }
}
