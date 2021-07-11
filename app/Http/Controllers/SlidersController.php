<?php

namespace App\Http\Controllers;

use App\Models\Slider;
use Illuminate\Http\Request;

class SlidersController extends Controller
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
        $sliders = Slider::where('title', 'LIKE', '%' . $category . '%')->orderBy('updated_at', 'desc')->paginate(10);

        return view('sliders.index', compact('sliders'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('sliders.create');
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
            'image' => 'mimes:png,jpg,jpeg|max:5048',
        ]);

        $newImageName = time().'-'.$request->image->extension();

        $request->image->move('storage/images/sliders', $newImageName);


        $sliders = Slider::create([
            'title'     => $request->input('title'),
            'desc'      => $request->input('desc'),
            'image'     => $newImageName,
        ]);

        return redirect('/sliders')->with('success', 'تم حفظ البيانات بنجاح');
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

        $slider = Slider::first()->find($id);

        return view('sliders.edit')->with([
            'slider'  => $slider,
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
            'image' => 'mimes:png,jpg,jpeg|max:5048',
        ]);


        if($request->image != null){

            $newImageName = time().'-'.$request->image->extension();

            $request->image->move('storage/images/sliders', $newImageName);
        }else {
            $newImageName = $request->input('old_image');
        }

        $slider = Slider::where('id', $id)
            ->update([
                'title'     => $request->input('title'),
                'desc'      => $request->input('desc'),
                'image'     => $newImageName,
            ]);

        return redirect('/sliders')->with('success', 'تم تعديل البيانات بنجاح');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Slider $slider)
    {
        $slider->delete();

        return redirect('/sliders')->with('success', 'تم حذف البيانات بنجاح');
    }
}
