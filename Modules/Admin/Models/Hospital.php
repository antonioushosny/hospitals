<?php

namespace Modules\Admin\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\StorageHandle;

class Hospital extends Model
{
    use \Dimsav\Translatable\Translatable, StorageHandle;
    protected $connection = 'mysql';
    // use   StorageHandle;

    /**
     * Primary key. 
     * 
     * @var string
     */
    protected $primaryKey = 'hospitals_id';


    /**
     * Translated attributes.
     * 
     * @var array
     */
    public $translatedAttributes =  [
        'hospitals_title', 'hospitals_address' 
    ];

    /**
     * 
     * Timestamps.
     * 
     * @var string
     */
    const CREATED_AT = 'hospitals_created_at';
    const UPDATED_AT = 'hospitals_updated_at';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'hospitals_phone', 'hospitals_status','hospitals_gps','countries_id'
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
    
    /**
     * Scope a query to order data.
     *
     * @param \Illuminate\Database\Eloquent\Builder $query
     * @param string $type    ['asc', 'desc']
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeSorted($query, $type='asc')
    {
        // return $query->orderBy('hospitals_position', $type)->orderBy('hospitals.hospitals_id', $type);
    }

    /**
     * Scope a query to fetch Active data only.
     *
     * @param \Illuminate\Database\Eloquent\Builder $query
     * 
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeActive($query)
    {
        return $query->where('hospitals_status', 'active');
    }

     

}
