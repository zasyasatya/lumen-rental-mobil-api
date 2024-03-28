<?php 

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Mobil extends Model {

    public $fillable = [
        'nama', 'harga', 'deskripsi'
    ];
}