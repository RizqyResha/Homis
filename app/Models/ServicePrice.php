<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ServicePrice extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = 'tbl_svc_price';
    protected $primarykey = 'id_svc_price';
    protected $fillable = [
        'id_svc',
        'price_per_period',
        'period_type'
    ];
}