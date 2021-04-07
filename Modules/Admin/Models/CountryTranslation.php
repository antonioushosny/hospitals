<?php

namespace Modules\Admin\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\StorageHandle;

class CountryTranslation extends Model
{
    use  StorageHandle;

    protected $connection = 'mysql';
    /**
     * Table name.
     * 
     * @var string
     */
    
    protected $table = 'country_translations';

    /**
     * Primary key.
     * 
     * @var string
     */
    protected $primaryKey = 'countries_trans_id';

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
        'countries_title' 
    ];

   
    /**
     * Many to one relation with branches.
     * 
     * @return collection of branch
     */
    public function country()
    {
    	return $this->belongsTo('Modules\Admin\Models\Country', 'countries_id', 'countries_id');
    }
}
