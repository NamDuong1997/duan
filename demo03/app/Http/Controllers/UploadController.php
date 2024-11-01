<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UploadController extends Controller
{
    public function upload()
    {
        return view('upload');
    }

    public function uploadHandler(Request $rq)
    {
        $file = $rq->hinh_anh;
        $path = $file->store('uploads');
        $message = "Upload thanh cong";
        $data = [
            'path' => $path,
            'message' => $message
        ];
        
        // return view('upload-success', compact('path', 'message'));
        return view('upload-success', $data);

        // compact('path', 'message') ==> ['path' => $path, 'message' => $message];
    }
}
