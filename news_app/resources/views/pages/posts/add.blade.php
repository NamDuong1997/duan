@extends('layout')
@section('', '')
@section('content')
    <div id="page-wrapper">
        <div class="container-fluid" style="margin: 15px 5px">
            <h1>Đây là trang thêm bài viết </h1>
            <div>
                <form action={{ route('admin.posts.store') }} method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="">Title</label>
                        <input type="text" class="form-control" name="title">
                    </div>
                    <div class="form-group">
                      <label for="">Content</label>
                      <textarea name="content" id="editor" cols="30" rows="10"></textarea>
                  </div>
                    <div class="form-group">
                        <label for="">Catetory</label>
                        <select name="catetory">
                            @foreach ($name_catetory as $item)
                                <option name="catetory">{{ $item->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <button type="submit" class="btn btn-default">Them San Pham</button>
                </form>
            </div>
        </div>
    </div>
@endsection

@push('script')
    {{-- Cach 2 de cai dat ckeditor bang link cdn --}}
    {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/ckeditor5/43.2.0/ckeditor.js">
    </script>
    <script>
      //  document.addEventListener('DOMContentLoaded', () => {
            ClassicEditor
                .create(document.querySelector('#editor'))
                .catch(error => {
                    console.error(error);
                });
        // });
    </script> --}}
    <script src="../js/dataTables/jquery.dataTables.min.js"></script>
    <script src="../js/dataTables/dataTables.bootstrap.min.js"></script>
@endpush


