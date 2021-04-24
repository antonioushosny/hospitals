<?php

namespace Modules\Admin\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\StorageHandle;

class Order extends Model
{
    use  StorageHandle;
    protected $connection = 'mysql';
    // use   StorageHandle;

    /**
     * Primary key. 
     * 
     * @var string
     */
    protected $primaryKey = 'orders_id';
 

    /**
     * 
     * Timestamps.
     * 
     * @var string
     */
    const CREATED_AT = 'orders_created_at';
    const UPDATED_AT = 'orders_updated_at';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'orders_id','orders_patient_name','orders_patient_phone','orders_patient_civil_no','orders_patient_nationality','orders_patient_blood_type','orders_patient_address','orders_patient_email','orders_patient_passport','orders_companion_name','orders_companion_phone','orders_companion_civil_no','orders_companion_address','diseases_id','diseases_title','orders_doctor_following','orders_treatment_cost','countries_id','hospitals_id','doctors_id','orders_treatment_budget','orders_prescription_img','orders_treatment_period','orders_doctor_following_notes','orders_status','clients_id','orders_treatments_program'

    ];
 
    /**
     * Set advertisement image
     * 
     * @param string $file
     */
    public function setOrdersPrescriptionImgAttribute($file)
    {
        
        if ($file) {
            if (is_string($file)) {
                $this->attributes['orders_prescription_img'] = $file;
            } else {
                $current_name = $this->currentName($file);

                $this->originalImage($file, $current_name);
                $this->mediumImage($file, $current_name,null,400); 
                $this->thumbImage($file, $current_name,100,null);

                $this->attributes['orders_prescription_img'] = $current_name;
            }
        } else {
            $this->attributes['orders_prescription_img'] = null;
        }
    }
   
    /**
     * Many to one relation with diseases.
     * 
     * @return collection of disease
     */
    public function disease()
    {
    	return $this->belongsTo('Modules\Admin\Models\Disease', 'diseases_id', 'diseases_id');
    }

    /**
     * Many to one relation with country.
     * 
     * @return collection of country
     */
    public function country()
    {
    	return $this->belongsTo('Modules\Admin\Models\Country', 'countries_id', 'countries_id');
    }
    
    /**
     * Many to one relation with hospitals.
     * 
     * @return collection of hospital
     */
    public function hospital()
    {
    	return $this->belongsTo('Modules\Admin\Models\Hospital', 'hospitals_id', 'hospitals_id');
    }
    /**
     * Many to one relation with Doctors.
     * 
     * @return collection of Doctor
     */
    public function doctor()
    {
    	return $this->belongsTo('Modules\Admin\Models\Doctor', 'doctors_id', 'doctors_id');
    }

      /**
     * Many to one relation with clients.
     * 
     * @return collection of client
     */
    public function client()
    {
    	return $this->belongsTo('Modules\Admin\Models\Client', 'clients_id', 'clients_id');
    }

    /**
     * Many to one relation with doctor_following.
     * 
     * @return collection of doctor_following
     */
    public function doctor_following()
    {
    	return $this->belongsTo('Modules\Admin\Models\Doctor', 'orders_doctor_following', 'doctors_id');
    }

       /**
     * Many to one relation with speciimagesalties.
     * 
     * @return collection of images
     */
    public function images()
    {
    	return $this->hasMany('Modules\Admin\Models\OrderImage', 'orders_id', 'orders_id');
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
        // return $query->orderBy('orders_position', $type)->orderBy('orders.orders_id', $type);
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
        return $query->where('orders_status', 'active');
    }

     

}
