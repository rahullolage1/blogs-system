<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function addComment(Request $request)
    {

        $newData = new Comment();
        $result = $newData->createComment($request);
        if (gettype($result) == 'object') {
            return $result;
        } else {
            return response()->json([
                'status' => 'ok',
                'message' => 'Comment Created',
            ], 201);
        }

    }


    public function listComment()
    {

        $result = new Comment();
        $response = $result->comment_list();
        // dd($response);
        return response()->json([
            'status' => 'success',
            'response' => $response,
            'status_code' => 200
        ], 200);
    }

    public function addReply(Request $request)
    {

        $newData = new Comment();
        $result = $newData->add_reply($request);
        if (gettype($result) == 'object') {
            return $result;
        } else {
            return response()->json([
                'status' => 'ok',
                'message' => 'Comment Created',
            ], 201);
        }

    }
}
