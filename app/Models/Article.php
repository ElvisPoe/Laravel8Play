<?php

namespace App\Models;

use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\File;

class Article
{
    // This Model gets articles from simple html files.
    // Just to play around with files and caching.

    public static function all(){

        return cache()->rememberForever('articles.all', function () {
            $files = File::files(resource_path("articles/"));
            return array_map(fn($file) => $file->getContents(), $files);
        });

    }

    public static function find($slug) {

        if(!file_exists($path = resource_path("articles/{$slug}.html"))) {
            throw new ModelNotFoundException();
        }

        return cache()->remember("articles.{$slug}", 1200, fn() => file_get_contents($path));
    }
}
