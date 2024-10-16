<?php

namespace App\Http\Controllers;

use App\Models\image;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class ImageController extends Controller
{
    public function index()
    {
        $data = image::all();
        return View("pages.images.index")->with("data", $data);
    }

    public function create()
    {
        return View("pages.images.add");
    }

    public function store(Request $request)
    {
        $name = $request->input("name");
        $description = $request->input("description");
        image::create(['name'=> $name, 'description'=> $description]);
        return redirect()->route("admin.images.index");
    }

    public function show(string $id)
    {
        $data_show = image::find($id);
        return redirect()->route('admin.images.index')->with("data_search", $data_show);
    }

    public function edit(string $id)
    {
        $data = image::find($id);
        return View("pages.images.edit")->with("data",  $data);
    }

    public function update(Request $request, string $id)
    {
        image::find($id)->update(['name'=>$request->input("name"), 'description'=> $request->input("description")]);
        return Redirect::to('admin/images');
    }

    public function destroy(string $id)
    {
        image::find($id)->delete();
        return Redirect::to('admin/images');
    }

    public function search( Request $request)
    {
        $data_input =   $request->input('name');
        $data_show ['data']= image::where('name', 'LIKE', '%'.$data_input.'%')->get();
        $data_show['err'] = 0;
        if(count( $data_show['data']) !=0){
            $data_show['err'] = 1;
        }
        return View('pages.images.index')->with("data_search", $data_show);
    }
}
