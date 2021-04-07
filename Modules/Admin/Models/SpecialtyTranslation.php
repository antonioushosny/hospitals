<?php

namespace Modules\Admin\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\StorageHandle;

class SpecialtyTranslation extends Model
{
    use  StorageHandle;

    protected $connection = 'mysql';
    /**
     * Table name.
     * 
     * @var string
     */
    
    protected $table = 'specialty_translations';

    /**
     * Primary key.
     * 
     * @var string
     */
    protected $primaryKey = 'specialties_trans_id';

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
        'specialties_title' 
    ];

   
    /**
     * Many to one relation with branches.
     * 
     * @return collection of branch
     */
    public function specialty()
    {
    	return $this->belongsTo('Modules\Admin\Models\Specialty', 'specialties_id', 'specialties_id');
    }
}
