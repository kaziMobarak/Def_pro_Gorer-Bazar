<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Image;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::all();
        return view('admin.category.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.category.createOrUpdate');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function save(Category $category, Request $request){

           $category->name = $request->name;
           $category->parent_category = $request->parent_category;
           $category->description = $request->description;

        if($request->icon_image){
           $image       = $request->file('icon_image');
           $filename    = $image->getClientOriginalName();
           $image->move(public_path().'/full/',$filename);
           $image_resize = Image::make(public_path().'/full/'.$filename);
           $image_resize->fit(30, 30);
           $image_resize->save(public_path('images/' .$filename));
           $category->icon_image = $filename;
           //icon image end
        }else{
            $category->icon_image = $category->icon_image;
        }

        if($request->banner_image){

            $image       = $request->file('banner_image');

            $banner_image    = $image->getClientOriginalName();
            $image->move(public_path().'/full/',$banner_image);
            $image_resize = Image::make(public_path().'/full/'.$banner_image);
            $image_resize->fit(832, 300);
            $image_resize->save(public_path('images/' .$banner_image));
            $category->banner_image = $banner_image;
            //banner image end


        }else{
            $category->banner_image = $category->banner_image;
        }


           $category->save();


    }


    public function validation($id, $request){

        $validatedData = $request->validate([
            'name' => 'required',
            'icon_image' => 'required',
            'banner_image' => 'required',
        ], [
            'name.required' => 'Category name is required',
            'banner_image.required' => 'banner image is required',
            'icon_image.required' => 'icon image is required',

        ]);
    }




    public function store($id = null, Request $request)
    {


        if(!isset($id)){
            $this->validation($id=null, $request);
            $category= new Category();
            $this->save($category, $request);
            return redirect()->route('admin.category.index')->with('success', 'Your category saved with image!!!');
            }
            else
            {
                    $this->validation($id, $request);
                    $category = Category::find($id);
                    $this->save($category, $request);
                    return redirect()->route('admin.category.index')->with('success', 'Your category saved with image!!!');

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
        $edit = Category::find($id);
        return view('admin.category.createOrUpdate', compact('edit'));
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
        $delete = Category::find($id)->delete();
        return back()->with('danger', 'Delete Successfully');
    }
}
