<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetailTransaction extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = 'tbl_detail_transaction';
    protected $primarykey = 'id_detail_transaction';
    protected $fillable = [
        'id_detail_transaction',
        'id_transaction',
        'work_time',
        'period_qty',
        'first_name',
        'last_name',
        'phone_number',
        'email',
        'address'
    ];
}