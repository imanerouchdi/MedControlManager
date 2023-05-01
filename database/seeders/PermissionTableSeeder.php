<?php
  
namespace Database\Seeders;
  
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
  
class PermissionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $permissions = [
           'role-list',
           'role-create',
           'role-edit',
           'role-delete',

           'patient-list',
           'patient-create',
           'patient-edit',
           'patient-delete',

           'consultation-list',
           'consultation-create',
           'consultation-edit',
           'consultation-delete',
           
           'appointment-list',
           'appointment-create',
           'appointment-edit',
           'appointment-delete',
           
           'document-medecal-list',
           'document-medecal-create',
           'document-medecal-edit',
           'document-medecal-delete',
           
           'dossier-medical-list',
           'dossier-medical-create',
           'dossier-medical-edit',
           'dossier-medical-delete',
           
          
        ];
      
        foreach ($permissions as $permission) {
             Permission::create(['name' => $permission]);
        }
    }
}