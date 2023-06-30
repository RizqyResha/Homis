<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ServiceCategory extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = 'tbl_svc_category';
    protected $primarykey = 'id_svc_category';
    protected $fillable = [
        'identity_name',
        'svc_thumbnail',
        'svc_name',
        'svc_description'
    ];
}