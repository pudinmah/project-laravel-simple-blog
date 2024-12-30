<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;

class HomepageController extends Controller
{
    public function index()
    {
        $datas = Post::paginate(2);

        return view('front.index', compact('datas'));
    }

    public function BlogDetail($id)
    {
        $data = Post::find($id);

        return view('front.blog_detail', compact('data'));
    }
}
