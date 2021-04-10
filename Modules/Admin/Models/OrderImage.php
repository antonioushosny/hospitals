<?php

namespace Modules\Admin\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\StorageHandle;

class OrderImage extends Model
{
    use  StorageHandle;

    protected $connection = 'mysql';
    /**
     * Table name.
     * 
     * @var string
     */
    
    protected $table = 'order_images';

    /**
     * Primary key.
     * 
     * @var string
     */
    protected $primaryKey = 'order_images_id';

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
        'orders_img', 'orders_id' 
    ];

    /**
     * Set advertisement image
     * 
     * @param string $file
     */
    public function setOrdersImgAttribute($file)
    {
        
        if ($file) {
            if (is_string($file)) {
                $this->attributes['orders_img'] = $file;
            } else {
                $current_name = $this->currentName($file);

                $this->originalImage($file, $current_name);
                $this->mediumImage($file, $current_name,null,400); 
                $this->thumbImage($file, $current_name,100,null);

                $this->attributes['orders_img'] = $current_name;
            }
        } else {
            $this->attributes['orders_img'] = null;
        }
    }
   
    /**
     * Many to one relation with orders.
     * 
     * @return collection of order
     */
    public function order()
    {
    	return $this->belongsTo('Modules\Admin\Models\Order', 'orders_id', 'horders_id');
    }
}
