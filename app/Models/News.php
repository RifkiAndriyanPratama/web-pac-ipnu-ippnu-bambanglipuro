<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    protected $fillable = ['title', 'content', 'thumbnail', 'published_at', 'news_category_id'];

    public function newsCategory()
{
    return $this->belongsTo(NewsCategory::class);
}

}
