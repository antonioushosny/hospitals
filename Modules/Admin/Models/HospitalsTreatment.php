<?php

namespace Modules\Admin\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\StorageHandle;


class HospitalsTreatment extends Model 
{
    use   StorageHandle;
    protected $connection = 'mysql';
    // use   StorageHandle;

    /**
     * Primary key. 
     * 
     * @var string
     */
    protected $primaryKey = 'hospitals_treatments_id';
 

    /**
     * 
     * Timestamps.
     * 
     * @var string
     */
    const CREATED_AT = 'hospitals_treatments_created_at';
    const UPDATED_AT = 'hospitals_treatments_updated_at';
 
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'hospitals_id','diseases_id','doctors_id','hospitals_treatments_period','hospitals_treatments_cost','hospitals_treatments_program','hospitals_treatments_status'
    ];
 
    	 						 	 
    /**
     * Many to one relation with country.
     * 
     * @return collection of country
     */
    public function hospital()
    {
    	return $this->belongsTo('Modules\Admin\Models\Hospital', 'hospitals_id', 'hospitals_id');
    }
        
    /**
     * Many to one relation with hospitals.
     * 
     * @return collection of hospital
     */
    public function doctor()
    {
    	return $this->belongsTo('Modules\Admin\Models\Doctor', 'doctors_id', 'doctors_id');
    }
    /**
     * Many to one relation with departments.
     * 
     * @return collection of department
     */
    public function disease()
    {
    	return $this->belongsTo('Modules\Admin\Models\Disease', 'diseases_id', 'diseases_id');
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
        // return $query->orderBy('hospitals_treatments_position', $type)->orderBy('hospitals_treatments.hospitals_treatments_id', $type);
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
        return $query->where('hospitals_treatments_status', 'active');
    }

     

}
