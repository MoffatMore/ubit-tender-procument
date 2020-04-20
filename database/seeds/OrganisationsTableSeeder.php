<?php

    use App\Organisation;
    use Illuminate\Database\Seeder;

    class OrganisationsTableSeeder extends Seeder
    {
        /**
         * Run the database seeds.
         *
         * @return void
         */
        public function run()
        {
            //
            $organisations = [
                [
                    'id' => 1,
                    'name' => 'University of Botswana',
                    'contact' => '+267 3500311',
                    'email' => 'equiries@ub.ac.bw',
                    'location' => 'Gaborone, Botswana',
                    'created_at' => now(),

                ],
                [
                    'id' => 2,
                    'name' => 'Botswana Life',
                    'contact' => '+267 3500311',
                    'email' => 'equiries@botswanalife.com',
                    'location' => 'Gaborone, Botswana',
                    'created_at' => now(),

                ],
                [
                    'id' => 3,
                    'name' => 'Deswana Mine',
                    'contact' => '+267 3590311',
                    'email' => 'equiries@deswana.bw',
                    'location' => 'Jwaneng, Botswana',
                    'created_at' => now(),

                ],
            ];
            Organisation::insert($organisations);
        }
    }
