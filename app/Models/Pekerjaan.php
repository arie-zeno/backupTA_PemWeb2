<?php

namespace App\Models;

<<<<<<< HEAD
use App\Models\Biodata;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
=======
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
>>>>>>> 84e084bdb39e2781841d2f201b35d1d85fd9b45a

class Pekerjaan extends Model
{
    use HasFactory;

    protected $guarded = ["id"];

    public function biodata(){
        return $this->belongsTo(Biodata::class, "nim", "nim");
    }
}
