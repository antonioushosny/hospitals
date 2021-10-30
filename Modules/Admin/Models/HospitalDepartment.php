<?php

namespace Modules\Admin\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\StorageHandle;

class HospitalDepartment extends Model
{
    use StorageHandle;

    /**
     * Table name.
     * 
     * @var string
     */
    protected $table = 'hospitals_departments';

    /**
     * Primary key.
     * 
     * @var string
     */
    protected $primaryKey = 'hospitals_departments_id';


    /**
     * Timestamps.
     * 
     * @var boolean
     */
    public $timestamps = false;


    /**
     * Fillable fields.
     * 
     * @var array
     */
    protected $fillable = [
        'hospitals_id', 'departments_id'
    ];

    /**
     * Many to one relation with hospitals.
     * 
     * @return collection of hospital
     */
    public function hospital()
    {
        return $this->belongsTo('Modules\Introductory\Models\Hospital', 'hospitals_id', 'hospitals_id');
    }

}
