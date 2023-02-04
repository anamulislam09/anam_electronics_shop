<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    public function CategoryPage($id, $slug)
    {
        $category = Category::findOrFail($id);
        $products = Product::where('product_category_id', $id)->latest()->get();
        return view('user_temp.category', compact('category', 'products'));
    }

    public function SingleProduct($id)
    {
        $product = Product::findOrFail($id);
        $subcat_id = Product::where('id', $id)->value('product_subcategory_id');
        $related_product = Product::where('product_subcategory_id', $subcat_id)->latest()->get();
        return view('user_temp.singleproduct', compact('product', 'related_product'));
    }


    public function AddToCart()
    {
        return view('user_temp.addtocart');
    }

    public function AddProductToCart()
    {
        // return view('user_temp.addtocart');
        echo 'hello';
    }


    public function Checkout()
    {
        return view('user_temp.checkout');
    }
    public function UserProfile()
    {
        return view('user_temp.userprofile');
    }
    public function NewRelease()
    {
        return view('user_temp.newrelease');
    }
    public function TodaysDeal()
    {
        return view('user_temp.todaysdeal');
    }
    public function CustomerService()
    {
        return view('user_temp.customerservice');
    }

    public function PendingOrders()
    {
        return view('user_temp.pendingorders');
    }
    public function UserHistory()
    {
        return view('user_temp.user_history');
    }
}
