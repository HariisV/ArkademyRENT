<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    use HasFactory;
    protected $table ='transaksi';
    protected $fillable = [
        'produk_id','user_id','jumlah','nama_penerima','alamat_penerima','payment','status','total'
    ];
    /**
     * Get the user that owns the Transaksi
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function Produk(){
        return $this->belongsTo('App\Models\Produk'); 
    }
     public function User(){
        return $this->belongsTo('App\Models\User'); 
    }
}
