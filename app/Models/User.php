<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

/**
 * Class User
 *
 * @property $id
 * @property $name
 * @property $email
 * @property $email_verified_at
 * @property $password
 * @property $remember_token
 * @property $created_at
 * @property $updated_at
 *
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */

 class User extends Authenticatable
{
  use HasFactory, Notifiable;

    static $rules = [
      'name' => ['required', 'string', 'max:255'],
      'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
      'password' => ['required', 'string', 'min:8', 'confirmed'],
      'role_id' => ['required', 'exists:roles,id'],
      'active' => ['required']
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */

    protected $fillable = ['name', 'email', 'password', 'active', 'role_id'];

    public function role()
    {
        return $this->belongsTo(Role::class);
    }

    protected $casts = [
      'email_verified_at' => 'datetime',
  ];

    protected $hidden = [
    'password',
    'remember_token',
  ];

}
