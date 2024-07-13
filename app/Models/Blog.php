<?php

namespace App\Models;

use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    use HasFactory;
    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id')->withDefault([
            'name' => 'Unknown',
            'slug' => 'Unknown',
        ]);
    }

    public function parts()
    {
        return $this->hasMany(BlogParts::class, 'blog_id');
    }

    public function parentParts()
    {
        return $this->hasMany(BlogParts::class, 'part_id');
    }

    public function gettingDate()
    {
        return $this->created_at->format('d M y');
    }

    public function description()
    {
        $text = $this->seo_description;

        // Ensure the text is UTF-8 encoded
        $text = mb_convert_encoding($text, 'UTF-8', 'auto');

        if (mb_strlen($text) > 90) {
            $text = mb_substr($text, 0, 90);
            $lastSpace = mb_strrpos($text, ' ');
            if ($lastSpace !== false) {
                $text = mb_substr($text, 0, $lastSpace) . '...';
            }
        }

        return $text;
    }
}