<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Http\Traits\Hashidable;

class Usuario extends Model
{
    use HasFactory, SoftDeletes, Hashidable;

    protected $appends = ['hashed_id'];

    protected $primaryKey = "idu";

    protected $fillable = [
        'matricula',
        'foto',
        'nombre',
        'apellido_paterno',
        'apellido_materno',
        'email',
        'password',
        'activo',
        'sexo',
        'idtu',
        'idg',
        'idce'
    ];

    protected $attributes = [
        'activo' => 1
    ];


    public function usuario(){
        return $this->belongsTo( TipoDeUsuario::class, 'idtu' );
    }

    public function grupo(){
        return $this->belongsTo(Grupo::class, 'idg');
    }

    public function ciclo(){
        return $this->belongsTo(CicloEscolar::class, 'idce');
    }

    public function getGetFullnameAttribute()
    {
        return "{$this->nombre} {$this->apellido_paterno} {$this->apellido_materno}";
    }

    public function getGetFullnameListAttribute()
    {
        return "{$this->apellido_paterno} {$this->apellido_materno} {$this->nombre}";
    }

    public function getHashedIdAttribute($value)
    {
        return \Hashids::connection(get_called_class())->encode($this->getKey());
    }

}

