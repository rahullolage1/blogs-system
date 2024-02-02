<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades;

class Blog extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'image'
    ];

    protected $table = "blogs";

    public function createBlog($request)
    {
        // dd($request->hasfile('image'));
        $validator = validator::make($request->all(), [
            "title" => "required|string|unique:blogs|max:100",
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 400);
        }

        if ($request->hasfile('image')) {
            $file = $request->file('image');
            $extenstion = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extenstion;
            $file->move('uploads/blogs/', $filename);
            $request->image = $filename;
        }


        $data = Blog::create([
            "title" => $request["title"],
            "description" => $request["description"],
            "image" => $request->image
        ]);

        return 'blogs created';
    }

    public function blog_list()
    {
        $list = Blog::all();

        $data = $list->toArray();

        // dd($data);

        return $data;
    }

}
