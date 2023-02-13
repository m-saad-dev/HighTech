<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class FreelanceContract extends Model implements HasMedia
{
    use InteractsWithMedia;

    protected $table = 'freelance_contracts';
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'company_name',
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
            'company_name' => 'required|string|max:255',
            'freelancers.*.freelancer_id' => 'required|string|max:255',
            'freelancers.*.fees' => 'required|numeric',
            'image.*' => 'required|image|mimes:JPG,PNG,GIF,WEBP,JPEG,jpg,png,gif,webp,jpeg,svg|max:2048',
            'platform_id' => 'required|int',
            'created_by' => 'required|int',
    ];
    /**
     * The rules of edit users fields.
     *
     * @var array<string, string>
     */
    static public $editRules = [
            'company_name' => 'sometimes|string|max:255',
            'freelancers.*.freelancer_id' => 'string|max:255',
            'freelancers.*.fees' => 'numeric',
            'image.*' => 'nullable|image|mimes:JPG,PNG,GIF,WEBP,JPEG,jpg,png,gif,webp,jpeg,svg|max:2048',
            'platform_id' => 'required|int',
            'updated_by' => 'required|int',
    ];

    public function registerMediaCollections(): void
    {
        $this->addMediaCollection('logo');
        $this->addMediaCollection('info');
    }

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
    
    public function freelancers()
    {
        return $this->belongsToMany(Freelancer::class, 'freelance_contract_freelancers', 'freelance_contract_id', 'freelancer_id')->withPivot(['freelance_contract_id', 'freelancer_id', 'order', 'fees']);
    }
}
