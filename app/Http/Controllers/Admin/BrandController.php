<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use Illuminate\Http\Request;
use Image;

class BrandController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $brands = Brand::all();
        return view('admin.brand.index', compact('brands'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.brand.createOrUpdate');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function save(Brand $brand, Request $request)
    {
        $brand->name = $request->name;
        if ($request->logo) {
            $image       = $request->file('logo');
            $filename    = $image->getClientOriginalName();
            $image->move(public_path() . '/full/', $filename);
            $image_resize = Image::make(public_path() . '/full/' . $filename);
            $image_resize->fit(270, 270);
            $image_resize->save(public_path('images/brands/' . $filename));
            $brand->logo = $filename;
            //logo image end
        } else {
            $brand->logo = $brand->logo;
        }
        $brand->save();
    }


    public function validation($id, $request)
    {

        $validatedData = $request->validate([
            'name' => 'required',
            'logo' => 'required',
        ], [
            'name.required' => 'brand name is required',
            'logo.required' => 'Logo is required',
        ]);
    }




    public function store($id = null, Request $request)
    {


        if (!isset($id)) {
            $this->validation($id = null, $request);
            $brand = new brand();
            $this->save($brand, $request);
            return redirect()->route('admin.brand.index')->with('success', 'Your brand saved Successfully!!!');
        } else {
            $brand = Brand::find($id);
            $this->save($brand, $request);
            return redirect()->route('admin.brand.index')->with('success', 'Your brand Updated Successfully!!!');
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
            $edit = Brand::find($id);
            $brands = Brand::all();
        return view('admin.brand.index', compact('edit', 'brands'));
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
        $brnad = Brand::find($id)->delete();
        return redirect()->route('admin.brand.index')->with('danger', 'Data Deleted Successfully');
    }
}
