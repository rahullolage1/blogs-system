<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function addBlog(Request $request)
    {
        // $input = $request->all();



        $newData = new Blog();
        $result = $newData->createBlog($request);
        if (gettype($result) == 'object') {
            return $result;
        } else {
            return response()->json([
                'status' => 'ok',
                'message' => 'Blog Created',
            ], 201);
        }

    }


    public function listBlog()
    {

        $result = new Blog();
        $response = $result->blog_list();
        // dd($response);
        return response()->json([
            'status' => 'success',
            'response' => $response,
            'status_code' => 200
        ], 200);
    }
}
