<?php

namespace Modules\Admin\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\StorageHandle;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Hospital extends Authenticatable
{
    use \Dimsav\Translatable\Translatable,Notifiable , StorageHandle;
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
        'hospitals_title', 'hospitals_address','hospitals_desc'
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
        'hospitals_phone', 'hospitals_status','hospitals_lat','hospitals_lng','countries_id','cities_id','hospitals_image','password'
    ];
 
    
    /**
     * Set advertisement image
     * 
     * @param string $file
     */
    public function setHospitalsImageAttribute($file)
    {
        
        if ($file) {
            if (is_string($file)) {
                $this->attributes['hospitals_image'] = $file;
            } else {
                $current_name = $this->currentName($file);

                $this->originalImage($file, $current_name);
                $this->mediumImage($file, $current_name,null,400); 
                $this->thumbImage($file, $current_name,100,null);

                $this->attributes['hospitals_image'] = $current_name;
            }
        } else {
            $this->attributes['hospitals_image'] = null;
        }
    }

        /**
     * Set password encryption.
     * 
     * @param string $value
     */
    public function setPasswordAttribute($value)
    {
        if ($value) {
            $this->attributes['password'] = bcrypt($value);
        }
    }

    /**
     * One to Many relation with images.
     * 
     * @return collection of hospital
     */

    public function images()
    {
        return $this->hasMany('Modules\Admin\Models\HospitalImage', 'hospitals_id', 'hospitals_id');
    }

 
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
     * Many to one relation with city.
     * 
     * @return collection of city
     */
    public function city()
    {
    	return $this->belongsTo('Modules\Admin\Models\City', 'cities_id', 'cities_id');
    }

     /**
     * Many to one relation with area.
     * 
     * @return collection of area
     */
    public function areas()
    {
    	return $this->belongsToMany('Modules\Admin\Models\Area','hospitals_areas', 'hospitals_id','areas_id');
    }
    

    /**
     * Many to one relation with departments.
     * 
     * @return collection of departments
     */
    public function departments()
    {
    	return $this->belongsToMany('Modules\Admin\Models\Department','hospitals_departments', 'hospitals_id', 'departments_id');
    }

    public function hospitals_departments()
    {
    	return $this->hasMany('Modules\Admin\Models\HospitalDepartment','hospitals_id', 'hospitals_id');
    }
    public function hospitals_specialties()
    {
    	return $this->hasMany('Modules\Admin\Models\HospitalSpecialty','hospitals_id', 'hospitals_id');
    }
    public function hospitals_areas()
    {
    	return $this->hasMany('Modules\Admin\Models\HospitalArea','hospitals_id', 'hospitals_id');
    }

    /**
     * Many to one relation with area.
     * 
     * @return collection of area
     */
    public function specialties()
    {
    	return $this->belongsToMany('Modules\Admin\Models\Specialty','hospitals_specialties', 'hospitals_id', 'specialties_id');
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
