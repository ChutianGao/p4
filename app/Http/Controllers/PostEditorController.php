<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;

class PostEditorController extends Controller {
    /**
     * GET / or /browser
     */
    public function browser() {
        # Get published posts
        $posts = POST::orderBy('published_at', "desc")->get();
        return view('browser')->with(["posts" => $posts]);
    }

    /**
     * POST / or /browser
     */
    public function search(Request $request) {
        $request->flash();
        $searchTerm = $request->input('searchTerm', null);

        # Get published posts
        $posts = array();
        $posts = POST::where('title', 'like', '%' . $searchTerm . '%')
            ->orWhere('body', 'like', '%' . $searchTerm . '%')
            ->get();
        return view('browser')->with([
            "posts" => $posts,
            'searchTerm' => $searchTerm,
        ]);
    }

    /**
     * GET /
     */
    public function index() {
        return view('post-editor')->with([
            "title" => "",
            "messages" => array(),
        ]);
    }



    /**
     * GET /post/{id}
     */
    public function show($id) {
        $post = POST::where('id', $id)->first();
        return view('show')->with([
            "post" => $post
        ]);
    }

    /**
     * POST /post/
     */
    public function save_post(Request $request) {

        $this->validate($request, [
            'title' => 'required',
            'body' => 'required',
            'state' => 'required',
        ]);


        $request->flash();

        $save_mode = $request->save_mode;

        $post              = new Post();
        $post->user_id     = '0';
        $post->post_type   = $request->post_type;
        $post->title       = $request->title;
        $post->body        = $request->body;
        
        if (isset($request->city)) {
            $post->city = $request->city;
        } else {
            $post->city = '';
        }
        
        $post->state       = $request->state;
        $post->term        = $request->term;
        $post->movein_date = $request->movein_date;
        $post->published_at = date('Y-m-d H:i:s');
        
        if ($save_mode == 'Save') {
            $post->status = 'saved';
        } else {
            $post->status = 'published';
        }       
        
        
        $post->save();

        return view('post-editor')->with([
            "messages" => ["Saved!"],

        ]);
    }
}
