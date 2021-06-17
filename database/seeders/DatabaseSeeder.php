<?php

namespace Database\Seeders;

use App\Models\BloodBag;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        //Necessary:
        BloodBag::create([
            'blood_group' => 'A+',
            'qty' => '0',
        ]);
        BloodBag::create([
            'blood_group' => 'A-',
            'qty' => '0',
        ]);
        BloodBag::create([
            'blood_group' => 'AB+',
            'qty' => '0',
        ]);
        BloodBag::create([
            'blood_group' => 'AB-',
            'qty' => '0',
        ]);
        BloodBag::create([
            'blood_group' => 'B+',
            'qty' => '0',
        ]);
        BloodBag::create([
            'blood_group' => 'B-',
            'qty' => '0',
        ]);
        BloodBag::create([
            'blood_group' => 'O+',
            'qty' => '0',
        ]);
        BloodBag::create([
            'blood_group' => 'O-',
            'qty' => '0',
        ]);

    }
}
