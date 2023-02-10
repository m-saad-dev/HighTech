<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Freelancer extends Model 
{

    protected $table = 'freelancers';
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
        'freelancers.*.name' => 'required|string|max:255',
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
    
    public function creator()
    {
        return $this->belongsTo(User::class, 'created_by');
    }

    public function updater()
    {
        return $this->belongsTo(User::class, 'updated_by');
    }
}
