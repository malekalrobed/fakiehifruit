<?php

namespace App\Http\Controllers;

use App\Models\Collection;
use App\Models\Product;
use App\Models\Section;
use App\Models\Slider;
use App\Models\Stock;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $category = $request->input('search');
        $color = $request->input('color');
        $country = $request->input('country');
        
        $sections = Section::all();

        $sliders = Slider::all();
        
        $newProducts = Product::orderBy('updated_at', 'desc')->paginate(20);
        $discountProducts = Product::where('discount', 'not like', '')->orderBy('updated_at', 'desc')->paginate(20);
        
        return view('frontend.index')->with([
            'sliders' => $sliders,
            'sections' => $sections,
            'newProducts' => $newProducts,
            'discountProducts'  => $discountProducts,
        ]);
    }

    public function filter (Request $request) {
        $category = $request->input('search');
        $color = $request->input('color');
        $country = $request->input('country');
        
        $sections = Section::all();    

        $products = Product::where('name', 'like', '%' . $category . '%')
                            ->orderBy('updated_at', 'desc')->paginate(30);
        // dd($category,$color);
        // $products = Product::where('name', 'like', [['email','like','%' . $category . '%'],['color','like', '%' . $color . '%']])
        //                     ->orderBy('updated_at', 'desc')->paginate(30);
        
        return view('frontend.filter')->with([
            'sections' => $sections,
            'products' => $products,
            'search'    => $category,
            'color' => $color,
            'country' => $country,
        ]);
    }
    public function section(Request $request, $id)
    {        
        
        $sections = Section::all();
        $section = Section::find($id);

        $collections = Collection::where('section_id', '=', $section->id )->orderBy('updated_at', 'desc')->paginate(3);
        
        return view('frontend.sections')->with([
            'sections' => $sections,
            'section' => $section,
            'collections' => $collections,          

        ]);
    }

    public function collection(Request $request, $id) {
        
        $sections = Section::all();

        $collection = Collection::find($id);
        
        $products = Product::where('collection_id', '=', $collection->id )->orderBy('updated_at', 'desc')->paginate(20);

        return view('frontend.collections')->with([
            'sections' => $sections,
            'collection' => $collection,
            'products'   => $products,
        ]);
    }

    public function product(Request $request, $id) {
        
        $sections = Section::all();
        
        $product = Product::find($id);
        
        $products = Product::where('collection_id', '=', $product->collection_id )
                            ->orderBy('updated_at', 'desc')->paginate(20);

        return view('frontend.products')->with([
            'sections' => $sections,
            'product' => $product,
            'products'   => $products,
        ]);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
