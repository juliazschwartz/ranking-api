<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;

class AthleteSeeder extends Seeder
{
    public function run()
    {
        DB::table('athletes')->insert([
            ['id' => 1, 'name' => 'Joao'],
            ['id' => 2, 'name' => 'Jose'],
            ['id' => 3, 'name' => 'Paulo'],
        ]);
    }
}
