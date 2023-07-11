<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WithdrawalHistory extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = 'tbl_withdrawal_history';
    protected $primarykey = 'id_withdrawal_history';
    protected $fillable = [
        'id_withdrawal_history',
        'id_withdrawal_method',
        'id_servicer',
        'beneficiary_name',
        'account_number',
        'withdrawal_amount',
        'withdrawal_date',
    ];
}