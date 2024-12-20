<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BarangMasuk extends Model
{
    use HasFactory;
    protected $table = 'barang_masuks';
    protected $primaryKey = 'no_barang_masuk';
    public $incrementing = true;
    protected $keyType = 'int';

    protected $fillable = [
        'kode_barang',
        'qty',
        'origin',
        'tgl_masuk',
    ];

    public function barang()
    {
        return $this->belongsTo(Barang::class, 'kode_barang', 'kode_barang');
    }

    protected $dates = ['tgl_masuk'];

    // Mutator untuk mengatur format tanggal
    public function setTanggalAttribute($value)
    {
        $this->attributes['tgl_masuk'] = \Carbon\Carbon::createFromFormat('Y-m-d', $value)->format('Y-m-d');
    }
}
