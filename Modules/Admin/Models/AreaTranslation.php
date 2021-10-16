<?php

namespace Modules\Admin\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\StorageHandle;

class AreaTranslation extends Model
{
    use  StorageHandle;

    protected $connection = 'mysql';
    /**
     * Table name.
     * 
     * @var string
     */
    
    protected $table = 'area_translations';

    /**
     * Primary key.
     * 
     * @var string
     */
    protected $primaryKey = 'aries_trans_id';

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
        'areas_title' 
    ];

   
    /**
     * Many to one relation with city.
     * 
     * @return collection of city
     */
    public function city()
    {
    	return $this->belongsTo('Modules\Admin\Models\City', 'cities_id', 'cities_id');
    }
}
