<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Servicer extends Authenticatable
{
    use HasFactory;
    protected $table = 'tbl_servicer';
    protected $primaryKey = 'id_servicer';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id_servicer',
        'username',
        'email',
        'password',
        'profile_image',
        'id_identity_type',
        'identity_id',
        'first_name',
        'last_name',
        'gender',
        'address',
        'phone_no',
        'balance',
        'isActive',
        'created_at',
        'updated_at',
        'delete_status',
        'remember_token'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */

    protected $hidden = ['password', 'remember_token',];
}