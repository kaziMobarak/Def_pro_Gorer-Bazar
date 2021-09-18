<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\AttributeValue;
use App\Models\Attribute;
use Illuminate\Http\Request;

class AttributeValueController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $attributeValues = AttributeValue::all();
        $attributes = Attribute::all();
        return view('admin.attributeValue.index', compact('attributeValues', 'attributes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function save(AttributeValue $attributeValue, Request $request)
    {
        $attributeValue->name = $request->name;
        $attributeValue->attribute_id = $request->attribute_id;
        $attributeValue->save();
    }


    public function validation($id, $request)
    {

        $validatedData = $request->validate([
            'name' => 'required',
            'attribute_id' => 'required',
        ], [
            'name.required' => 'brand name is required',
            'attribute_id.required' => 'Select Attribute is required',
        ]);
    }




    public function store($id = null, Request $request)
    {
        if (!isset($id)) {
            $this->validation($id = null, $request);
            $attributeValue = new AttributeValue();
            $this->save($attributeValue, $request);
            return redirect()->route('admin.attributeValue.index')->with('success', 'Your Atrribute Value saved Successfully!!!');
        } else {
            $attributeValue = AttributeValue::find($id);
            $this->save($attributeValue, $request);
            return redirect()->route('admin.attributeValue.index')->with('success', 'Your Attributes Values Updated Successfully!!!');
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
        $edit = AttributeValue::find($id);
        $attributeValues = AttributeValue::all();
        $attributes = Attribute::all();
        return view('admin.attributeValue.index', compact('attributeValues', 'attributes','edit'));
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
        AttributeValue::find($id)->delete();
        return redirect()->route('admin.attributeValue.index')->with('danger', 'Data Deleted Successfully !!!');
    }
}
