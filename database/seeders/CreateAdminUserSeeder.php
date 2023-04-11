<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\User;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class CreateAdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Admin Seeder
        $user = User::create([
            'name' => 'admin', 
            'email' => 'admin@gmail.com',
            'password' => bcrypt(123456),
        ]);
        $role = Role::create(['name' => 'Admin']);
       
       
       
        $permissions = Permission::pluck('id','id')->all();
     
        $role->syncPermissions($permissions);
       
        $user->assignRole([$role->id]);
    }
}
 
//  <?php
  
// namespace Database\Seeders;
  
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
// use Illuminate\Database\Seeder;
// use App\Models\User;
// use Spatie\Permission\Models\Role;
// use Spatie\Permission\Models\Permission;
  
// class CreateAdminUserSeeder extends Seeder
// {
//     /**
//      * Run the database seeds.
//      *
//      * @return void
//      */
//     public function run()
//     {
//         $user = User::create([
//             'name' => 'doctor', 
//             'email' => 'admin_doctor@gmail.com',
//             'password' => bcrypt('123456'),
//             'role_name'=>'admin',
            
//         ]);
//         $user = User::create([
//             'name' => 'sara', 
//             'email' => 'assistant@gmail.com',
//             'password' => bcrypt('123456'),
//             'role_name'=>'assistant',
            
//         ]);
       
//         $role = Role::create(['name' => 'Admin']);
//         $role = Role::create(['name' => 'assistant']);
       
//         $permissions = Permission::pluck('id','id')->all();
     
//         $role->syncPermissions($permissions);
       
//         $user->assignRole([$role->id]);
//     }
// } 