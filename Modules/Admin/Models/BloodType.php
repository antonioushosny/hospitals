<?php

namespace Modules\Admin\Models;

use Illuminate\Database\Eloquent\Model;
 
class BloodType extends Model
{
 
    protected $connection = 'mysql';
    protected $table = 'blood_types';
 
    /**
     * Primary key. 
     * 
     * @var string
     */
    protected $primaryKey = 'blood_types_id';


    /**
     * 
     * Timestamps.
     * 
     * @var string
     */
    const CREATED_AT = 'blood_types_created_at';
    const UPDATED_AT = 'blood_types_updated_at';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'blood_types_type','blood_types_amount'
    ];
 
}
