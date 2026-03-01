<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Permission;
use App\Models\Role;

class EditSampleDeliveryDatetimePermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Create the permission
        $permission = Permission::firstOrCreate([
            'name' => 'edit_sample_delivery_datetime',
            'display_name' => 'Edit Sample Delivery DateTime',
            'description' => 'Allow editing sample delivery date and time fields'
        ]);

        // Assign permission to admin role (or any role you want)
        $adminRole = Role::where('name', 'admin')->first();
        if ($adminRole) {
            $permission->roles()->syncWithoutDetaching([$adminRole->id]);
        }

        $this->command->info('Permission "edit_sample_delivery_datetime" created successfully!');
    }
}
