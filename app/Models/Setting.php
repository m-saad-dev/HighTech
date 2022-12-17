<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class Setting extends Model implements HasMedia
{
    use InteractsWithMedia, HasFactory;
    protected $with = [
        'media',
    ];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'key',
        'value',
    ];

    public static $generalStatistics = [
        'companies_counter',
        'accounts_counter',
        'work_hours_counter'
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'key' => 'string',
        'value' => 'object',
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [

    ];

    public function getTitle($locale)
    {
        return $this->value->title->{$locale}/*json_decode($this->value, true)['title'][$locale]*/;
    }
    public function getContent($locale)
    {
        return $this->value->content->{$locale}/*json_decode($this->value, true)['content'][$locale]*/;
    }
}
