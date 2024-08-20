<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\CategoryRequest;
use App\Models\categories;
use App\Models\category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        $Category = categories::get();


        return response()->json($Category);
    }
    public function store(CategoryRequest $request)
    {
        $file = $request->file('image');
        $fileName=time()."_".$file->getClientOriginalName();
        $extension = $request->image->extension();
        $Path = $file->storeAs('Services', $fileName, 'public'); // This will store file in storage/app/public/uploads folder

        $req=$_SERVER["HTTP_HOST"]."/storage/".$Path;
       return categories::create([

            'category_name' => $request->category_name,
            'image' => $req

        ]);





    }
    public function show(string $id)
    {
        $category = categories::find($id);
        return response()->json($category);

    }
    public function update(CategoryRequest $request, string $id)
    {

        $category = categories::find($id);
        $file = $request->file('image');
        $fileName=time()."_".$file->getClientOriginalName();
        $extension = $request->image->extension();
        $Path = $file->storeAs('Services', $fileName, 'public'); // This will store file in storage/app/public/uploads folder

        $req=$_SERVER["HTTP_HOST"]."/storage/".$Path;
       return categories::update([

            'category_name' => $request->category_name,
            'image' => $req

        ]);



    }

  public function destroy(string $id)
    {
        $category = categories::find($id);
        $category->delete();
        return response()->json('تم حذف التصنيف');
    }
}
