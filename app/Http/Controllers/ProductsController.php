<?php

namespace App\Http\Controllers;

use App\Models\Collection;
use App\Models\Color;
use App\Models\Product;
use App\Models\Unit;
use Illuminate\Http\Request;

use function PHPUnit\Framework\isNull;

class ProductsController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        $category = $request->input('search');
        $products = Product::where('name', 'LIKE', '%' . $category . '%')->orderBy('updated_at', 'desc')->paginate(20);
        return view('products.index',compact('products'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $collections = Collection::all();
        $units = Unit::all();
        $colors = Color::all();
        return view('products.create')->with([
            'collections' => $collections,
            'units' => $units,
            'colors' => $colors,
            ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|unique:products,name' ,
            'image' => 'mimes:png,jpg,jpeg|max:5048',
            'collection_id' => 'required|integer',
        ]);

        $newImageName = time().'-'.$request->name.'.'.$request->image->extension();

        $request->image->move('storage/images/products', $newImageName);

        $products = Product::create([
            'name' => $request->input('name'),
            'desc' => $request->input('desc'),
            'color' => $request->input('color'),
            'unit' => $request->input('unit'),
            'count' => $request->input('count'),
            'price' => $request->input('price'),
            'discount' => $request->input('discount'),
            'trade_mark' => $request->input('trade_mark'),
            'country_origin' => $request->input('country_origin'),
            'collection_id' => $request->input('collection_id'),
            'image'     => $newImageName,
        ]);

        return redirect('/products')->with('success', 'تم حفظ البيانات بنجاح');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $product = Product::find($id);

        return view('products.show')->with('product', $product);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product = Product::first()->find($id);
        $collections = Collection::all();
        $units = Unit::all();
        $colors = Color::all();
        return view('products.edit')->with([
            'product' => $product,
            'collections' => $collections,
            'units' => $units,
            'colors' => $colors,
            ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required',
            'image' => 'mimes:png,jpg,jpeg|max:5048',
            'collection_id' => 'required|integer',
        ]);


        if($request->image != null){

            $newImageName = time().'-'.$request->name.'.'.$request->image->extension();

            $request->image->move('storage/images/products', $newImageName);
        }else {
            $newImageName = $request->input('old_image');
        }


        $product = Product::where('id', $id)
            ->update([
                'name' => $request->input('name'),
                'desc' => $request->input('desc'),
                'color' => $request->input('color'),
                'unit' => $request->input('unit'),
                'count' => $request->input('count'),
                'price' => $request->input('price'),
                'discount' => $request->input('discount'),
                'trade_mark' => $request->input('trade_mark'),
                'country_origin' => $request->input('country_origin'),
                'collection_id' => $request->input('collection_id'),
                'image'     => $newImageName,
            ]);

        return redirect('/products')->with('success', 'تم تعديل البيانات بنجاح');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {

        $product->delete();

        return redirect('/products')->with('success', 'تم حذف البيانات بنجاح');
    }
}
