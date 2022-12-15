<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class Setting extends Model implements HasMedia
{
    use InteractsWithMedia;
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
        'value' => 'string',
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
        return json_decode($this->value, true)['title'][$locale];
    }
    public function getContent($locale)
    {
        return json_decode($this->value, true)['content'][$locale];
    }
}
