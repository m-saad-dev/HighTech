<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FreelanceContract extends Model 
{

    protected $table = 'freelance_contracts';
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'platform_id',
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
        'platform_id' => 'required|int',
        'created_by' => 'required|int',
    ];
    /**
     * The rules of edit users fields.
     *
     * @var array<string, string>
     */
    static public $editRules = [
        'name' => 'sometimes|string|max:255',
        'platform_id' => 'required|int',
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
    
    public function platform()
    {
        return $this->belongsTo(FreelancerPlatform::class, 'platform_id');
    }
}
