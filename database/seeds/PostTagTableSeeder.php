<?php

use Illuminate\Database\Seeder;
use App\Post;
use App\Tag;

class PostTagTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        $tags = ["Apartment", "Roommates", "Roommates", "Apartment"];
        $posts = Post::all();
        
        # Now loop through the above array, creating a new pivot for each book to tag
        foreach ($posts as $post) {

            $random_index = mt_rand(0,3);
            
            $tag = Tag::where('name', 'LIKE', "%" . $tags[$random_index] . "%")->first();

            $post->tags()->save($tag);        
        }
    }
}
