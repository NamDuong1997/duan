@extends("layout")
@section("", "")
@section("content")
<div id="page-wrapper" >
    <div class="container-fluid" style="margin: 15px 5px">
        <h1>Đây là trang thêm bài viết </h1>
        <div>
            <form action={{route('admin.posts.update', $data['data_update']->id)}} method="POST" >
                @csrf
                @method("PUT")
                <div class="form-group">
                  <label for="">Title</label>
                  <input type="text" class="form-control" name="title" value="{{$data['data_update']->title}}">
                </div>
                <div class="form-group">
                  <label for="">Content</label>
                  <input type="text" class="form-control" name="content" value="{{$data['data_update']->content}}">
                </div>
                <div class="form-group">
                  <label for="">Catetory</label>
                  <select name="catetory">
                        @foreach ($data['catetory'] as $item)
                            <option name="catetory">{{$item->name}}</option>
                        @endforeach
                  </select>
                </div>
                <button type="submit" class="btn btn-default">Sua San Pham</button>
              </form>
        </div>
    </div>
</div>
@endsection