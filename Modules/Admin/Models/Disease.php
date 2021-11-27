<?php

namespace Modules\Admin\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\StorageHandle;

class Disease extends Model
{
    use \Dimsav\Translatable\Translatable, StorageHandle;
    protected $connection = 'mysql';
    // use   StorageHandle;
    protected $table = 'diseases';
    /**
     * Primary key. 
     * 
     * @var string
     */
    protected $primaryKey = 'diseases_id';


    /**
     * Translated attributes.
     * 
     * @var array
     */
    public $translatedAttributes =  [
        'diseases_title'
    ];

    /**
     * 
     * Timestamps.
     * 
     * @var string
     */
    const CREATED_AT = 'diseases_created_at';
    const UPDATED_AT = 'diseases_updated_at';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'diseases_status','specialties_id'
    ];
    
    /**
     * Many to one relation with Specialty.
     * 
     * @return collection of Specialty
     */
    public function specialty()
    {
    	return $this->belongsTo('Modules\Admin\Models\Specialty', 'specialties_id', 'specialties_id');
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
        // return $query->orderBy('diseases_position', $type)->orderBy('diseases.diseases_id', $type);
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
        return $query->where('diseases_status', 'active');
    }

     

}
