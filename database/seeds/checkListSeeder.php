<?php

use App\Models\CheckList;
use Illuminate\Database\Seeder;

class checkListSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $location = [
            [
                'id' => 1,
                'name' => 'Bersihkan Lantai',
            ],
            [
                'id' => 2,
                'name' => 'Bersihkan Meja',
            ],
            [
                'id' => 3,
                'name' => 'Bersihkan Jendela',
            ],
            [
                'id' => 4,
                'name' => 'Bersihkan Kamar Mandi',
            ],
            [
                'id' => 5,
                'name' => 'Bersihkan Sampah',
            ],
            [
                'id' => 6,
                'name' => 'Bersihkan Tirai',
            ],
        ];
        CheckList::insert($location);
    }
}
