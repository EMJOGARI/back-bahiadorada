<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Spatie\Permission\PermissionRegistrar;

class RolesAndPermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Reset cached roles and permissions
        app()[PermissionRegistrar::class]->forgetCachedPermissions();

        // create permissions
        Permission::create(['module' => 'user','name' => 'user.create','description' => 'Crear un Usuario',]);
        Permission::create(['module' => 'user','name' => 'user.read','description' => 'Ver un Usuario',]);
        Permission::create(['module' => 'user','name' => 'user.update','description' => 'Actualizar un Usuario',]);
        Permission::create(['module' => 'user','name' => 'user.delete','description' => 'Eliminar un Usuario',]);
        Permission::create(['module' => 'user','name' => 'user.list','description' => 'Listar Usuarios',]);
        Permission::create(['module' => 'user','name' => 'user.profile.update','description' => 'Editar Perfil',]);
        Permission::create(['module' => 'user','name' => 'user.profile.update.pass','description' => 'Editar Password',]);

        Permission::create(['module' => 'role','name' => 'role.create','description' => 'Crear un Rol']);
        Permission::create(['module' => 'role','name' => 'role.read','description' => 'Ver un Rol']);
        Permission::create(['module' => 'role','name' => 'role.update','description' => 'Actualizar un Rol']);
        Permission::create(['module' => 'role','name' => 'role.delete','description' => 'Eliminar un Rol']);
        Permission::create(['module' => 'role','name' => 'role.list','description' => 'Listar Roles']);

        Permission::create(['module' => 'permission','name' => 'permission.create','description' => 'Crear un Permiso']);
        Permission::create(['module' => 'permission','name' => 'permission.read','description' => 'Ver un Permiso']);
        Permission::create(['module' => 'permission','name' => 'permission.update','description' => 'Actualizar un Permiso']);
        Permission::create(['module' => 'permission','name' => 'permission.delete','description' => 'Eliminar un Permiso']);
        Permission::create(['module' => 'permission','name' => 'permission.list','description' => 'Listar Permisos']);

        Permission::create(['module' => 'vivienda','name' => 'vivienda.create','description' => 'Crear un Vivienda']);
        Permission::create(['module' => 'vivienda','name' => 'vivienda.read','description' => 'Ver un Vivienda']);
        Permission::create(['module' => 'vivienda','name' => 'vivienda.update','description' => 'Actualizar un Vivienda']);
        Permission::create(['module' => 'vivienda','name' => 'vivienda.delete','description' => 'Eliminar un Vivienda']);
        Permission::create(['module' => 'vivienda','name' => 'vivienda.list','description' => 'Listar Vivienda']);

        Permission::create(['module' => 'cuotas','name' => 'cuotas.create','description' => 'Crear un Permiso']);
        Permission::create(['module' => 'cuotas','name' => 'cuotas.read','description' => 'Ver un Permiso']);
        Permission::create(['module' => 'cuotas','name' => 'cuotas.update','description' => 'Actualizar un Permiso']);
        Permission::create(['module' => 'cuotas','name' => 'cuotas.delete','description' => 'Eliminar un Permiso']);
        Permission::create(['module' => 'cuotas','name' => 'cuotas.list','description' => 'Listar Permisos']);

        Permission::create(['module' => 'import','name' => 'import.csv','description' => 'Importar Data']);

        Permission::create(['module' => 'estado-cuenta','name' => 'estado-cuenta','description' => 'Cuenta Contable']);
        Permission::create(['module' => 'cuenta-contable','name' => 'cuenta-contable','description' => 'Cuenta Contable']);



        // create roles and assign existing permissions
        $rol1 = Role::create(
            [
                'name' => 'super-admin',
                'description' => 'Administrador del Sistema'
            ]);
                $rol1->givePermissionTo(Permission::all());
        /*****************************************************/
        $rol2 = Role::create(
            [
                'name' => 'admin',
                'description' => 'Administrador del Panel'
            ]);
                /*USERS*/
                $rol2->givePermissionTo('user.create');
                $rol2->givePermissionTo('user.read');
                $rol2->givePermissionTo('user.update');
                $rol2->givePermissionTo('user.delete');
                $rol2->givePermissionTo('user.list');
                $rol2->givePermissionTo('user.profile.update');
                /*VIVIENDAS*/
                $rol2->givePermissionTo('vivienda.read');
                $rol2->givePermissionTo('vivienda.list');
                /*ROLES*/
                $rol2->givePermissionTo('role.list');
                /*PERMESSION*/
                $rol2->givePermissionTo('permission.list');
                /*CUOTAS*/
                $rol2->givePermissionTo('estado-cuenta');
                /*IMPORTS USER CSV*/
                $rol2->givePermissionTo('import.csv');

        /******************************************************/
        $rol3 = Role::create(
            [
                'name' => 'user',
                'description' => 'Usuario Basico'
            ]);
                $rol3->givePermissionTo('user.read');
                $rol3->givePermissionTo('user.update');
                $rol3->givePermissionTo('user.profile.update');
                $rol3->givePermissionTo('estado-cuenta');
                $rol3->givePermissionTo('cuenta-contable');

        /******************************************************/
        // create users
        $users_1 = Factory(App\User::class)->create([
            'name' => 'super-admin',
            'email' => 'superadmin@bahiadorada.com.ve',
            'password' => bcrypt('1234')
        ]);
        $users_1->assignRole($rol1);

        $users_2 = Factory(App\User::class)->create([
            'name' => 'admin',
            'email' => 'admin@bahiadorada.com.ve',
            'password' => bcrypt('1234')
        ]);
        $users_2->assignRole($rol2);
    }
}
