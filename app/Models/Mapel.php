<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mapel extends Model
{
    protected $table = 'mapel';
    protected $fillable = ['kode','name','semester'];

    public function siswa()
    {
        return $this->belongsToMany(Siswa::class)->withPivot(['nilai']);
    }
}
