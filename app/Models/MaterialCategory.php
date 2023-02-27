<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MaterialCategory extends Model
{
    use HasFactory;

    protected $fillable = [
        'Raw_material', 
        'Finish_goods',
        'Spares',
        'Machines',
        'other'
    ];
}
