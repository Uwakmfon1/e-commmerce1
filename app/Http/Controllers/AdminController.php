<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

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
}

