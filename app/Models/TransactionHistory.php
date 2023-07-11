<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TransactionHistory extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = 'tbl_transaction_history';
    protected $primarykey = 'id_transaction_history';
    protected $fillable = [
        'id_transaction_history',
        'id_transaction',
        'transaction_amount',
        'transaction_date',
        'transaction_type'
    ];
}