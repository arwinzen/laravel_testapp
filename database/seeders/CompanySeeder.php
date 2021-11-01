<?php

namespace Database\Seeders;

use App\Models\Company;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\DB;

class CompanySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // creates a faker object
        $faker = Faker::create();

        // this will not insert into create and update timestamp fields
        foreach(range(1, 100) as $index){
            DB::table('companies')->insert([
               'name' => $faker->name
            ]);
            // this will insert into create and update timestamp fields
            $company = new Company();
            $company->name = $faker->name;
            $company->save();
        }
    }
}
