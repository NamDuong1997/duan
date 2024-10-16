<?php

namespace App\Http\Controllers;

use App\Models\view_history;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Redis;

class View_HistoryController extends Controller
{
    public function index()
    {
        $data = view_history::all();
        return View("pages.view_histories.index")->with("data", $data);
    }

    public function create()
    {
        return View("pages.view_histories.add");
    }

    public function store(Request $request)
    {
        $name = $request->input("name");
        $description = $request->input("description");
        view_history::create(['name'=> $name, 'description'=> $description]);
        return redirect()->route("admin.view_histories.index");
    }

    public function show(string $id)
    {
        $data_show = view_history::find($id);
        return redirect()->route('admin.view_histories.index')->with("data_search", $data_show);
    }

    public function edit(string $id)
    {
        $data = view_history::find($id);
        return View("pages.view_histories.edit")->with("data",  $data);
    }

    public function update(Request $request, string $id)
    {
        view_history::find($id)->update(['name'=>$request->input("name"), 'description'=> $request->input("description")]);
        return Redirect::to('admin/view_histories');
    }

    public function destroy(string $id)
    {
        view_history::find($id)->delete();
        return Redirect::to('admin/view_histories');
    }

    public function search( Request $request)
    {
        $data_input =   $request->input('name');
        $data_show ['data']= view_history::where('name', 'LIKE', '%'.$data_input.'%')->get();
        $data_show['err'] = 0;
        if(count( $data_show['data']) !=0){
            $data_show['err'] = 1;
        }
        return View('pages.view_histories.index')->with("data_search", $data_show);
    }
}
