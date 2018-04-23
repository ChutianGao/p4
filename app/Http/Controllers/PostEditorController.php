<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;

class PostEditorController extends Controller
{
    /**
     * GET / or /browser
     */
    public function browser()
    {
        # Get published posts
        $posts = POST::orderBy('published_at', "desc")->get();
        return view('browser')->with(["posts"=>$posts]);
    }

    /**
     * POST / or /browser
     */
    public function search(Request $request)
    {
        $request->flash();
        $searchTerm = $request->input('searchTerm', null);

        # Get published posts
        $posts = array();
        $posts = POST::where('title', 'like', '%'.$searchTerm.'%')
                    ->orWhere('body', 'like', '%'.$searchTerm.'%')
                    ->get();
        return view('browser')->with([
            "posts"      =>$posts,
            'searchTerm' => $searchTerm
        ]);
    }

    /**
     * GET /
     */
    public function index()
    {
        return view('post-editor')->with(["post_title"=>""]);
    }

    /**
     * POST /post/
     */
    public function save_post(Request $request)
    {
        
        $post_title = $request->input('post_title', '');

        dump($request);

        return view('post-editor')->with(["post_title"=>$post_title]);
    }
}
