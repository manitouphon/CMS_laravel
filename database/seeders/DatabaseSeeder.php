<?php

namespace Database\Seeders;

use App\Models\Doctor;
use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Psy\Util\Str;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();


        //Seed admin
        DB::table('staff')->insert([
            'id' => 1,
            'first_name' => 'root' ,
            'last_name' => 'admin',
            'dob' => '2000-01-01',
            'create_date' => Carbon::now(),
            'sex' => 'X',
            'specialization' => 'Professional Hacker',
            'qualification' => 'Hacking School',
            'blood_group' => 'O+',
            'phone_number' => 'Not provided',
            'address' => 'Cambodia',
            'remark' => ' ',
            'role' => 'admin',
            'img_url' => null,
        ]);
        //Seed admin User:
        DB::table('users')->insert([
            'id' => 1,
            'email' => 'root@admin.com',
            'password' => Hash::make('root'),
            'staff_id' => 1,
            'role' => 'admin'
        ]);



        //Seed staffs.
        for($i = 0; $i <= 9; $i++){
            if($i % 3 == 0){


                DB::table('staff')->insert([
                    'first_name' => 'Mister' ,
                    'last_name' => 'Doctor' . $i,
                    'dob' => '2000-01-01',
                    'create_date' => Carbon::now(),
                    'sex' => 'M',
                    'specialization' => 'Doc Specialization',
                    'qualification' => 'Med School',
                    'blood_group' => 'O+',
                    'phone_number' => '09688088'.$i,
                    'address' => 'Cambodia',
                    'remark' => ' ',
                    'role' => 'doctor',
                    'img_url' => null,
                ]);

            }
            else if($i % 3 == 1){

                DB::table('staff')->insert([
                    'first_name' => 'Miss',
                    'last_name' => 'Receptionist' . $i,
                    'dob' => '2001-01-01',
                    'create_date' => Carbon::now(),
                    'sex' => 'M',
                    'specialization' => 'Recep Specialization',
                    'qualification' => 'Management School',
                    'blood_group' => 'O-',
                    'phone_number' => '01777777'.$i,
                    'address' => 'Cambodia',
                    'remark' => ' ',
                    'role' => 'receptionist',
                    'img_url' => null,
                ]);

            }
            else{

                DB::table('staff')->insert([
                    'first_name' => 'Miss',
                    'last_name' => 'Pharmacist' . $i,
                    'dob' => '2001-01-01',
                    'create_date' => Carbon::now(),
                    'sex' => 'M',
                    'specialization' => 'Pharm Specialization',
                    'qualification' => 'Pharm School',
                    'blood_group' => 'O-',
                    'phone_number' => '012141345'.$i,
                    'address' => 'Cambodia',
                    'remark' => ' ',
                    'role' => 'pharmacist',
                    'img_url' => null,
                ]);

            }
        }//For generate staffs

        //Seed Patients
        for($i = 0; $i <= 9; $i++) {
            DB::table('patients')->insert([
                'first_name' => 'Pat',
                'last_name' => 'Number' . $i,
                'dob' => '2001-01-01',
                'sex' => 'M',
                'blood_group' => 'O-',
                'phone_number' => '001330423'.$i,
                'address' => 'Cambodia',
                'email' => 'patient'.$i.'@gmail.com',
                'medical_history' => 'Bad Lung'
            ]);

        }

    }
}
