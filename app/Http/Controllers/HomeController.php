<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;

use Illuminate\Support\Facades\DB;

use App\Models\User;

use App\Models\Product;

use App\Models\Cart;

use App\Models\Order;

use App\Models\Contact;

use App\Models\Category;
use App\Models\Orderheader;

class HomeController extends Controller
{
    // public function redirect(){
    //     $usertype = Auth::user()->usertype;
    //     if($usertype=='1'){
    //         return view('admin.home');
    //     }
    //     else{
    //         $data = product::paginate(6);
    //         $category=category::all();
    //         $categoryname='category';
    //         $user=auth()->user();
    //         $count=cart::where('phone',$user->phone)->count();
    //         return view('user.home',compact('data','count','category','categoryname'));
    //     }
    // }

    public function index(){
        if(Auth::id()){
            $usertype = Auth::user()->usertype;
            //admin
            if($usertype=='1'){
                return redirect('indexAdmin');
            }else{
                //member
                $data = product::paginate(6);
                $category=category::all();
                $categoryname='category';
                $user=auth()->user();
                $count = DB::table('carts')
                 ->where('phone',$user->phone)
                 ->get()
                 ->sum('quantity');
                return view('user.home',compact('data','count','category','categoryname'));
            }
            
        }else{
            // guest
            $data = product::paginate(6);
            $category=category::all();
            return view('user.home',compact('data','category'));
        }
    }

    public function search(Request $request){
        if(Auth::id()){    
            $user=auth()->user();
            $count = DB::table('carts')
                 ->where('phone',$user->phone)
                 ->get()
                 ->sum('quantity');
        }else{
            $count=0;
        }
        $categoryname='category';
        $category=category::all();
        $search=$request->search;
        if($search==''){
            $data = product::paginate(6);
            return view('user.home',compact('data','count','categoryname','category'));
        }   
        $data=product::where('title','Like','%'.$search.'%')->get();
        // echo $data;
        return view('user.home',compact('data','count','categoryname','category'));
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
            $cart->quantity=$request->quantity;
            $cart->priceperpiece=$product->price;
            $cart->price=$product->price*$request->quantity;
            $cart->save();
            
            return redirect()->back()->with('message','Product Updated Successfully');
        }else{
            return redirect('login');
        }

    }
    
    public function showcart(Request $request){
        $user=auth()->user();
        $cart2=cart::where('phone',$user->phone)->get()->unique('product_title');
        $cart1=cart::select('product_title')->where('phone',$user->phone)->get()->unique('product_title');
        $cart = DB::table('carts')->select('product_title','priceperpiece','price','id',DB::raw('SUM(quantity) as quantity'))
                 ->where('phone',$user->phone)
                 ->groupBy('product_title')
                 ->get();
        
        $totalquantity=0;$totalprice=0;
        $count = DB::table('carts')
                 ->where('phone',$user->phone)
                 ->get()
                 ->sum('quantity');    
        return view('user.showcartt',compact('count','cart','totalquantity','totalprice'));
    }

    public function deletecart($product_title){
        $user=auth()->user();
        $data=DB::table('carts')
        ->where('phone',$user->phone)
        ->where('product_title',$product_title)
        ->delete();
        // $delete=cart::destroy($data);
        
        return redirect()->back()->with('message','Product Removed Successfully');
    }


    public function confirmorder(Request $request){
        $user=auth()->user();
        $name=$user->name;
        $phone=$user->phone;
        $address=$user->address;
        $email=$user->email;
        $totalquantity=$request->get('totalquantity');
        $totalprice=$request->get('totalprice');

        $orderheader = new Orderheader;
        $orderheader->name=$name;
        $orderheader->phone=$phone;
        $orderheader->address=$address;
        $orderheader->email=$email;
        $orderheader->totalquantity=$totalquantity;
        $orderheader->totalprice=$totalprice;
        $orderheader->status='not delivered';
        $orderheader->save();
        
        foreach($request->product_title as $key=>$product_title){
            $order= new order;
            $order->orderheaderid=$orderheader->id;
            $order->product_title=$request->product_title[$key];
            $order->price=$request->price[$key];
            $order->priceperpiece=$request->priceperpiece[$key];
            $order->quantity=$request->quantity[$key];
            $order->name=$name;
            $order->phone=$phone;
            $order->status='not delivered';
            $order->save();

            $product = DB::table('products')
                 ->where('title',$order->product_title)
                 ->decrement('quantity',$order->quantity);
        }

        DB::table('carts')->where('phone',$phone)->delete();
        return redirect()->back()->with('message','Product Ordered Successfully');
    }

    #update product
    // public function updateproduct(){

    // }

    public function product_details($id){
        if(Auth::id()){
            $product=product::find($id);
            $user=auth()->user();
            $count = DB::table('carts')
                 ->where('phone',$user->phone)
                 ->get()
                 ->sum('quantity');
                
            return view('user.product_details',compact('product','count'));
        }else{
            $product=product::find($id);
            return view('user.product_details',compact('product'));
        }
    }
       
    public function aboutus(){
        if(Auth::id()){
            $product=product::all(); 
            $category=category::all();
            $user=auth()->user();
            $count = DB::table('carts')
                 ->where('phone',$user->phone)
                 ->get()
                 ->sum('quantity');
                
            return view('user.aboutuss',compact('category','count','product'));
        }else{
            $product=product::all(); 
            $category=category::all();
            $user=auth()->user();
            $count=0;
            return view('user.aboutuss',compact('category','count','product'));
        }
    }

    public function product_category($category_name){
        if(Auth::id()){
            $user=auth()->user();
            $count = DB::table('carts')
                 ->where('phone',$user->phone)
                 ->get()
                 ->sum('quantity');
                
        }else{
            $count=0;
        }
        $category=category::all();
        $product = product::all();
        $categoryname = Category::find($category_name);
        $data = $product->where('category',$category_name);
        // $data = product::where('category','aaa');
        return view('user.product_categoryy',compact('category','data','category_name','count'));
    }

    public function showorder(){
        if(Auth::id()){
            $product=product::all(); 
            $category=category::all();
            $user=auth()->user();
            $count = DB::table('carts')
                 ->where('phone',$user->phone)
                 ->get()
                 ->sum('quantity');
            $order=Orderheader::where('phone',$user->phone)->get();     
            return view('user.showorder',compact('category','count','product','order'));
        }else{
            $product=product::all(); 
            $category=category::all();
            $user=auth()->user();
            $count=0;
            return view('user.showorder',compact('category','count','product'));
        }
    }

    public function vieworder($id){
        if(Auth::id()){
            $product=product::all(); 
            $category=category::all();
            $user=auth()->user();
            $count = DB::table('carts')
                 ->where('phone',$user->phone)
                 ->get()
                 ->sum('quantity');
            $orderheader=Orderheader::where('id',$id)->get();
            $order=Order::where('orderheaderid',$id)->get();     
            return view('user.vieworder',compact('category','count','product','order','orderheader'));
        }else{
            $product=product::all(); 
            $category=category::all();
            $user=auth()->user();
            $count=0;
            return view('user.vieworder',compact('category','count','product'));
        }
    }

    public function save(Request $request) { 

        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email',
            'subject' => 'required',
            'phone' => 'required',
            'message' => 'required'
        ]);

        $contact = new Contact;

        $contact->name = $request->name;
        $contact->email = $request->email;
        $contact->subject = $request->subject;
        $contact->phone = $request->phone;
        $contact->message = $request->message;

        $contact->save();

        \Mail::send('user.contact_email',
             array(
                 'name' => $request->get('name'),
                 'email' => $request->get('email'),
                 'subject' => $request->get('subject'),
                 'phone' => $request->get('phone'),
                 'user_message' => $request->get('message'),
             ), function($message) use ($request)
               {
                  $message->from($request->email);
                  $message->to('admin@example.com');
               });
        
        return back()->with('message', 'Thank you for contact us!');

    }



}