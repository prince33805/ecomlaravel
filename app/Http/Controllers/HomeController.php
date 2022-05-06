<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;

use Illuminate\Support\Facades\DB;

use App\Models\User;

use App\Models\Product;

use App\Models\Cart;

use App\Models\Order;

use App\Models\Category;

class HomeController extends Controller
{
    public function redirect(){
        $usertype = Auth::user()->usertype;
        if($usertype=='1'){
            return view('admin.home');
        }
        else{
            $data = product::paginate(6);
            $category=category::all();
            $user=auth()->user();
            $count=cart::where('phone',$user->phone)->count();
            return view('user.home',compact('data','count','category'));
        }
    }

    public function index(){
        if(Auth::id()){
            return redirect('redirect');
        }else{
            $data = product::paginate(6);
            return view('user.home',compact('data'));
        }
    }

    public function search(Request $request){
        if(Auth::id()){    
            $user=auth()->user();
            $count=cart::where('phone',$user->phone)->count();
        }else{
            $count=0;
        }
        
        $search=$request->search;
        if($search==''){
            $data = product::paginate(6);
            return view('user.home',compact('data'));
        }

        $data=product::where('title','Like','%'.$search.'%')->get();
        return view('user.home',compact('data','count'));
    }

    public function addcart(Request $request,$id){
        if(Auth::id()){
            $user=auth()->user();
            $product=product::find($id);
            $cart=new cart;
            $cart->name=$user->name;
            $cart->phone=$user->phone;
            $cart->address=$user->address;
            $cart->product_title=$product->title;
            $cart->price=$product->price;
            $cart->quantity=$request->quantity;
            $cart->save();
            
            
            return redirect()->back()->with('message','Product Updated Successfully');
        }else{
            return redirect('login');
        }

    }
    
    public function showcart(Request $request){
        $user=auth()->user();
        $cart=cart::where('phone',$user->phone)->get();
        $count=cart::where('phone',$user->phone)->count();
            
        return view('user.showcartt',compact('count','cart'));
    }

    public function deletecart($id){
        $data=cart::find($id);
        $data->delete();
        return redirect()->back()->with('message','Product Removed Successfully');
    }


    public function confirmorder(Request $request){
        $user=auth()->user();
        $name=$user->name;
        $phone=$user->phone;
        $address=$user->address;
        foreach($request->productname as $key=>$productname){
            $order= new order;
            $order->product_name=$request->productname[$key];
            $order->price=$request->price[$key];
            $order->quantity=$request->quantity[$key];
            $order->name=$name;
            $order->phone=$phone;
            $order->address=$address;
            $order->status='not delivered';
            $order->save();
        }
        DB::table('carts')->where('phone',$phone)->delete();
        return redirect()->back()->with('message','Product Ordered Successfully');
    }

    public function product_details($id){
        if(Auth::id()){
            $product=product::find($id);
            $user=auth()->user();
            $count=cart::where('phone',$user->phone)->count();
            return view('user.product_details',compact('product','count'));
        }else{
            $product=product::find($id);
            return view('user.product_details',compact('product'));
        }
    }
       
    public function aboutus(){
        $product=product::all(); 
        $category=category::all();
        $user=auth()->user();
        $count=cart::where('phone',$user->phone)->count();
            
        return view('user.aboutuss',compact('category','count','product'));
    }
}

