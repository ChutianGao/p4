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
            ['1','Need a roommate!', "I am a boy. I'm looking for a roommate.", "Boston", "MA", "2018-09-01", "7 months - 9 months", "2018-04-18 20:15:34", "published"],
            ['1','Roommate wanted!', "I need a roommate at Boston.", "Boston", "MA", "2018-09-01", "3 months - 6 months", "2018-04-01 09:12:51", "published"],
            ['2','I have a 2b2b', "My room is avalaible!", "Boston", "MA", "2018-10-01", "7 months - 9 months", "2018-04-020 10:22:51", "published"],
        ];

        $count = count($posts);
        foreach ($posts as $postData) {
            $post = new Post();
            $post->created_at = Carbon\Carbon::now()->subDays($count)->toDateTimeString();
            $post->updated_at = Carbon\Carbon::now()->subDays($count)->toDateTimeString();
            $post->user_id    = $postData[0];
            $post->title      = $postData[1];
            //$post->post_type  = $postData[2];
            $post->body       = $postData[2];
            $post->city       = $postData[3];
            $post->state      = $postData[4];
            $post->movein_date  = $postData[5];
            $post->term         = $postData[6];
            $post->published_at = $postData[7];
            $post->status       = $postData[8];

            $post->save();
            $count--;
        }
    }
}
