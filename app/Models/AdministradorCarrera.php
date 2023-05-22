<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class AdministradorCarrera extends Model
{
    use HasFactory;

    protected $primaryKey = "idadminca";

    protected $fillable = [
        'idadmin',
        'idca'
    ];

    protected $table = 'administrador_carrera';

    public $timestamps = false;

    public function carrera(){
        return $this->belongsTo(Carrera::class, 'idca');
    }
    public function administrador(){
        return $this->belongsTo(AdministradorPlataforma::class, 'idadmin');
    }
}
