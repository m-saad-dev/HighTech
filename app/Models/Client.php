<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\HasMedia;

class Client extends Model implements HasMedia
{
    use InteractsWithMedia;

    protected $table = 'clients';
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'created_by',
        'updated_by',
    ];


    /**
     * The rules of create users fields.
     *
     * @var array<string, string>
     */
    static public $createRules = [
        'name' => 'required|string|max:255',
        'created_by' => 'required|int',
    ];
    /**
     * The rules of edit users fields.
     *
     * @var array<string, string>
     */
    static public $editRules = [
        'name' => 'sometimes|string|max:255',
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
