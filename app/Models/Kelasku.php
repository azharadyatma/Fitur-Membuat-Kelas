<?php

namespace App\Models;

use Illuminate\Support\Arr;
use Illuminate\Database\Eloquent\Model;

class Kelasku extends Model
{
    protected $table = 'kelas';
    protected $fillable =['judul', 'dosen', 'deskripsi','slug'];
}

?>