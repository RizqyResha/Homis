<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    use HasFactory;

    public $timestamps = false;
    protected $table = 'tbl_svc';
    protected $primarykey = 'id_svc';
    protected $fillable = [
        'id_servicer',
        'id_svc_category',
        'svc_name',
        'thumbnail_image',
        'description',
        'delete_status'
    ];
}