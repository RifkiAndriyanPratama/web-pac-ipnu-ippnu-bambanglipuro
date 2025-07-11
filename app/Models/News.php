<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
use Illuminate\Support\Str;

class News extends Model
{
    protected $fillable = ['title', 'slug', 'content', 'thumbnail', 'published_at', 'news_category_id'];

    public function newsCategory()
{
    return $this->belongsTo(NewsCategory::class);
}

public function getPublishedAtFormattedAttribute()
{
    return $this->published_at ? Carbon::parse($this->published_at)->format('d M Y') : null;
}

protected static function booted()
    {
        static::creating(function ($news) {
            $news->slug = static::generateSlug($news->title);
        });

        static::updating(function ($news) {
            // Kalau judul diubah, slug ikut diubah
            $news->slug = static::generateSlug($news->title);
        });
    }

    protected static function generateSlug($title)
    {
        $slug = Str::slug($title);
        $original = $slug;
        $count = 1;

        // Cek apakah slug sudah dipakai
        while (static::where('slug', $slug)->exists()) {
            $slug = "{$original}-{$count}";
            $count++;
        }

        return $slug;
    }

}
