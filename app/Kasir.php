<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kasir extends Model
{
    //
    protected $fillable = ['nama_baranng','harga_barang','kuantitas','sub_total','created_at','updated_at'];
}
