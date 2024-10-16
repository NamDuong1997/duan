<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
// sử dụng truy vấn cổ điển

class PostController extends Controller
{
    public function index()
    {
        $data = DB::table('post')->get();
        return View("pages.posts.index")->with("data", $data);
    }

    public function create()
    {
        $catetory = DB::table("catetory")->select("name")->get();
        print_r ($catetory);
        return View("pages.posts.add")->with("name_catetory",  $catetory);
    }

    public function store(Request $request)
    {
        $title = $request->input("title");
        $content = $request->input("content");
        $catetory = $request->input("catetory");
        $ID_Catetory = DB::table("catetory")->where("name", "=",$catetory)->select("id")->get()->first()->id;
        // nếu câu lệnh chỉ đến select thì sẽ trả về 1 đối tượng, đến get() là lấy ra mảng rồi nhiều mảng con, first lấy ra 1 mảng đầu tiên, id lấy ra giá trị của key=id
        $success =  DB::insert('insert into post (title, content, id_catetory) values (?, ?, ?)', [$title, $content, $ID_Catetory]);
        return redirect()->route("admin.posts.index");
    }

    public function show(string $id, Request $request)
    {
        // $data_search =   $request->input('content');
        // $data_show = DB::table("post")->where('content','LIKE', '%'.$data_search.'%')->get();
        // // Trả về những dòng  dữ liệu mà có chứa nội dung người dùng search
        // return redirect()->route('admin.posts.index')->with("data_search", $data_show);
    }


    public function edit(string $id)
    {
        $data_update = DB::table("post")->where("id", "=", $id)->get()->first();
        $catetory = DB::table("catetory")->select("name")->get();
        $data = ['data_update'=> $data_update, 'catetory'=> $catetory];
        return View("pages.posts.edit")->with("data",  $data);
    }

    public function update(Request $request, string $id)
    {
        $title = $request->input("title");
        $content = $request->input("content");
        $catetory = $request->input("catetory");
        $ID_Catetory = DB::table("catetory")->where("name", "=",$catetory)->select("id")->get()->first()->id;
        DB::table('post')->where("id", "=",$id)->update(['title'=>$title, 'content'=> $content, 'id_catetory'=>$ID_Catetory, 'updated_at'=>Carbon::now()]);
        return Redirect::to("admin/posts/");
    }

    public function destroy(string $id)
    {
        $notice ="";
        $data_delete = DB::table("post")->where("id", "=",$id )->delete();
        $data_delete  ? $notice= "Xoá Thành Công" : $notice = "Xoá thất bại";
        echo $notice;
        return Redirect::to("admin/posts/");
    }

    public function search( Request $request)
    {
        $data_input =   $request->input('content');
        $data_show['data'] = DB::table("post")->where('content','LIKE', '%'.$data_input.'%')->get();
        $data_show['err'] = 0;
        if(count($data_show['data'])!=0){
            $data_show['err'] = 1;
        }
        // Trả về những dòng  dữ liệu mà có chứa nội dung người dùng search
        return View('pages.posts.index')->with("data_search", $data_show);
    }
}
