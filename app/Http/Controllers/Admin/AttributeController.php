<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Attribute;
use Illuminate\Http\Request;

class AttributeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $attributes = Attribute::all();
        return view('admin.attribute.index', compact('attributes'));
    }

    public function save(Attribute $attributes, Request $request)
    {
        $attributes->name = $request->name;
        $attributes->save();
    }


    public function validation($id, $request)
    {

        $validatedData = $request->validate([
            'name' => 'required',
        ], [
            'name.required' => 'brand name is required',
        ]);
    }




    public function store($id = null, Request $request)
    {
        if (!isset($id)) {
            $this->validation($id = null, $request);
            $attributes = new Attribute();
            $this->save($attributes, $request);
            return redirect()->route('admin.attribute.index')->with('success', 'Your Atrribute saved Successfully!!!');
        } else {
            $attributes = Attribute::find($id);
            $this->save($attributes, $request);
            return redirect()->route('admin.attribute.index')->with('success', 'Your Attributes Updated Successfully!!!');
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
        $edit = Attribute::find($id);
        $attributes = Attribute::all();
        return view('admin.attribute.index', compact('attributes', 'edit'));
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
        Attribute::find($id)->delete();
        return redirect()->route('admin.attribute.index')->with('danger', 'Data Deleted Successfully');
    }
}
