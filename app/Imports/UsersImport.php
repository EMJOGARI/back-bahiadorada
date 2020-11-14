<?php

namespace App\Imports;

use App\User;
use Maatwebsite\Excel\Concerns\{ToModel, WithCustomCsvSettings, WithHeadingRow};
use Spatie\Permission\Models\Role;
use Illuminate\Support\Str;

class UsersImport implements ToModel, WithCustomCsvSettings , WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        $rol = Role::all()->where('id',3)->pluck('name', 'id');

        $data = new User([
            'id_user' => $row['id_usuario'],
            'id_propietario' => (int)$row['id_propietario'],
            'name' => $row['nombre'],
            'email' => Str::lower($row['usuario']), //upper($str)
            'password' => bcrypt('12345'),
            ]);
        $data->assignRole($rol);

        return  $data;
    }

    public function getCsvSettings(): array
    {
        return [
            'delimiter' => ";"
        ];
    }
}
