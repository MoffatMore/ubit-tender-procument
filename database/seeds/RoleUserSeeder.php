<?php

    use App\User;
    use Illuminate\Database\Seeder;

    class RoleUserSeeder extends Seeder
    {
        /**
         * Run the database seeds.
         *
         * @return void
         */
        public function run()
        {
            //
            User::findOrFail(1)->assignRole('procurer');
            User::findOrFail(2)->assignRole('bidder');
            User::findOrFail(3)->assignRole('super-admin');
        }
    }
