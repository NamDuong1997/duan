<?php

namespace App\Http\Controllers;

use App\Models\catetory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;

class CatetoryController extends Controller
{
    public function index()
    {
        $data = catetory::all();
        return View("pages.catetories.index")->with("data", $data);
    }

    public function create()
    {
        return View("pages.catetories.add");
    }

    public function store(Request $request)
    {
        $name = $request->input("name");
        $description = $request->input("description");
        catetory::create(['name'=> $name, 'description'=> $description]);
        return redirect()->route("admin.catetories.index");
    }

    public function show(string $id)
    {
        $data_show = catetory::find($id);
        return redirect()->route('admin.catetories.index')->with("data_search", $data_show);
    }

    public function edit(string $id)
    {
        $data = catetory::find($id);
        return View("pages.catetories.edit")->with("data",  $data);
    }

    public function update(Request $request, string $id)
    {
        // cách 1 
        // $data_update = catetory::find($id);
        // if($data_update){
        //     $data_update->name = $request->input("name");
        //     $data_update->description = $request->input("description");
        //     $data_update->save();
        // }
        // cách 2
        catetory::find($id)->update(['name'=>$request->input("name"), 'description'=> $request->input("description")]);
        // return redirect()->route('admin.catetories.index'); cách 1
        return Redirect::to('admin/catetories');
    }

    public function destroy(string $id)
    {
        catetory::find($id)->delete();
        return Redirect::to('admin/catetories');
    }

    public function search( Request $request)
    {
        $data_input =   $request->input('name');
        $data_show ['data']= catetory::where('name', 'LIKE', '%'.$data_input.'%')->get();
        $data_show['err'] = 0;
        if(count( $data_show['data']) !=0){
            $data_show['err'] = 1;
        }
        return View('pages.catetories.index')->with("data_search", $data_show);
    }
}
