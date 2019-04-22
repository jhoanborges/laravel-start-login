<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;


    protected $fillable = ['name', 'apellidos', 'username','email', 'password', 'status', 'id_estado', 'id_ciudad'];

    protected $hidden = [
        'password', 'remember_token',
    ];
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];




    public function roles()
    {
        return $this
        ->belongsToMany('App\Role')
        ->withTimestamps();
    }

    public function hasRole($role)
    {
        //aca tambien podria ser user_id si se trabaja con id
        if ($this->roles()
            ->where('name', $role)
            ->first() ) {
            return true;
        }
        return false;
    }

    public function hasAnyRole($roles)
    {
        if (is_array($roles)) {
            foreach ($roles as $role) {
                if ($this->hasRole($role)) {
                    return true;
                }
            }
        } else {
            if ($this->hasRole($roles)) {
                return true;
            }
        }
        return false;
    }










}
