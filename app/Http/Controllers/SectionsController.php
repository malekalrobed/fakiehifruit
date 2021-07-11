<?php

namespace App\Http\Controllers;

use App\Models\Section;
use Illuminate\Http\Request;

class SectionsController extends Controller
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
        $sections = Section::where('name', 'LIKE', '%' . $category . '%')->orderBy('updated_at', 'desc')->paginate(20);

        return view('sections.index', compact('sections'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('sections.create');
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
            'name' => 'required|unique:sections,name',
            'image' => 'mimes:png,jpg,jpeg|max:5048',

        ]);

        $newImageName = time().'-'.$request->name.'.'.$request->image->extension();

        $request->image->move('storage/images/sections', $newImageName);

        $sections = Section::create([
            'name' => $request->input('name'),
            'image'     => $newImageName,
        ]);

        return redirect('/sections')->with('success', 'تم حفظ البيانات بنجاح');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $section = Section::find($id);

        return view('sections.show')->with([
            'section' => $section,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $section = Section::first()->find($id);

        return view('sections.edit')->with('section', $section);
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

        ]);

        if($request->image != null){

            $newImageName = time().'-'.$request->name.'.'.$request->image->extension();

            $request->image->move('storage/images/sections', $newImageName);
        }else {
            $newImageName = $request->input('old_image');
        }

        $section = Section::where('id', $id)
            ->update([
                'name' => $request->input('name'),
                'image'     => $newImageName,
            ]);

        return redirect('/sections')->with('success', 'تم تعديل البيانات بنجاح');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Section $section)
    {

        $section->delete();

        return redirect('/sections')->with('success', 'تم حذف البيانات بنجاح');
    }
}
