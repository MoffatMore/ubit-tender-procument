<?php

    use Illuminate\Database\Seeder;
    use Spatie\Permission\Models\Permission;
    use Spatie\Permission\Models\Role;

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
            app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

            // create permissions
            Permission::create(['name' => 'edit_tender']);
            Permission::create(['name' => 'delete_tender']);
            Permission::create(['name' => 'publish_tender']);
            Permission::create(['name' => 'bid_tender']);

            // create roles and assign created permissions

            // this can be done as separate statements
            $bidder = Role::create(['name' => 'bidder'])
                ->givePermissionTo('bid_tender');

            // or may be done by chaining
            $procurer = Role::create(['name' => 'procurer'])
                ->givePermissionTo(['edit_tender', 'publish_tender', 'delete_tender']);

            $super = Role::create(['name' => 'super-admin'])
                ->givePermissionTo(Permission::all());
        }
    }
