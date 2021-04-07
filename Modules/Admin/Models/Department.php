<?php

namespace Modules\Admin\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\StorageHandle;

class Department extends Model
{
    use \Dimsav\Translatable\Translatable, StorageHandle;
    protected $connection = 'mysql';
    // use   StorageHandle;
    protected $table = 'departments';
    /**
     * Primary key. 
     * 
     * @var string
     */
    protected $primaryKey = 'departments_id';


    /**
     * Translated attributes.
     * 
     * @var array
     */
    public $translatedAttributes =  [
        'departments_title'
    ];

    /**
     * 
     * Timestamps.
     * 
     * @var string
     */
    const CREATED_AT = 'departments_created_at';
    const UPDATED_AT = 'departments_updated_at';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'departments_status'
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
        // return $query->orderBy('departments_position', $type)->orderBy('departments.departments_id', $type);
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
        return $query->where('departments_status', 'active');
    }

     

}
