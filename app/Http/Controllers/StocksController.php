<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Stock;
use Illuminate\Http\Request;

class StocksController extends Controller
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

        $stocks = Stock::where('product_id', 'LIKE', '%' . $category . '%')->orderBy('updated_at', 'desc')->paginate(20);

        return view('stocks.index')->with([
            'stocks' => $stocks,  
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $products = Product::all();
        return view('stocks.create')->with('products', $products);
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
            'product_id' => 'required',
            'count' => 'required',
            'price' => 'required',
            'discount' => 'required',
        ]);     

        $stock = Stock::create([
            'product_id' => $request->input('product_id'),
            'count' => $request->input('count'),
            'price' => $request->input('price'),
            'discount' => $request->input('discount'),
        ]);

        return redirect('/stocks')->with('success', 'تم حفظ البيانات بنجاح');
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
        $stock = Stock::first()->find($id);
        $product = Product::find($stock->product_id);        
        return view('stocks.edit')->with([
            'product' => $product,
            'stock' => $stock,
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
            'count' => 'required',
            'price' => 'required',
            'discount' => 'required',
        ]);              
        
        $stock = Stock::where('id', $id)
            ->update([
                'count' => $request->input('count'),
                'price' => $request->input('price'),
                'discount' => $request->input('discount'),
            ]);
        
        return redirect('/stocks')->with('success', 'تم تعديل البيانات بنجاح');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */    
    public function destroy(Stock $stock)
    {        

        $stock->delete();

        return redirect('/stocks')->with('success', 'تم حذف البيانات بنجاح');
    }

}
