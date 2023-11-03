<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;
//use Illuminate\Notifications\Notification;
use PDF;

use Notification;

use App\Notifications\SendEmailNotification;
class AdminController extends Controller
{

    public function view_category()
    {
        $data = category::all();
        return view('admin.category',compact('data'));
    }

    public function add_category(Request $request)
    {
        $data = new Category;
        $data->category_name = ucfirst($request->category);
        $data->save();

        return redirect()->back()->with('message', 'Category added successfully');
    }

    public function delete_category($id)
    {
        $data = category::find($id);
           $data->delete();
           return redirect()->back()->with('message','Category successfully deleted');
    }

    public function view_product()
    {
        $category = category::all();
        return view('admin.product', compact('category'));
    }

    public function add_product(Request $request)
    {

        $product = new Product();
        $product->title = $request->title;
        $product->description = $request->description;
        $product->price = $request->price;
        $product->discount_price = $request->dis_price;
        $product->quantity = $request->quantity;
        $product->category = $request->category;

        $image = $request->image;
        $imagename = time() . '.' .$image->getClientOriginalExtension();
        $request->image->move('product',$imagename);
        $product->image = $imagename;

        $product->save();
        return redirect()->back()->with('message','Product added Successfully');
    }

    public function show_product()
    {
        $product = Product::all();
    return view('admin.show_product',compact('product'));
    }

    public function update_product($id)
    {

        $product = Product::find($id);
        $category = category::all();
        return view('admin.update_product',compact('product','category'));
    }

    public function delete_product($id)
    {
        $product = Product::find($id);
        $product->delete();

        return redirect()->back()->with('message','product deleted Successfully');
    }

    public function update_product_confirm(Request $request, $id)
    {
        $product = Product::find($id);
        $product->title = $request->title;
        $product->description = $request->description;
        $product->price = $request->price;
        $product->discount_price = $request->dis_price;
        $product->quantity = $request->quantity;
        $product->category = $request->category;

        $image = $request->image;

        if($image){
            $imagename = time() . '.' . $image->getClientOriginalExtension();
            $request->image->move('product',$imagename);
            $product->image = $imagename;
        }

        $product->save();
        return redirect()->back()->with('message','Product Updated successfully');
    }

    public function order()
    {
        $order = Order::all();
        return view('admin.order',compact('order'));
    }

    public function delivered($id)
    {
        $order = Order::find($id);
        $order->delivery_status = 'Delivered';
        $order->payment_status='paid';
        $order->save();
        return redirect()->back();
    }

    public function print_pdf($id)
    {
        $order = Order::find($id);
        $pdf = PDF::loadview('admin.pdf',compact('order'));
        return $pdf->download('order_details.pdf');
    }

    public function send_email($id)
    {
        $order=Order::find($id);
        return view('admin.email_info',compact('order'));
    }

    public function send_user_email(Request $request, $id)
    {
        $order=Order::find($id);
        $details = [
                'greeting'=>$request->greeting,
                'firstLine'=>$request->firstLine,
                'body'=>$request->body,
                'button'=>$request->button,
                'url'=>$request->url,
                'lastLine'=>$request->lastLine,
        ];

        Notification::send($order,new SendEmailNotification($details));
        return redirect()->back()->with('success','Email Sent Successfully');
    }

    public function searchData(Request $request)
    {
        $searchText = $request->search;

        $order = Order::where('name','LIKE',"%$searchText")
            ->orWhere('phone','LIKE',"%$searchText")
            ->orWhere('product_title','LIKE',"%$searchText")
            ->get();

        return view('admin.order',compact('order'));
    }
}

