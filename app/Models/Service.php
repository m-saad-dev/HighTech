<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    use HasFactory;
    protected $table = 'services';
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'title',
        'brief',
        'description',
    ];

        /**
     * The rules of create service fields.
     *
     * @var array<string, string>
     */
    static public $createRules = [
        'name' => 'required|string',
        'title' => 'required|string',
        'brief' => 'required|string',
        'description' => 'required|string',
    ];
    /**
     * The rules of edit service fields.
     *
     * @var array<string, string>
     */
    static public $editRules = [

        'name' => 'sometimes|string',
        'title' => 'sometimes|string',
        'brief' => 'sometimes|string',
        'description' => 'sometimes|string',
    ];

}
