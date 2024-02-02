<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

    protected $fillable = [
        'comment_title',
        'reply',
    ];

    protected $table = "comments";

    public function createComment($request)
    {
        $data = Comment::create([
            "comment_title" => $request["comment_title"],
            "reply" => $request["reply"],
        ]);

        return 'blogs created';
    }

    public function comment_list()
    {
        $list = Comment::all();

        $data = $list->toArray();

        // dd($data);

        return $data;
    }

    // public function add_reply(){

    // }

}



