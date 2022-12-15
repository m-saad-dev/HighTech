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

class User extends Authenticatable implements HasMedia
{
    use HasApiTokens, HasFactory, Notifiable, HasRoles, InteractsWithMedia;

    protected $table = 'users';
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'phone_number',
        'address',
        'password',
        'parent_id',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * The rules of create users fields.
     *
     * @var array<string, string>
     */
    static public $createRules = [
        'role' => 'required|string',
        'parent_id' => 'required|int',
        'name' => 'required|string',
        'email' => 'required|email',
        'address' => 'required|string',
        'phone_number' => 'required|numeric|digits_between:5,15|unique:users,phone_number',
        'password' => 'min:8',
    ];
    /**
     * The rules of edit users fields.
     *
     * @var array<string, string>
     */
    static public $editRules = [

        'role' => 'sometimes|string',
        'parent_id' => 'sometimes|int',
        'name' => 'sometimes|string',
        'email' => 'sometimes|email',
        'address' => 'sometimes|string',
        'phone_number' => 'sometimes|numeric|digits_between:5,15|unique:users,phone_number',
        'password' => 'sometimes|min:8',
    ];

    public function registerMediaCollections(): void
    {
        $this->addMediaCollection('avatars');
    }

    public function children()
    {
        return $this->hasMany(User::class, 'parent_id');
    }

    public function parent()
    {
        return $this->belongsTo(User::class, 'parent_id');
    }
}
