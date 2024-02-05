<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;

use App\Models\User;
use App\Models\Product;
use App\Models\Cart;
use App\Models\Order;
use Session;
use Stripe;

class HomeController extends Controller
{
    public function index()
    {
        $product=Product::all();
        return view('home.userpage',compact('product'));
    }

    public function redirect()
    {
        $usertype =Auth::user()->usertype;
        if($usertype=='1')
        {
            $total_product=Product::all()->count();
            $total_order=order::all()->count();
            $total_user=order::all()->count();
            $order=order::all();

            $total_revenue=0;
            foreach($order as $order)
            {
                $total_revenue=$order->price + $total_revenue;
            }

            $total_processing=order::where('delivary_status','=','processing')->count();

           $total_supplement=Product::where('category','=','Supplement')->count();
              $total_protein=Product::where('category','=','Whey Protein')->count();
                $total_mass=Product::where('category','=','Mass Gainers')->count();
                $total_preworkout=Product::where('category','=','Pre-Workout')->count();


                $total_delivered=order::where('delivary_status','=','delivered')->count();


            return view('admin.home',compact('total_product',
            'total_order','total_user','total_revenue','total_supplement',
            'total_protein','total_mass','total_preworkout', 'total_delivered','total_processing'));
        }
        else
        {
            $product=Product::all();
            return view('home.userpage',compact('product'));
        }
    }

    public function product_details($id)
    {
        $product=Product::find($id);
        return view('home.product_details',compact('product'));
    }

    public function add_cart(Request $request,$id)
    {
        if(Auth::id())
        {
           $user=Auth::user();
           $product=Product::find($id);
              $cart=new Cart;
                $cart->name=$user->name;
                $cart->email=$user->email;
                $cart->phone=$user->phone;  
                $cart->address=$user->address;
                $cart->user_id=$user->id;
                $cart->product_title=$product->title;

                if($product->discount_price!=null)
                {
                    $cart->price=$product->discount_price * $request->quantity;
                }
                else {
                    $cart->price=$product->price * $request->quantity;
                }
                $cart->image=$product->image;
                $cart->Product_id=$product->id;
                $cart->quantity=$request->quantity;
                $cart->save();

                return redirect()->back();
        }
        else
        {
            return redirect('login');
        }
    }

    public function show_cart()
    {

        if(Auth::id())
        {
            $id=Auth::user()->id;
            $cart=Cart::where('user_id','=',$id)->get();
            return view('home.showcart',compact('cart'));
        }
        else
        {
            return redirect('login');
        }
        
    }

    public function remove_cart($id)
    {
        $cart=Cart::find($id);
        $cart->delete();
        return redirect()->back();
    }

    public function cash_order()
    {
        $user=Auth::user();
        $userid=$user->id;
        $data=Cart::where('user_id','=',$userid)->get();
  
        foreach($data as $data)
        {
            $order=new order;
            $order->name=$data->name;
            $order->email=$data->email;
            $order->phone=$data->phone;
            $order->address=$data->address;
            $order->user_id=$data->user_id;


            $order->product_title=$data->product_title;
            $order->price=$data->price;
            $order->image=$data->image;
            $order->quantity=$data->quantity;
            $order->product_id=$data->Product_id;


            $order->payment_status='cash on delivery';
            $order->delivary_status='processing';
            $order->save();

            $cart_id=$data->id;
            $cart=Cart::find($cart_id);
            $cart->delete();
        }

        return redirect()->back()->with('message','Your order has been placed successfully');
       
    }

    public function stripe($totalprice)
    {
        return view('home.stripe',compact('totalprice'));
    }

    public function stripePost(Request $request,$totalprice)
    {

        
        Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));
    
        Stripe\Charge::create ([
                "amount" => $totalprice* 100,
                "currency" => "usd",
                "source" => $request->stripeToken,
                "description" => "Thankyou for Your Payment." 
        ]);

        $user=Auth::user();
        $userid=$user->id;
        $data=Cart::where('user_id','=',$userid)->get();
  
        foreach($data as $data)
        {
            $order=new order;
            $order->name=$data->name;
            $order->email=$data->email;
            $order->phone=$data->phone;
            $order->address=$data->address;
            $order->user_id=$data->user_id;


            $order->product_title=$data->product_title;
            $order->price=$data->price;
            $order->image=$data->image;
            $order->quantity=$data->quantity;
            $order->product_id=$data->Product_id;


            $order->payment_status='Paid';
            $order->delivary_status='processing';
            $order->save();

            $cart_id=$data->id;
            $cart=Cart::find($cart_id);
            $cart->delete();
        }

      
        Session::flash('success', 'Payment successful!');
              
        return back();
    }
    public function show_order()
    {
       if(Auth::id())
       {
        $user=Auth::user();
        $userid=$user->id;
        $order=order::where('user_id','=',$userid)->get();
        return view('home.order',compact('order'));
       }
       else
       {
           return redirect('login');
       }
    }

    public function cancel_order($id)
    {
        $order=order::find($id);
        $order->delivary_status='canceled';
        $order->save();
        return redirect()->back();
    }

}
