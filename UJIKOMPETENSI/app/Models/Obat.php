<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Obat extends Model
{
    use HasFactory;
    protected $table = 'obat';
    protected $PrimaryKey = 'id';
    protected $fillable = [
        'nama_obat',
        'jml_obat',
        'hrg_obat',
    ];
}
