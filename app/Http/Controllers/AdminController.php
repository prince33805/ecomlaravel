<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;

use App\Models\Product;
use App\Models\Order;
use App\Models\Category;
use App\Models\Supplier;
use App\Models\Orderheader;
use App\Models\User;
use App\Notifications\SendEmailNotification;
use Barryvdh\DomPDF\PDF as DomPDFPDF;

use PDF;
use Notification;

use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Symfony\Component\Mailer\Messenger\SendEmailMessage;

class AdminController extends Controller
{
    public function indexAdmin(){
        $totalorder=Orderheader::all()->count();
        // $data=product::where('title','Like','%'.$search.'%')->get(); not delivered
        $delivered_order=Orderheader::where('status','=','delivered')->count();
        $pending_order=Orderheader::where('status','=','not delivered')->count();
        $week=Carbon::today()->subDays(6);
        $order_week=Orderheader::where('created_at','>',$week)->count();
        // $orderbestseller=0;
        $orderbestseller = DB::table('orders')
                 ->select(DB::raw('sum(quantity) as sum, product_title'))
                 ->groupBy('product_title')
                 ->take(5)
                 ->orderByDesc('sum')
                 ->get();
        $orderbestsellerweek = DB::table('orders')
        ->select(DB::raw('sum(quantity) as sum, product_title'))
        ->where('created_at','>',$week)
        ->groupBy('product_title')
        ->take(5)
        ->orderByDesc('sum')
        ->get();
        $total_product=product::all()->count();
        $total_customer=user::where('usertype','=','0')->count();
        $total_revenue=0;
        $total_orderheader=orderheader::all();
        $total_supplier=Supplier::all()->count();
        // $lowest5product = product::orderBy(DB::raw('LENGTH(quantity) as quantity , quantity'));
        $lowest5product = DB::table('products')
        ->select('*')
        ->orderByRaw('CHAR_LENGTH(quantity)')
        ->take(5)
        ->orderBy('quantity')
        ->get();
        foreach($total_orderheader as $orderheader){
            $total_revenue = $total_revenue + $orderheader->totalprice;
        }
        return view('admin.home',compact('totalorder','delivered_order',
        'pending_order','order_week','orderbestseller','orderbestsellerweek',
        'total_product','total_customer','total_revenue','total_orderheader',
        'total_supplier','lowest5product'));
    }

    public function addproduct(){
        if(Auth::id()){
            if(Auth::user()->usertype=='1'){
                $category=category::all();
                $supplier=Supplier::all();
                return view('admin.addproduct',compact('category','supplier'));
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
        $data->buy_price=$request->buy_price;
        $data->description=$request->description;
        $data->quantity=$request->quantity;
        $data->supplier=$request->supplier;
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

    public function viewproduct($id){
        if(Auth::id()){
            if(Auth::user()->usertype=='1'){
                
                $data=Product::find($id);
                // $data=Orderheader::where('id',$id);
                // $order=Order::where('orderheaderid',$id)->get();
                return view('admin.viewproduct',compact('data'));
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
                $supplier=Supplier::all();
                return view('admin.updatevieww',compact('data','category','supplier'));
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
        $data->supplier=$request->supplier;
        $data->save();

        return redirect()->back()->with('message','Product Updated Successfully',compact('category'));
    }
    
    public function showorder(){
        if(Auth::id()){
            if(Auth::user()->usertype=='1'){
                $order=orderheader::all();
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
                $order=Orderheader::find($id);
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

    public function updatecategory(Request $request,$id){
        $data=category::find($id);
        $data->category_name=$request->category_name;
        $data->save();

        return redirect('category')->with('message','Category Updated Successfully');
    }
 
    public function viewcategory($id){
        if(Auth::id()){
            if(Auth::user()->usertype=='1'){
                $data=category::find($id);
                $product=Product::where('category',$data->category_name)->get();
                // $order=Order::where('orderheaderid',$id)->get();
                return view('admin.viewcategory',compact('data','product'));
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

    public function supplier(){
        if(Auth::id()){
            if(Auth::user()->usertype=='1'){
                $data=Supplier::all();
                return view('admin.supplier',compact('data'));
            }else{
                return redirect()->back();    
            }
        }else{
            return redirect('login');
        }
    }

    public function updateviewsupplier($id){
        if(Auth::id()){
            if(Auth::user()->usertype=='1'){
                $data=supplier::find($id);
                return view('admin.updateviewsupplier',compact('data'));
            }else{
                return redirect()->back();    
            }
        }else{
            return redirect('login');
        }
    }

    public function updatesupplier(Request $request,$id){
        $data=supplier::find($id);
        $image=$request->file;

        if($image){
            $imagename=time().'.'.$image->getClientOriginalExtension();
            $request->file->move('productimage',$imagename);
            $data->image=$imagename;
        }
        
        $data->name=$request->name;
        $data->description=$request->description;
        $data->address=$request->address;
        $data->phone=$request->phone;
        $data->save();

        return redirect('supplier')->with('message','Product Updated Successfully');
    }
 
    public function viewsupplier($id){
        if(Auth::id()){
            if(Auth::user()->usertype=='1'){
                $data=Supplier::find($id);
                $product=Product::where('supplier',$data->name)->get();
                // $order=Order::where('orderheaderid',$id)->get();
                return view('admin.viewsupplier',compact('data','product'));
            }else{
                return redirect()->back();    
            }
        }else{
            return redirect('login');
        }
    }

    public function addsupplier(Request $request){
        $data=new supplier;
        $data->name=$request->name;
        $data->description=$request->description;
        $data->address=$request->address;
        $data->phone=$request->phone;
        $data->save();
        return redirect()->back()->with('message','Supplier Added Successfully');
    }
    
    public function deletesupplier($id){
        if(Auth::id()){
            if(Auth::user()->usertype=='1'){
                $data=supplier::find($id);
                $data->delete();
                return redirect()->back()->with('message','Supplier Deleted Successfully');
            }else{
                return redirect()->back();    
            }
        }else{
            return redirect('login');
        }
    }

    public function vieworder($id){
        if(Auth::id()){
            if(Auth::user()->usertype=='1'){
                
                $data=Orderheader::find($id);
                // $data=Orderheader::where('id',$id);
                $order=Order::where('orderheaderid',$id)->get();
                return view('admin.vieworderr',compact('data','order'));
            }else{
                return redirect()->back();    
            }
        }else{
            return redirect('login');
        }
    }
    
    public function search(Request $request){
        if(Auth::id()){
            if(Auth::user()->usertype=='1'){
                $searchText=$request->search;
                if($searchText==''){
                    $data = product::all();
                    return view('admin.showproduct',compact('data'));
                }
                $data=product::where('title','LIKE',"%$searchText%")
                ->orWhere('category','LIKE',"%$searchText%")
                ->orWhere('supplier','LIKE',"%$searchText%");
                return view('admin.showproduct',compact('data'));
            }else{
                return redirect()->back();    
            }
        }else{
            return redirect('login');
        }

    //     if(Auth::id()){    
    //         $user=auth()->user();
    //         $count = DB::table('carts')
    //              ->where('phone',$user->phone)
    //              ->get()
    //              ->sum('quantity');
    //     }else{
    //         $count=0;
    //     }
    //     $categoryname='category';
    //     $category=category::all();
    //     $search=$request->search;
    //     if($search==''){
    //         $data = product::paginate(6);
    //         return view('user.home',compact('data','count','categoryname','category'));
    //     }   
    //     $data=product::where('title','Like','%'.$search.'%')->get();
    //     // echo $data;
    //     return view('user.home',compact('data','count','categoryname','category'));
    }

    public function print_pdf($id){
        $data = orderheader::find($id);
        $order=Order::where('orderheaderid',$id)->get();
        $pdf=PDF::loadView('admin.pdf',compact('order','data'));
        return $pdf->download('order_details.pdf');
    }

    public function send_email($id){
        $order=Orderheader::find($id);
        // $user=0;
        $user=DB::table("users")
        ->where("name", "=", $order->name)
        ->get();
        return view('admin.email_info',compact('order','user'));
    }

    public function send_user_email(Request $request,$id){
        $order=Orderheader::find($id);
        // $user=0;
        $user=DB::table("users")
        ->where("name", "=", $order->name)
        ->get();
        
        $details = [
            'greeting' => $request->greeting,
            'firstline' => $request->firstline,
            'body' => $request->body,
            'button' => $request->button,
            'url' => $request->url,
            'lastline' => $request->lastline,
        ];

        Notification::send($order,new SendEmailNotification($details));

        return redirect()->back();
    }

    public function showuser(){
        if(Auth::id()){
            if(Auth::user()->usertype=='1'){
                $user=User::where('usertype','0')->get();
                return view('admin.showuser',compact('user'));
            }else{
                return redirect()->back();    
            }
        }else{
            return redirect('login');
        }
    }

    public function viewuser($id){
        if(Auth::id()){
            if(Auth::user()->usertype=='1'){
                $user=user::find($id);
                // $data=Orderheader::where('id',$id); 
                $order=Orderheader::where('name','=',$user->name)->get();
                return view('admin.viewuser',compact('user','order'));
            }else{
                return redirect()->back();    
            }
        }else{
            return redirect('login');
        }
    }

}