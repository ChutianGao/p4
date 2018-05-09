<?php

namespace App\Http\Controllers;

use App\Post;
use App\Tag;
use Illuminate\Http\Request;

class PostController extends Controller {
    /**
     * GET / or /posts
     */
    public function browser() {
        # Get published posts
        $posts = POST::orderBy('published_at', "desc")->with("tags")->get();
        return view('browser')->with([
            "posts" => $posts,
        ]);
    }

    /**
     * POST / or /posts
     */
    public function search(Request $request) {
        $request->flash();
        $searchTerm = $request->input('searchTerm', null);

        # Get published posts
        $posts = array();
        $posts = POST::where('title', 'like', '%' . $searchTerm . '%')
            ->orWhere('body', 'like', '%' . $searchTerm . '%')
            ->orWhere('city', 'like', '%' . $searchTerm . '%')
            ->orWhere('state', 'like', '%' . $searchTerm . '%')
            ->orWhere('term', 'like', '%' . $searchTerm . '%')
            ->with("tags")
            ->orderBy('published_at', "desc")
            ->get();

        return view('browser')->with([
            "posts" => $posts,
            'searchTerm' => $searchTerm,
        ]);
    }

    /**
     * GET /posts/create
     */
    public function create() {
        $tagsForCheckboxes = Tag::getForCheckboxes();
        return view('create')->with([
            "tagsForCheckboxes" => $tagsForCheckboxes,
            "tags" => array(),
        ]);
    }

    /**
     * GET /posts/{id}
     */
    public function show($id) {
        $post = POST::where('id', $id)->with("tags")->first();
        return view('show')->with([
            "post" => $post,
        ]);
    }

    /**
     * POST /posts/create
     */
    public function store(Request $request) {
        $this->validate($request, [
            'title' => 'required',
            'body' => 'required',
            'state' => 'required',
        ]);

        $save_mode = $request->save_mode;
        $post = new Post();
        $post->user_id = request()->user()->id;
        $post->title = $request->title;
        $post->body = $request->body;

        if (isset($request->city)) {
            $post->city = $request->city;
        } else {
            $post->city = '';
        }

        $post->state = $request->state;
        $post->term = $request->term;
        $post->movein_date = $request->movein_date;
        $post->published_at = date('Y-m-d H:i:s');

        if ($save_mode == 'Save') {
            $post->status = 'saved';
        } else {
            $post->status = 'published';
        }

        $post->save();
        $post->tags()->sync($request->tags);

        return redirect('/posts')->with([
            'messages' => ['Published!'],
        ]);
    }

    /**
     * GET /posts/{id}/edit
     */
    public function edit($id) {

        $post = POST::where('id', $id)->first();
        $tagsForCheckboxes = Tag::getForCheckboxes();
        $tags = $post->tags()->pluck('tags.id')->toArray();

        return view('edit')->with([
            "post" => $post,
            "tagsForCheckboxes" => $tagsForCheckboxes,
            'tags' => $tags,
        ]);
    }

    /**
     * POST /post/{id}/edit
     */
    public function update(Request $request, $id) {

        $this->validate($request, [
            'title' => 'required',
            'body' => 'required',
            'state' => 'required',
        ]);

        $post = POST::find($id);
        $post->title = $request->title;
        $post->body = $request->body;

        if (isset($request->city)) {
            $post->city = $request->city;
        } else {
            $post->city = '';
        }

        $post->state = $request->state;
        $post->term = $request->term;
        $post->movein_date = $request->movein_date;
        $post->published_at = date('Y-m-d H:i:s');

        if ($request->save_mode == 'Save') {
            $post->status = 'saved';
        } else {
            $post->status = 'published';
        }

        $post->save();

        $post->tags()->sync($request->tags);

        return redirect('/posts/' . $id . '/edit')->with([
            "messages" => ["Updated!"],
        ]);
    }


    /**
     * Asks user to confirm
     * GET /posts/{id}/delete
     */
    public function delete($id) {
        $post = Post::find($id);

        if (!$post) {
            return redirect('/posts')->with(['Messages' => 'Post not found']);
        }

        return view('delete')->with([
            'post' => $post,
        ]);
    }

    /**
     * Actually deletes the post
     * DELETE /posts/{id}/delete
     */
    public function destroy($id) {
        $post = Post::find($id);
        $post->tags()->detach();
        $post->delete();
        return redirect('/posts')->with([
            'messages' => ['Your post was removed.'],
        ]);
    }

}
