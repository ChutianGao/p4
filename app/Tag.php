<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    public function posts()
    {
        return $this->belongsToMany('App\Post')->withTimestamps();
    }

    public static function getForCheckboxes()
    {
        $tags = self::orderBy('name')->get();
        $tagsForCheckboxes = [];
        foreach ($tags as $tag) {
            $tagsForCheckboxes[$tag->id] = $tag->name;
        }
        return $tagsForCheckboxes;
    }
}
