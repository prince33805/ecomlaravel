<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;

use App\Models\Product;

use App\Models\Order;

use App\Models\Category;

class AdminController extends Controller
{
    public function addproduct(){
        if(Auth::id()){
            if(Auth::user()->usertype=='1'){
                $category=category::all();
                return view('admin.addproduct',compact('category'));
            }else{
                return redirect()->back();    
            }
        }else{
            return redirect('login');
        }
    }

    public function uploadproduct(Request $request){
        $data = new product;

        $image=$request->file;
        $imagename=time().'.'.$image->getClientOriginalExtension();
        $request->file->move('productimage',$imagename);
        $data->image=$imagename;
        
        $data->title=$request->title;
        $data->price=$request->price;
        $data->description=$request->description;
        $data->quantity=$request->quantity;
        $data->discount_price=$request->discount_price;
        $data->category=$request->category;
        $data->save();
        return redirect()->back()->with('message','Product Added Successfully');
    }

    public function showproduct(){
        if(Auth::id()){
            if(Auth::user()->usertype=='1'){
                $data=product::all();
                return view('admin.showproduct',compact('data'));
            }else{
                return redirect()->back();    
            }
        }else{
            return redirect('login');
        }
    }

    public function deleteproduct($id){
        if(Auth::id()){
            if(Auth::user()->usertype=='1'){
                $data=product::find($id);
                $data->delete();
                return redirect()->back()->with('message','Product Deleted Successfully');
            }else{
                return redirect()->back();    
            }
        }else{
            return redirect('login');
        }
    }

    public function updateview($id){
        if(Auth::id()){
            if(Auth::user()->usertype=='1'){
                $data=product::find($id);
                $category=category::all();
                return view('admin.updateview',compact('data','category'));
            }else{
                return redirect()->back();    
            }
        }else{
            return redirect('login');
        }
    }

    public function updateproduct(Request $request,$id){
        $data=product::find($id);
        $image=$request->file;
        $category=category::all();

        if($image){
            $imagename=time().'.'.$image->getClientOriginalExtension();
            $request->file->move('productimage',$imagename);
            $data->image=$imagename;
        }
        
        $data->title=$request->title;
        $data->price=$request->price;
        $data->description=$request->description;
        $data->quantity=$request->quantity;
        $data->category=$request->category;
        $data->discount_price=$request->discount_price;
        $data->category=$request->category;
        $data->save();

        return redirect()->back()->with('message','Product Updated Successfully',compact('category'));
    }
    
    public function showorder(){
        if(Auth::id()){
            if(Auth::user()->usertype=='1'){
                $order=order::all();
                return view('admin.showorder',compact('order'));
            }else{
                return redirect()->back();    
            }
        }else{
            return redirect('login');
        }
    }

    public function updatestatus($id){
        if(Auth::id()){
            if(Auth::user()->usertype=='1'){
                $order=order::find($id);
                $order->status='delivered';
                $order->save();
                return redirect()->back()->with('message','Product Updated Successfully');
            }else{
                return redirect()->back();    
            }
        }else{
            return redirect('login');
        }
    }

    public function category(){
        if(Auth::id()){
            if(Auth::user()->usertype=='1'){
                $data=category::all();
                return view('admin.category',compact('data'));
            }else{
                return redirect()->back();    
            }
        }else{
            return redirect('login');
        }
    }
 
    public function addcategory(Request $request){
        $data=new category;
        $data->category_name=$request->category;
        $data->save();
        return redirect()->back()->with('message','Category Added Successfully');
    }
    
    public function deletecategory($id){
        if(Auth::id()){
            if(Auth::user()->usertype=='1'){
                $data=category::find($id);
                $data->delete();
                return redirect()->back()->with('message','Category Deleted Successfully');
            }else{
                return redirect()->back();    
            }
        }else{
            return redirect('login');
        }
    }
}