<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Http\Traits\Hashidable; 

class TipoDeUsuario extends Model
{
    use HasFactory, SoftDeletes, Hashidable; 

    protected $appends = ['hashed_id'];

    protected $primaryKey = "idtu";
    protected $fillable = [
        'nombre',
        'activo'
    ];

    protected $atributes = [
        'activo' => 1
    ];


    protected $table = 'tipo_de_usuarios';

    // public function setNombreAttribute($value)
    // {
    //     $this->attributes['nombre'] = strtoupper($value);
    // }

    public function getActivoAttribute($value)
    {
        return $this->attributes['activo'] = (int)$value;
    }

    public function getHashedIdAttribute($value)
    {
        return \Hashids::connection(get_called_class())->encode($this->getKey());
    }
}

