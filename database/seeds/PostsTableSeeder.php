<?php

use Illuminate\Database\Seeder;
use App\Post;

class PostsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $posts = [
            ['1','Need a roommate!', "roommates", "I am a boy. I'm looking for a roommate.", "Boston", "MA", "2018-09-01", "3", "2018-04-18 20:15:34", "published"],
            ['2','Roommate wanted!', "roommates", "I need a roommate at Boston.", "Boston", "MA", "2018-09-01", "0", "2018-04-01 09:12:51", "published"],
        ];

        $count = count($posts);
        foreach ($posts as $postData) {
            $post = new Post();
            $post->created_at = Carbon\Carbon::now()->subDays($count)->toDateTimeString();
            $post->updated_at = Carbon\Carbon::now()->subDays($count)->toDateTimeString();
            $post->user_id    = $postData[0];
            $post->title      = $postData[1];
            $post->post_type  = $postData[2];
            $post->body       = $postData[3];
            $post->city       = $postData[4];
            $post->state      = $postData[5];
            $post->movein_date  = $postData[6];
            $post->term         = $postData[7];
            $post->published_at = $postData[8];
            $post->status       = $postData[9];

            $post->save();
            $count--;
        }
    }
}
