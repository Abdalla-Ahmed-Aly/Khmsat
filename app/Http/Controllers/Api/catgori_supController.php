<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\catgori_sup;
use Illuminate\Http\Request;

class catgori_supController extends Controller
{
    public function index()
    {
        $Category = catgori_sup::get();


        return response()->json($Category);
    }
    public function store(request $request)
    {
        $file = $request->file('image');
        $fileName=time()."_".$file->getClientOriginalName();
        $extension = $request->image->extension();
        $Path = $file->storeAs('Services', $fileName, 'public'); // This will store file in storage/app/public/uploads folder

        $req=$_SERVER["HTTP_HOST"]."/storage/".$Path;
       return catgori_sup::create([

            'category_name' => $request->category_name,
            'image' => $req,
            'category_id'=>$request->category_id

        ]);





    }
    public function show(string $id)
    {
        $category = catgori_sup::find($id);
        return response()->json($category);

    }
    public function update(Request $request, string $id)
    {

        $category = catgori_sup::find($id);
         $file = $request->file('image');
        $fileName=time()."_".$file->getClientOriginalName();
        $extension = $request->image->extension();
        $Path = $file->storeAs('Services', $fileName, 'public'); // This will store file in storage/app/public/uploads folder

        $req=$_SERVER["HTTP_HOST"]."/storage/".$Path;
        return catgori_sup::create([

            'category_name' => $request->category_name,
            'image' => $req,
            'category_id'=>$request->category_id

        ]);
    }

  public function destroy(string $id)
    {
        $category = catgori_sup::find($id);
        $category->delete();
        return response()->json('تم حذف التصنيف');
    }
}
