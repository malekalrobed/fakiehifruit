<?php

namespace App\Http\Controllers;

use App\Models\Collection;
use App\Models\Product;
use App\Models\Section;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\URL;

class CollectionsController extends Controller
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
        $collections = Collection::where('name', 'LIKE', '%' . $category . '%')->orderBy('updated_at', 'desc')->paginate(20);
        //$collections = Collection::paginate(3);

        //$collections = Collection::all();

        // return view('collections.index', [
        //         'collections' => $collections
        //     ]);

        return view('collections.index', compact('collections'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $sections = Section::all();
        return view('collections.create')->with('sections', $sections);
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
            'section_id' => 'required|integer',
            'name' => 'required|unique:collections,name',
            'image' => 'mimes:png,jpg,jpeg|max:5048',
        ]);

        $newImageName = time().'-'.$request->name.'.'.$request->image->extension();

        $request->image->move('storage/images/collections', $newImageName);


        $collections = Collection::create([
            'section_id'=> $request->input('section_id'),
            'name'      => $request->input('name'),
            'image'     => $newImageName,
        ]);

        return redirect('/collections')->with('success', 'تم حفظ البيانات بنجاح');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id, Request $request)
    {
        $category = $request->input('search');


        $collection = Collection::find($id);

        return view('collections.show')->with('collection', $collection);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $sections = Section::all();

        $collection = Collection::first()->find($id);

        return view('collections.edit')->with([
            'sections'  => $sections,
            'collection' => $collection,
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
            'section_id' => 'required|integer',
            'name' => 'required|unique:collections,name',
            'image' => 'mimes:png,jpg,jpeg|max:5048',
        ]);

        if($request->image != null){

            $newImageName = time().'-'.$request->name.'.'.$request->image->extension();

            $request->image->move('storage/images/collections', $newImageName);
        }else {
            $newImageName = $request->input('old_image');
        }

        $collection = Collection::where('id', $id)
            ->update([
                'section_id' => $request->input('section_id'),
                'name' => $request->input('name'),
                'image'     => $newImageName,
            ]);

        return redirect('/collections')->with('success', 'تم تعديل البيانات بنجاح');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    // public function destroy($id)
    // {
    //     $collection = Collection::first()->find($id);

    //     $collection->delete();

    //     return redirect('/collections');
    // }
    public function destroy(Collection $collection)
    {

        $collection->delete();

        return redirect('/collections')->with('success', 'تم حذف البيانات بنجاح');
    }

}
