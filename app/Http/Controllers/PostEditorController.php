<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PostEditorController extends Controller
{
    /**
     * GET /browser
     */
    public function browser()
    {
        return view('browser');
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
