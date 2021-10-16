<?php

namespace Modules\Admin\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\StorageHandle;

class CityTranslation extends Model
{
    use  StorageHandle;

    protected $connection = 'mysql';
    /**
     * Table name.
     * 
     * @var string
     */
    
    protected $table = 'city_translations';

    /**
     * Primary key.
     * 
     * @var string
     */
    protected $primaryKey = 'cities_trans_id';

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
        'cities_title' 
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
