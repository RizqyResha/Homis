<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = 'tbl_transaction';
    protected $primarykey = 'id_transaction';
    protected $fillable = [
        'id_transaction',
        'id_svc',
        'id_client',
        'price_per_period',
        'transaction_date',
        'transaction_finish_date',
        'confirm_servicer',
        'confirm_client',
        'period_type',
        'status'

    ];
}