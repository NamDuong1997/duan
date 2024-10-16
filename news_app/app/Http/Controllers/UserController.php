<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class UserController extends Controller
{
    public function index()
    {
        $data = User::all();
        return View("pages.users.index")->with("data", $data);
    }

    public function create()
    {
        return View("pages.users.add");
    }

    public function store(Request $request)
    {
        $name = $request->input("name");
        $description = $request->input("description");
        User::create(['name'=> $name, 'description'=> $description]);
        return redirect()->route("admin.users.index");
    }

    public function show(string $id)
    {
        $data_show = User::find($id);
        return redirect()->route('admin.users.index')->with("data_search", $data_show);
    }


    public function edit(string $id)
    {
        $data = User::find($id);
        return View("pages.users.edit")->with("data",  $data);
    }

    public function update(Request $request, string $id)
    {
        // cách 1 
        // $data_update = User::find($id);
        // if($data_update){
        //     $data_update->name = $request->input("name");
        //     $data_update->description = $request->input("description");
        //     $data_update->save();
        // }
        // cách 2
        User::find($id)->update(['name'=>$request->input("name"), 'description'=> $request->input("description")]);
        // return redirect()->route('admin.user.index'); cách 1
        return Redirect::to('admin/users');
    }

    public function destroy(string $id)
    {
        User::find($id)->delete();
        return Redirect::to('admin/users');
    }

    public function search( Request $request)
    {
        $data_input =   $request->input('name');
        $data_show ['data']= User::where('name', 'LIKE', '%'.$data_input.'%')->get();
        $data_show['err'] = 0;
        if(count( $data_show['data']) !=0){
            $data_show['err'] = 1;
        }
        return View('pages.users.index')->with("data_search", $data_show);
    }
}
