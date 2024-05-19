<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Matriks extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function alternatif()
    {
        return Alternatif::where('kode', $this->kode)->first();
    }


    public function detail(): HasMany
    {
        return $this->hasMany(MatrikDetail::class, 'matrik_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function kriteria($key)
    {
        return MatrikDetail::where('kriteria_id', $key)
            ->whereIn(
                'matrik_id',
                Matriks::where('kode', $this->kode)->select('id')
            )
            ->avg('nilai');
        // dd($model);
    }

    public static function uniqueMatrix()
    {
        return Matriks::groupBy('kode')->select('kode')
        ->orderBy(\Illuminate\Support\Facades\DB::raw('length(kode)'), 'asc')
        ->orderBy('kode', 'asc')
        ->get();
    }
}
