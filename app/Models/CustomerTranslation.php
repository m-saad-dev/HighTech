<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CustomerTranslation extends Model
{
    protected $table = 'customer_translations';
    public $timestamps = false;
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'company_name',
        'review',
    ];


}
