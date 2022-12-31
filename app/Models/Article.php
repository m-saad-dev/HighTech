<?php

namespace App\Models;

use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Astrotomic\Translatable\Translatable;
use Spatie\MediaLibrary\InteractsWithMedia;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;

class Article extends Model implements HasMedia, TranslatableContract
{
    use Translatable, InteractsWithMedia;
    protected $table = 'articles';

    public $translatedAttributes = ['title', 'sub_title', 'content'];

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'created_by',
        'updated_by',
    ];

    /**
     * The rules of create service fields.
     *
     * @var array<string, string>
     */
    static public $createRules = [
        'icon' => 'required|image|mimes:JPG,PNG,GIF,WEBP,JPEG,jpg,png,gif,webp,jpeg,svg|max:2048',
        'mediafile.*.images' => 'required|image|mimes:JPG,PNG,GIF,WEBP,JPEG,jpg,png,gif,webp,jpeg,svg|max:2048',
        'created_by' => 'required|int',
    ];
    /**
     * The rules of edit service fields.
     *
     * @var array<string, string>
     */
    static public $editRules = [
        'icon' => 'nullable|image|mimes:JPG,PNG,GIF,WEBP,JPEG,jpg,png,gif,webp,jpeg,svg|max:2048',
        'mediafile.*.images' => 'nullable|image|mimes:JPG,PNG,GIF,WEBP,JPEG,jpg,png,gif,webp,jpeg,svg|max:2048',
        'updated_by' => 'required|int',
    ];

    public function registerMediaCollections(): void
    {
        $this->addMediaCollection('avatars');
    }

    public function creator()
    {
        return $this->belongsTo(User::class, 'created_by');
    }

    public function updater()
    {
        return $this->belongsTo(User::class, 'updated_by');
    }

}
