<?php
namespace App\Http\Controllers;

use App\Product;
use App\Category;
use App\Http\Requests\FormInputRequest;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;

class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products =Product::all();
      
        return view('admin.product.index',[
            'products'=>$products,
           
        ]);
        // return view('admin.product.index',compact('products));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories= Category::pluck('name','id');
        return view('admin.product.create',[
            'categories'=>$categories
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(FormInputRequest $request)
    {
        $product =new Product();
       
        if($request->has('image')){
            
            $file=$request->file('image')->store('public/images');
            $product->image=$file;
        }
       
       $product->name=$request->input('name');
       $product->size=$request->input('size');
       $product->description=$request->input('description');
       $product->category_id=$request->input('category_id');
       $product->price=$request->input('price');
       $product->save();
        return redirect()->route('product.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $categories= Category::pluck('name','id');
        $product=Product::find($id);
        return view('admin.product.edit',[
            'product'=>$product,
            'categories'=>$categories
        ]);
    }
      
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(FormInputRequest $request,$id)
    {
      
       $product=Product::find($id);
        if($request->has('image')){
            
            $file=$request->file('image')->store('public/images');
            $product->image=$file;
        }
       
       $product->name=$request->input('name');
       $product->size=$request->input('size');
       $product->description=$request->input('description');
       $product->category_id=$request->input('category_id');
       $product->price=$request->input('price');
       $product->save();
        return redirect()->route('product.index');
    

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
      
        $product->Delete();
        return redirect('admin/product');
    }
}
