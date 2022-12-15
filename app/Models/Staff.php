<?php

namespace App\Models;

use Attribute;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Spatie\MediaLibrary\InteractsWithMedia;
use Illuminate\Notifications\Notifiable;
use Spatie\Permission\Traits\HasRoles;
use Spatie\MediaLibrary\HasMedia;
use Laravel\Sanctum\HasApiTokens;

class Staff extends Authenticatable implements HasMedia
{
    use HasApiTokens, HasFactory, Notifiable, HasRoles, InteractsWithMedia;

    protected $table = 'staff';
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'position',
        'created_by',
        'updated_by',
    ];


    /**
     * The rules of create users fields.
     *
     * @var array<string, string>
     */
    static public $createRules = [
        'name' => 'required|string',
        'position' => 'required|string',
        'password' => 'min:8',
        'created_by' => 'required|int',
    ];
    /**
     * The rules of edit users fields.
     *
     * @var array<string, string>
     */
    static public $editRules = [
        'name' => 'sometimes|string',
        'position' => 'sometimes|string',
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
