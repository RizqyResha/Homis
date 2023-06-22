<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Identity extends Model
{
    protected $table = 'tbl_identity_type';
    protected $primarykey = 'id_identity_type';
    protected $fillable = ['identity_name'];
    use HasFactory;
}
