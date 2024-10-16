@extends('layout')
@section('', '')
@section('content')
    @php
        $isSearch = 0; // kiểm tra xem người tìm kiếm ra kết quả hay không.
        // 0 là trạng thai ban đầu khi mới vào trang chưa bấm search
        // 1 là trạng thái đã search mà k có kết quả
        // 2 là trạng thái đã search và có kết quả
        $data_view = null;
        if (isset($data_search)) {
            // trường hợp đã bấm search sẽ vào đây
            if ($data_search['err'] == 0) {
                // trường hợp có search mà k ra kết quả 
                $isSearch = 1;
            } else {
                // trường hợp có search ra kết quả 
                $isSearch = 2;
                $data_view = $data_search['data'];
            }
        } else {
            // trường hợp chưa bấm search sẽ vào đây
            $data_view = $data;
        }
        // kiểm tra nếu người dùng đang tìm kiếm và trả về kết quả thì hiển thị kết quả cho người dùng,
        // ngược lại sẽ hiển thị danh sách bài viết như bình thường
    @endphp

    <div id="page-wrapper">
        <div class="container-fluid" style="margin: 15px 5px">
            {{-- Tiêu đề trang --}}
            <div class="row">
                <div class="col-lg-12">
                    <h1 style="margin-bottom: 0">Đây là trang xem danh sách danh mục bài viết </h1>
                </div>
            </div>

            {{-- Chứa các button thêm, trang chủ, tìm kiếm --}}
            <div class="row" style="margin-top: 1rem; margin-bottom: 1rem">
                <div class="col-lg-6">
                    <a href={{ route('admin.catetories.create') }} class="btn bg-warning">Thêm Danh Mục Bài Viết</a>
                    <a href={{ route('admin.catetories.index') }} class="btn bg-info"style="padding: 6px 2rem;">
                        <i class="fa fa-home"></i>
                    </a>
                </div>
                <div class="col-lg-6" style="margin: 10px 0;">
                    <form action={{ route('admin.catetories.search') }} method="POST">
                        @csrf
                        @method('POST')
                        <div class="input-group custom-search-form">
                            <input type="text" class="form-control" name="name" placeholder="Search...">
                            <span class="input-group-btn">
                                <button class="btn btn-primary" type="submit">
                                    <i class="fa fa-search"></i>
                                </button>
                            </span>
                        </div>
                    </form>
                </div>
            </div>

            {{-- Bảng hiển thị danh sách bài viết --}}
            <div class="row">
                <div class="col-lg-12">
                    <table class="table table-hover">
                        <thead class="bg-info">
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Description</th>
                                <th>Status</th>
                                <th>Create At</th>
                                <th>Update At</th>
                                <th>Update</th>
                                <th>Delete</th>
                            </tr>
                        </thead>
                        <tbody class="bg-waning">
                            @if ($isSearch == 1)
                                <p style="color: red">Không tìm thấy kết quả cho nội dung bạn đang tìm kiếm, vui lòng tìm kiếm lại</p>
                            @else
                                @foreach ($data_view as $item)
                                    <tr>
                                        <td>{{ $item->id }}</td>
                                        <td>{{ $item->name }}</td>
                                        <td>{{ $item->description }}</td>
                                        <td>{{ $item->status }}</td>
                                        <td>{{ $item->created_at }}</td>
                                        <td>{{ $item->updated_at }}</td>
                                        <td>
                                            <a href={{ route('admin.catetories.edit', $item->id) }}>
                                                <i class="fa fa-pencil-square-o"></i>
                                            </a>
                                        </td>
                                        <td>
                                            <form action={{ route('admin.catetories.destroy', $item->id) }} method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit"> <i class="fa fa-trash"></i></button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
