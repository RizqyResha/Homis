<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WithdrawalMethod extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = 'tbl_withdrawal_method';
    protected $primarykey = 'id_withdrawal_method';
    protected $fillable = [
        'id_withdrawal_method',
        'name',
    ];
}