<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\Category;
use App\Models\Product;
use App\Models\ShippingInfo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
        $userid = Auth::id();
        $cart_items = Cart::where('user_id', $userid)->get();
        return view('user_temp.addtocart', compact('cart_items'));
    }



    public function AddProductToCart(Request $request)
    {
        $product_price = $request->price;
        $quantity = $request->quantity;
        $price = $product_price * $quantity;

        Cart::insert([
            'product_id' => $request->product_id,
            'user_id' => Auth::id(),
            'quantity' => $request->quantity,
            'price' => $price,

        ]);
        return redirect()->route('addtocart')->with('msg', 'Your item added to cart Successfully');
        // echo 'hello';
    }

    public function RemoveCartItem($id)
    {
        Cart::findOrFail($id)->delete();
        return redirect()->route('addtocart')->with('msg', 'Your item removed form cart Successfully');
    }


    public function Checkout()
    {

        $userid = Auth::id();
        // echo "$userid";
        $cart_item = Cart::where('user_id', $userid)->get();
        // echo "$cart_item";
        $shipping_address = ShippingInfo::where('user_id', $userid)->get();
        // echo "$shipping_address";
        return view('user_temp.checkout', compact('cart_item', 'shipping_address'));
    }


    public function GetShippingAddress()
    {
        // echo "hello";
        return view('user_temp.shipping_address');
    }

    public function addshippingaddress(Request $request)
    {
        ShippingInfo::insert([
            'user_id' => Auth::id(),
            'phone_number' => $request->phone_number,
            'address' => $request->address,
            'postal_code' => $request->postal_code,
        ]);
        return redirect()->route('checkout');
        // echo 'hello';
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
