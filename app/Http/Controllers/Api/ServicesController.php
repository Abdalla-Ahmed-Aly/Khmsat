<?php

namespace App\Http\Controllers\Api;


use App\Http\Controllers\Controller;
use App\Http\Requests\ServicesRequest;
use App\Models\services;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class ServicesController extends Controller
{
    public function index()
    {
        $user_id = auth()->id();
    
        
        $services = Services::where('user_id', $user_id)->get();
    
        return response()->json($services);
    }
    public function store(ServicesRequest $request)
    {
        $file = $request->file('image');
        $fileName=time()."_".$file->getClientOriginalName();
        $extension = $request->image->extension();
        $Path = $file->storeAs('Services', $fileName, 'public'); // This will store file in storage/app/public/uploads folder

        $req=$_SERVER["HTTP_HOST"]."/storage/".$Path;
       
               $Services = Services::create([
            'Titel' => $request->Titel,
            'description' => $request->description,
            'image' => $req,
            'price' => $request->price,
            'Finish' => $request->Finish,
            'user_id' => Auth::id(),
            'category_id' => $request->category_id,
        
          

               ]);
               return response()->json('تم إضافه الخدمه');


     

    }




     public function show(string $id)
    {
        $Services = Services::find($id);
        return response()->json($Services);

    }
    
    public function update(ServicesRequest $request, string $id)
    {
        $file = $request->file('image');
        $fileName=time()."_".$file->getClientOriginalName();
        $extension = $request->image->extension();
        $Path = $file->storeAs('Services', $fileName, 'public'); // This will store file in storage/app/public/uploads folder

        $req=$_SERVER["HTTP_HOST"]."/storage/".$Path;
        $Services = Services::find($id);
        $Services->update([
            'Titel' => $request->Titel,
            'description' => $request->description,
            'price' => $request->price,
            'Finish' => $request->Finish,
            'image' => $req,
            'user_id' => Auth::id(),
            'category_id' => $request->category_id,

        ]);
        return response()->json($Services);


    }
  public function destroy(string $id)
    {
        $Services = Services::find($id);
        $Services->delete();
        return response()->json('تم حذف الخدمه');
    }
}
