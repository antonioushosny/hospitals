<?php

namespace Modules\Admin\Models;

use Illuminate\Support\Facades\Hash;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Models\StorageHandle;
use App\Notifications\VerfiyMail;
use App\Notifications\ResetPasswordNotification as Notification;

class Client extends Authenticatable implements MustVerifyEmail
{
    use Notifiable, StorageHandle;

    /**
     * Required by spatie/laravel-permission package.
     * 
     * @var string
     */
    protected $connection = 'mysql';
    protected $guard_name = 'client'; 

    /**
     * Primary key.
     * 
     * @var string
     */
    protected $primaryKey = 'clients_id';

    /**
     * Timestamps.
     * 
     * @var string
     */
    const CREATED_AT = 'clients_created_at';
    const UPDATED_AT = 'clients_updated_at';
    // const USERNAME = 'email';


     /**
     * Custom password reset notification.
     * 
     * @return void
     */
    public function sendPasswordResetNotification($token)
    {
        $this->notify(new Notification($token,'client'));
    }

    public function routeNotificationForFcm() {
        //return a device token, either from the model or from some other place. 
        return $this->device_token;
    }
    
    /**
     * Send email verification notice.
     * 
     * @return void
     */
    public function sendEmailVerification($token ,$type='client')
    {
    
        $this->notify(new VerfiyMail($token,$type));
    }


    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'clients_name', 'clients_phone', 'clients_civil_no', 'email', 'email_verified_at', 'password', 'clients_status'
    ];

    
  
    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
   

    public function scopeVerify($query)
    {
        return $query->where('email_verified_at', null);
    }


    /**
     * Set password encryption.
     * 
     * @param string $value
     */
    public function setPasswordAttribute($value)
    {
        if ($value) {
            // $this->attributes['password'] = Hash::make($value);
            $this->attributes['password'] = bcrypt($value);
        }
    }
 
    /**
     * Many to One relation with Orders.
     * 
     * @return collection of city
     */
    public function orders()
    {
        return $this->hasMany('Modules\Admin\Models\Order', 'clients_id', 'clients_id');
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
        return $query->where('clients_status', '1');
    }

}
