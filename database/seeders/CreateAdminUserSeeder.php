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
        $user = User::create([
            'name' => 'doctor', 
            'email' => 'admin_doctor@gmail.com',
            'password' => bcrypt('123456'),
            'type'=>1
        ]);
        $user = User::create([
            'name' => 'assistant', 
            'email' => 'assistant@gmail.com',
            'password' => bcrypt('123456'),
            'type'=>2
        ]);
        $role = Role::create(['name' => 'Admin']);
       
        $permissions = Permission::pluck('id','id')->all();
     
        $role->syncPermissions($permissions);
       
        $user->assignRole([$role->id]);
    }
}