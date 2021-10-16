<?php

namespace Modules\Admin\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\StorageHandle;

class HospitalImage extends Model
{
    use StorageHandle;

    /**
     * Table name.
     * 
     * @var string
     */
    protected $table = 'hospital_images';

    /**
     * Primary key.
     * 
     * @var string
     */
    protected $primaryKey = 'hospital_images_id';


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
        'hospitals_id', 'hospital_images_name'
    ];

    /**
     * Set articles's image.
     * 
     * @param string $file
     */
    public function setHospitalImagesNameAttribute($file)
    {
        if ($file) {
            if (is_string($file)) {
                $this->attributes['hospital_images_name'] = $file;
            } else {
                $current_name = $this->currentName($file);

                $this->originalImage($file, $current_name);
                $this->mediumImage($file, $current_name,null,400); 
                $this->thumbImage($file, $current_name,100,null);

                $this->attributes['hospital_images_name'] = $current_name;
            }
        } else {
            $this->attributes['hospital_images_name'] = null;
        }
    }


    /**
     * Many to one relation with hospitals.
     * 
     * @return collection of hospital
     */
    public function hospital()
    {
        return $this->belongsTo('Modules\Introductory\Models\Hospital', 'hospitals_id', 'hospitals_id');
    }

}
