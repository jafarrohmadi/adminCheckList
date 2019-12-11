<?php

use App\Models\Location;
use Illuminate\Database\Seeder;

class LocationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run ()
    {
        $location = [
            [
                'id' => 1,
                'name' => 'Ayooservice Lt.1',
            ],
            [
                'id' => 2,
                'name' => 'Ayooservice Lt.2',
            ],
            [
                'id' => 3,
                'name' => 'Ayooservice Lt.3',
            ],
            [
                'id' => 4,
                'name' => 'Ayooservice Lt.4',
            ],
        ];
        Location::insert($location);
    }

}
