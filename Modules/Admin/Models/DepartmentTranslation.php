<?php

namespace Modules\Admin\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\StorageHandle;

class DepartmentTranslation extends Model
{
    use  StorageHandle;

    protected $connection = 'mysql';
    /**
     * Table name.
     * 
     * @var string
     */
    
    protected $table = 'department_translations';

    /**
     * Primary key.
     * 
     * @var string
     */
    protected $primaryKey = 'departments_trans_id';

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
        'departments_title' 
    ];

   
    /**
     * Many to one relation with branches.
     * 
     * @return collection of branch
     */
    public function department()
    {
    	return $this->belongsTo('Modules\Admin\Models\Department', 'departments_id', 'departments_id');
    }
}
