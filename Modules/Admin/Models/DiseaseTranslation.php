<?php

namespace Modules\Admin\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\StorageHandle;

class DiseaseTranslation extends Model
{
    use  StorageHandle;

    protected $connection = 'mysql';
    /**
     * Table name.
     * 
     * @var string
     */
    
    protected $table = 'disease_translations';

    /**
     * Primary key.
     * 
     * @var string
     */
    protected $primaryKey = 'diseases_trans_id';

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
        'diseases_title' 
    ];

   
    /**
     * Many to one relation with branches.
     * 
     * @return collection of branch
     */
    public function disease()
    {
    	return $this->belongsTo('Modules\Admin\Models\Disease', 'diseases_id', 'diseases_id');
    }
}
