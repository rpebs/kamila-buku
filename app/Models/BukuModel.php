<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BukuModel extends Model
{
    use HasFactory;
    protected $table = 'bukus';
    protected $guarded = ['id'];

    public function kategoris()
    {
        return $this->belongsTo(KategoriModel::class);
    }

    public function penerbits()
    {
        return $this->belongsTo(PenerbitModel::class);
    }
}
