<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\categories;
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
        // Find the category by ID
        $category = catgori_sup::find($id);
    
        // If category not found, return an error response
        if (!$category) {
            return response()->json(['error' => 'Category not found'], 404);
        }
    
        // Handle file upload if a file is provided
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $fileName = time() . "_" . $file->getClientOriginalName();
            $Path = $file->storeAs('Services', $fileName, 'public'); // Store in storage/app/public/Services
    
            // Generate the full path for the image
            $req = $_SERVER["HTTP_HOST"] . "/storage/" . $Path;
    
            // Update the image path in the database
            $category->image = $req;
        }
    
        // Update other fields
        $category->category_name = $request->category_name;
        $category->category_id = $request->category_id;
    
        // Save the updated category
        $category->save();
    
        // Return the updated category or success response
        return response()->json($category, 200);
    }
    

  public function destroy(string $id)
    {
        $category = catgori_sup::find($id);
        $category->delete();
        return response()->json('تم حذف التصنيف');
    }
    
}
