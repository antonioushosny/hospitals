<?php

namespace Modules\Admin\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\StorageHandle;

class HospitalTranslation extends Model
{
    use  StorageHandle;

    protected $connection = 'mysql';
    /**
     * Table name.
     * 
     * @var string
     */
    
    protected $table = 'hospital_translations';

    /**
     * Primary key.
     * 
     * @var string
     */
    protected $primaryKey = 'hospitals_trans_id';

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
        'hospitals_title', 'hospitals_address' 
    ];

   
    /**
     * Many to one relation with branches.
     * 
     * @return collection of branch
     */
    public function hospital()
    {
    	return $this->belongsTo('Modules\Admin\Models\Hospital', 'hospitals_id', 'hospitals_id');
    }
}
