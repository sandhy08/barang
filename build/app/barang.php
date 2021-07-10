<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;


class barang extends Model
{
    protected $table = 'barangs';

    public $timestamps = false;

    protected $appends = ['foto_url'];

    protected $fillable = [
        'NamaBarang',
        'HargaBeli',
        'HargaJual',
        'Stok',
        'FotoBarang',
    ];

    public function getFotoUrlAttribute()
    {
        return Storage::url(''.$this->FotoBarang);
    }
}
