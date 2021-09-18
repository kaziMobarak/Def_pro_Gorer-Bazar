<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Color;
use Illuminate\Http\Request;


class ColorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $colors = Color::all();
        return view('admin.color.index', compact('colors'));
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

    public function save(Color $color, Request $request)
    {

        $color->name = $request->name;
        $color->color_code = $request->color_code;
        $color->save();
    }


    public function validation($id, $request)
    {

        $validatedData = $request->validate([
            'name' => 'required',
            'color_code' => 'required',
        ], [
            'name.required' => ' name is required',
            'color_code.required' => 'Color code is required',

        ]);
    }




    public function store($id = null, Request $request)
    {


        if (!isset($id)) {
            $this->validation($id = null, $request);
            $color = new Color();
            $this->save($color, $request);
            return redirect()->route('admin.color.index')->with('success', 'Your Color saved !!!');
        } else {
            $color = Color::find($id);
            $this->save($color, $request);
            return redirect()->route('admin.color.index')->with('success', 'Your Color Code s!!');
        }
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
        $colors = Color::all();
        $edit = color::find($id);
        return view('admin.color.index', compact('colors', 'edit'));
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
        color::find($id)->delete();
        return redirect()->route('admin.color.index')->with('success', 'Data Delete !!!');
    }
}
