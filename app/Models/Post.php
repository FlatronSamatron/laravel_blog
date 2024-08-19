<?php

namespace App\Models;

use App\Http\Requests\Post\StorePostRequest;
use App\Http\Requests\Post\UpdatePostRequest;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class Post extends Model
{
    use HasFactory;
    use Sluggable;

    protected $guarded = [];

    public function tags()
    {
        return $this->belongsToMany(Tag::class)->withTimestamps();
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function sluggable(): array
    {
        return [
                'slug' => [
                        'source' => 'title',
                ],
        ];
    }

    public static function uploadImage(Request $request, $image = null)
    {
        if($request->hasFile('thumbnail')){
            if($image){
                Storage::disk('public')->delete($image);
            }

            $folder = date('Y-m-d');
            return $request->file('thumbnail')->store('images/'.$folder, 'public');
        }
    }

    public function getImage()
    {
        return $this->thumbnail ? Storage::url($this->thumbnail) : '/default_cover.jpg';
    }
}
