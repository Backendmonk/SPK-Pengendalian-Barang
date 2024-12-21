<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ModelKriteria extends Model
{
    use HasFactory;


    protected $table = 'tb_kriteria';

    protected $primaryKey = 'id';

    public $timestamps = false;

    public $incrementing = true;
}
