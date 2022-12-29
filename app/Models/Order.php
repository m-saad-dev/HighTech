<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{

    protected $table = 'orders';
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'business_type',
        'phone_number',
        'service_id',
        'created_by',
        'updated_by',
    ];

    protected $casts = [
        'service_id' => 'int',
    ];
    /**
     * The rules of create users fields.
     *
     * @var array<string, string>
     */
    static public $createRules = [
        'name' => 'required|string|max:255',
        'business_type' => 'required|string|max:255',
        'phone_number' => 'required|string',
        'service_id' => 'required|int',
        'created_by' => 'required|int',
    ];
    /**
     * The rules of edit users fields.
     *
     * @var array<string, string>
     */
    static public $editRules = [
        'name' => 'required|string|max:255',
        'business_type' => 'required|string|max:255',
        'phone_number' => 'required|string',
        'service_id' => 'required|ing',
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

    public function service()
    {
        return $this->belongsTo(Service::class, 'service_id');
    }

    public function getServiceTitleAttribute($attribute)
    {
        return Service::where('id', $this->service_id)->first()->title;
    }
}
