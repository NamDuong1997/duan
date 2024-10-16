<?php

namespace App\Http\Controllers;

use App\Models\comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class CommentController extends Controller
{
    public function index()
    {
        $data = comment::all();
        return View("pages.comments.index")->with("data", $data);
    }

    public function create()
    {
        return View("pages.comments.add");
    }

    public function store(Request $request)
    {
        $name = $request->input("name");
        $description = $request->input("description");
        comment::create(['name'=> $name, 'description'=> $description]);
        return redirect()->route("admin.comments.index");
    }

    public function show(string $id)
    {
        $data_show = comment::find($id);
        return redirect()->route('admin.comments.index')->with("data_search", $data_show);
    }

    public function edit(string $id)
    {
        $data = comment::find($id);
        return View("pages.comments.edit")->with("data",  $data);
    }

    public function update(Request $request, string $id)
    {
      
        comment::find($id)->update(['name'=>$request->input("name"), 'description'=> $request->input("description")]);
        // return redirect()->route('admin.comments.index'); cách 1
        return Redirect::to('admin/comments');
    }

    public function destroy(string $id)
    {
        comment::find($id)->delete();
        return Redirect::to('admin/comments');
    }

    public function search( Request $request)
    {
        $data_input =   $request->input('name');
        $data_show ['data']= comment::where('name', 'LIKE', '%'.$data_input.'%')->get();
        $data_show['err'] = 0;
        if(count( $data_show['data']) !=0){
            $data_show['err'] = 1;
        }
        return View('pages.comments.index')->with("data_search", $data_show);
    }
}
