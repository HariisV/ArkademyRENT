<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produk extends Model
{
    use HasFactory;
    protected $table = 'produk';
    protected $fillable = [
        'nama_produk', 'keterangan', 'harga', 'jumlah', 'image'
    ];
    public $timestamps = false;

    /**
     * Get the user that owns the Produk
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    /**
     * Get all of the comments for the Produk
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    
}
