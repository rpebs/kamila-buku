<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PenerbitModel extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    protected $table = 'penerbits';


    public function buku()
    {
        return $this->hasOne(BukuModel::class);
    }
}
