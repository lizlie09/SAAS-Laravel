<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class User extends Authenticatable
{
    use Notifiable, SoftDeletes, HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $guarded = [];

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
    
    /**
    * @return string
    */
    public function getFullNameAttribute() : string 
    {
        return "{$this->name} {$this->last_name}";
    }

    /**
    * @return BelongsTo
    */
    public function team() : BelongsTo{
        return $this->belongsTo(Teams::class);
    }
 
    /**
    * @return string
    */
    public function getRole() : string 
    {
        return __("roles.{$this->roles[0]->name}");
    }

    public function createdAt(){
        return $this->created_at->format(
            config('workkit.date_format')
        );
    }
}
