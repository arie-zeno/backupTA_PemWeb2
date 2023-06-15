<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Biodata extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'user_id',
        'foto',
            'nim',
            'thnLulus',
            'thnMasuk',
            'jk',
            'tempatLahir',
            'tglLahir',
            'agama',
            'pekerjaan',
            'kawin',
    ];

    protected $primaryKey = 'nim';
    protected $keyType = 'string';

    public function user(){
        return $this->hasOne(User::class);
    }

    public function works(){
        return $this->hasMany(Pekerjaan::class, "nim", "nim");
    }
}
