<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\AsArrayObject;

class WarisanBudaya extends Model
{
    use HasFactory;
    protected $table = "warisan_budaya";

    protected $fillable = [
        "judul",
        "kondisi",
        "lokasi",
        "deskripsi",
        "pelaku",
        "foto",
        "video",
        "domain",
        "user_id",
        "is_approved"
    ];

    protected $casts = [
        'created_at' => 'datetime:d-m-Y',
        'updated_at' => 'datetime:d-m-Y',
        'judul' => AsArrayObject::class,
        'domain' => AsArrayObject::class,
        'lokasi' => AsArrayObject::class,
        'deskripsi' => AsArrayObject::class,
        'pelaku' => AsArrayObject::class,
        'maestro' => AsArrayObject::class,
        'foto' => AsArrayObject::class,
        'video' => AsArrayObject::class,
        'file' => AsArrayObject::class,

    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function getFotoAttribute($value)
    {
        // $value = (0 === sizeof(json_decode($value)))? array("default.jpg") :json_decode($value);
        
        // return $value;
    }
}
