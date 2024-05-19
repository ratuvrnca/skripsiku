<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MatrikDetail extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function matrik()
    {
        return $this->belongsTo(Matriks::class);
    }
}
