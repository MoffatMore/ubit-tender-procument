<?php

    use App\User;
    use Illuminate\Database\Seeder;

    class UsersTableSeeder extends Seeder
    {
        /**
         * Run the database seeds.
         *
         * @return void
         */
        public function run()
        {
            //
            $users = [
                [
                    'id' => 1,
                    'name' => 'Mpho',
                    'organisation_id' => 1,
                    'email' => 'mpho@gmail.com',
                    'password' => '$2y$10$KZ1AioruwI7TtKuMJCiu3.VyxwgnXBEFhKraK8wlkep9xqTEQeXny', //password
                    'remember_token' => Str::random(10),
                    'created_at' => now(),
                ],
                [
                    'id' => 2,
                    'name' => 'Kabo',
                    'organisation_id' => 2,
                    'email' => 'kabo@gmail.com',
                    'password' => '$2y$10$KZ1AioruwI7TtKuMJCiu3.VyxwgnXBEFhKraK8wlkep9xqTEQeXny', //password
                    'remember_token' => Str::random(10),
                    'created_at' => now(),
                ],
                [
                    'id' => 3,
                    'name' => 'Moses',
                    'organisation_id' => 3,
                    'email' => 'mosoes@gmail.com',
                    'password' => '$2y$10$KZ1AioruwI7TtKuMJCiu3.VyxwgnXBEFhKraK8wlkep9xqTEQeXny', //password
                    'remember_token' => Str::random(10),
                    'created_at' => now(),
                ]
            ];

            User::insert($users);
        }
    }
