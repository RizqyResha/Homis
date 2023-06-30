<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Feedback extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = 'tbl_feedback';
    protected $primarykey = 'id_feedback';
    protected $fillable = [
        'id_svc',
        'description',
        'rate_point',
        'created_at'
    ];
}