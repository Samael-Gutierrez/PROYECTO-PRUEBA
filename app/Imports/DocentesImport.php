<?php

namespace App\Imports;

use App\Models\Usuario;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithBatchInserts;
use Maatwebsite\Excel\Concerns\WithChunkReading;
use Maatwebsite\Excel\Concerns\WithValidation;

class DocentesImport implements ToModel, WithHeadingRow, WithBatchInserts, WithChunkReading, WithValidation
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Usuario([
            'matricula'          => $row['clave_empleado'],
            'foto'               => 'shadow.jpg',
            'nombre'             => $row['nombre'],
            'apellido_paterno'   => $row['apellido_paterno'],
            'apellido_materno'   => $row['apellido_materno'],
            'email'              => $row['email'],
            'activo'             => 1,
            'sexo'               => $row['genero'],
            'idtu' => 2,
            'password'           => bcrypt(substr($row['nombre'], 0, 2).substr($row['apellido_paterno'], 0, 2)."1234")

        ]);
    }

    public function batchSize(): int
    {
        return 1000;
    }

    public function chunkSize(): int
    {
        return 1000;
    }

    public function rules(): array
    {
        return [
             '*.clave_empleado' => ['required', 
                               'max:15',
                               'unique:usuarios,matricula'
                            ],

             '*.nombre' => ['required', 
                               'max:25',
                               'regex:/^[a-z,\s,A-Z,á,Á,é,É,í,Í,ó,Ó,ü,ú,Ú,ñ,Ñ,]+$/'
                            ],

             '*.apellido_paterno' => ['required', 
                               'max:25',
                               'regex:/^[a-z,\s,A-Z,á,Á,é,É,í,Í,ó,Ó,ü,ú,Ú,ñ,Ñ,]+$/'
                           ],

             '*.apellido_materno' => ['required', 
                               'max:25',
                               'regex:/^[a-z,\s,A-Z,á,Á,é,É,í,Í,ó,Ó,ü,ú,Ú,ñ,Ñ,]+$/'
                           ],

             '*.email' => ['required', 
                              'email',
                              'max:60',
                              'unique:usuarios,email'
                          ],

             '*.genero' => ['required', 
                          'regex:/^[F|M]{1}/',
                          'max:1'
                        ]
                            
        ];
        
    }

}
