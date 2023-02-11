<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\Category;
use App\Models\Order;
use App\Models\Product;
use App\Models\ShippingInfo;
use App\Models\User;
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

    public function PlaceOrder()
    {
        $userid = Auth::id();
        $user_name = User::where('id', $userid)->value('name');
        $shipping_address = ShippingInfo::where('user_id', $userid)->first();
        $cart_item = Cart::where('user_id', $userid)->get();

        foreach ($cart_item as $item) {
            Order::insert([
                'user_id' => $userid,
                'user_name' => $user_name,
                'shipping_phoneNumber' => $shipping_address->phone_number,
                'shipping_address' => $shipping_address->address,
                'shipping_postalcode' => $shipping_address->postal_code,
                'product_id' => $item->product_id,
                'quantity' => $item->quantity,
                'total_price' => $item->price,
            ]);

            $id = $item->id;
            Cart::findOrFail($id)->delete();
        }
        ShippingInfo::where('user_id', $userid)->first()->delete();

        return redirect()->route('pendingorders')->with('msg', 'your order has been placed successfully');
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
    public function FutureCollection()
    {
        return view('user_temp.future-collection');
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
        $pending_orders = Order::where('status', 'pending')->latest()->get();

        return view('user_temp.pendingorders', compact('pending_orders'));
    }
    public function UserHistory()
    {
        return view('user_temp.user_history');
    }
}
