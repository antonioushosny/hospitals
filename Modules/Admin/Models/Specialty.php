<?php

namespace Modules\Admin\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\StorageHandle;

class Specialty extends Model
{
    use \Dimsav\Translatable\Translatable, StorageHandle;
    protected $connection = 'mysql';
    // use   StorageHandle;

    /**
     * Primary key. 
     * 
     * @var string
     */
    protected $primaryKey = 'specialties_id';


    /**
     * Translated attributes.
     * 
     * @var array
     */
    public $translatedAttributes =  [
        'specialties_title'
    ];

    /**
     * 
     * Timestamps.
     * 
     * @var string
     */
    const CREATED_AT = 'specialties_created_at';
    const UPDATED_AT = 'specialties_updated_at';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'specialties_status'
    ];
 
    /**
     * Scope a query to order data.
     *
     * @param \Illuminate\Database\Eloquent\Builder $query
     * @param string $type    ['asc', 'desc']
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeSorted($query, $type='asc')
    {
        // return $query->orderBy('specialties_position', $type)->orderBy('specialties.specialties_id', $type);
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
        return $query->where('specialties_status', 'active');
    }

     

}
