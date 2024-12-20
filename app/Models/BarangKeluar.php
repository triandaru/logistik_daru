<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BarangKeluar extends Model
{
    use HasFactory;
    protected $table = 'barang_keluars';
    protected $primaryKey = 'no_barang_keluar';
    public $incrementing = true;
    protected $keyType = 'int';

    protected $fillable = [
        'kode_barang',
        'qty',
        'destination',
        'tgl_keluar',
    ];

    public function barang()
    {
        return $this->belongsTo(Barang::class, 'kode_barang', 'kode_barang');
    }

    protected $dates = ['tgl_keluar'];

    // Mutator untuk mengatur format tanggal
    public function setTanggalAttribute($value)
    {
        $this->attributes['tgl_keluar'] = \Carbon\Carbon::createFromFormat('Y-m-d', $value)->format('Y-m-d');
    }
}
