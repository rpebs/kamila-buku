<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KategoriModel extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    protected $table = 'kategoris';


    public function buku()
    {
        return $this->hasOne(BukuModel::class, 'id');
    }
}
