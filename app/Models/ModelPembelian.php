<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ModelPembelian extends Model
{
    use HasFactory;
    protected $table = 'tb_pembelian';

    protected $primaryKey = 'id';

    public $timestamps = false;

    public $incrementing = true;
}
