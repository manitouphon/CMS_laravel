<?php

namespace Database\Seeders;

use App\Models\Doctor;
use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Psy\Util\Str;
use Faker\Factory as Faker;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
         //\App\Models\User::factory(10)->create();

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
        $faker = Faker::create();
    	foreach (range(1,100) as $index) {
            $gender = $faker->randomElement(['M', 'F'])[0];
                DB::table('staff')->insert([
                    'first_name' => $faker->name ,
                    'last_name' => $faker->lastName,
                    'dob' => $faker->date($format = 'Y-m-d', $max = 'now'),
                    'create_date' => Carbon::now(),
                    'sex' => $gender,
                    'specialization' => 'Doc Specialization',
                    'qualification' => 'Med School',
                    'blood_group' => 'O+',
                    'phone_number' => $faker->phoneNumber,
                    'address' => 'Cambodia',
                    'remark' => ' ',
                    'role' => 'doctor',
                    'img_url' => null,
                ]);

            }
        //     else if($i % 3 == 1){

        //         DB::table('staff')->insert([
        //             'first_name' => 'Miss',
        //             'last_name' => 'Receptionist' . $i,
        //             'dob' => '2001-01-01',
        //             'create_date' => Carbon::now(),
        //             'sex' => 'M',
        //             'specialization' => 'Recep Specialization',
        //             'qualification' => 'Management School',
        //             'blood_group' => 'O-',
        //             'phone_number' => '01777777'.$i,
        //             'address' => 'Cambodia',
        //             'remark' => ' ',
        //             'role' => 'receptionist',
        //             'img_url' => null,
        //         ]);

        //     }
        //     else{

        //         DB::table('staff')->insert([
        //             'first_name' => 'Miss',
        //             'last_name' => 'Pharmacist' . $i,
        //             'dob' => '2001-01-01',
        //             'create_date' => Carbon::now(),
        //             'sex' => 'M',
        //             'specialization' => 'Pharm Specialization',
        //             'qualification' => 'Pharm School',
        //             'blood_group' => 'O-',
        //             'phone_number' => '012141345'.$i,
        //             'address' => 'Cambodia',
        //             'remark' => ' ',
        //             'role' => 'pharmacist',
        //             'img_url' => null,
        //         ]);

        //     }
        // }//For generate staffs

        //Seed Patients
        $faker = Faker::create();
    	foreach (range(1,100) as $index) {
            $gender = $faker->randomElement(['M', 'F'])[0];
            DB::table('patients')->insert([
                'first_name' => $faker->name,
                'last_name' => $faker->lastName,
                'dob' => $faker->date($format = 'Y-m-d', $max = 'now'),
                'sex' => $gender,
                'blood_group' =>'A',
                'phone_number' => $faker->phoneNumber,
                'address' => 'Cambodia',
                'email' => $faker->email,
                'medical_history' => $faker->word,
            ]);

        }

        //seeding appointment
        $faker = Faker::create();
        foreach (range(1,100) as $index) {
            DB::table('appointment')->insert([
                'room_num'=>$faker->randomDigit,
                'appoint_date'=>$faker->date($format = 'Y-m-d', $max = 'now'),
                'appoint_fee'=>$faker->randomFloat($nbMaxDecimals = NULL, $min = 0, $max = 10000.0),
                'doc_id'=>1,
                'pat_id'=>1,
                'recep_id'=>1,
            ]);

        }

        // //seeding bed Alloment
        $faker = Faker::create();
        foreach (range(1,100) as $index) {
            DB::table('bed_allotment')->insert([
            'bed_type'=>'vip',
            'bed_number'=>$faker->randomDigitNot(5),
            'allotment_date'=>$faker->date($format = 'Y-m-d', $max = 'now'),
            'allotment_time'=>$faker->time($format = 'H:i:s', $max = 'now'),
            'is_discharge'=>('10$'),
            'discharge_date'=>('2021-01-12'),
            'discharge_time'=>('20:49:42'),
            'service_fee'=>(10.4),
            'nurse_id'=>1,
            ]);

         }

        //seeding prescription
        $faker = Faker::create();
        foreach (range(1,100) as $index) {
            DB::table('prescription')->insert([
            'disease'=>('heart ach'),
            'des'=>$faker->text($maxNbChars = 25),
            'pat_id'=>1,
            ]);

         }

         $faker = Faker::create();
         foreach (range(1,100) as $index) {
             DB::table('prescription_item')->insert([
             'medicine_name'=>$faker->word,
             'dosage'=>$faker->sentence($nbWords = 3, $variableNbWords = true),
             'prescription_id'=>2,
             ]);
 
          }


          $faker = Faker::create();
          foreach (range(1,100) as $index) {
              DB::table('surgery_report')->insert([
              'date'=>$faker->date($format = 'Y-m-d', $max = 'now'),
              'status'=>$faker->word,
              'remark'=>$faker->sentence($nbWords = 3, $variableNbWords = true),
              'des'=>$faker->text($maxNbChars = 25),
              'service_fee'=>10.5,
              'doc_id'=>1,
              ]);
  
           }

           $faker = Faker::create();
          foreach (range(1,30) as $index) {
            $medicine = $faker->randomElement(['MAcetaminophen', 'AMINO ACIDS','Cemetidine','Roxatidine','Amoxicillin'])[0];
              DB::table('medicine')->insert([
              'medicine_name'=>$medicine,
              'category'=>$faker->word,
              'company'=>$faker->sentence($nbWords = 3, $variableNbWords = true),
              'qty'=>$faker->numberBetween($min = 1, $max = 900),
              'buy_price'=>10.5,
              'sell_price'=>15.5,
              'status'=>('Use for ....'),
              'description'=>('You can use what you want'),
              'expiration_date'=>$faker->date($format = 'Y-m-d', $max = 'now'),
              ]);
  
           }

           $faker = Faker::create();
           foreach (range(1,50) as $index) {
            $gender = $faker->randomElement(['F', 'M'])[0];
              DB::table('birth_report')->insert([
              'date'=>$faker->date($format = 'Y-m-d', $max = 'now'),
              'status'=>$faker->word,
              'sex'=>$gender,
              'des'=>$faker->sentence($nbWords = 3, $variableNbWords = true),
              'service_fee'=>10.5,
              'doc_id'=>1,
              ]);
           }

           //seeding birth_report

           $faker = Faker::create();
           foreach (range(1,50) as $index) {
            $gender = $faker->randomElement(['F', 'M'])[0];
              DB::table('birth_report')->insert([
              'date'=>$faker->date($format = 'Y-m-d', $max = 'now'),
              'status'=>$faker->word,
              'sex'=>$gender,
              'des'=>$faker->sentence($nbWords = 3, $variableNbWords = true),
              'service_fee'=>10.5,
              'doc_id'=>1,
              ]);
           }

           //seeding medical purchase
           $faker = Faker::create();
           foreach (range(1,50) as $index) {
            
              DB::table('medicine_purchase')->insert([
              'subtotal'=>$faker->randomFloat($nbMaxDecimals = 100, $min = 1, $max = 10000),
              ]);
           }

           //seeding medical sale

           $faker = Faker::create();
           foreach (range(1,50) as $index) {
            
              DB::table('med_sale')->insert([
              'qty'=>$faker->randomFloat($nbMaxDecimals =4 , $min = 1, $max = 10000),
              'total'=>10000.56,
              'medicine_id'=>1,
              ]);
           }

           //seeding service 
           $faker = Faker::create();
           foreach (range(1,50) as $index) {
            
              DB::table('served_services')->insert([
              'total_fee'=>$faker->randomFloat($nbMaxDecimals =4 , $min = 1, $max = 10000),
              'bed_allotment_id'=>5,
              'birth_report_id'=>1,
              'surgery_report_id'=>2,
              'medicine_purchase_id'=>1,
              ]);
           }

           //Seeding Payment
        //    $faker = Faker::create();
        //    foreach (range(1,50) as $index) {
            
        //       DB::table('total_payment')->insert([
        //       'date'=>$faker->date($format = 'Y-m-d', $max = 'now'),
        //       'sub_total'=>$faker->randomFloat($nbMaxDecimals = 100, $min = 1, $max = 10000),
        //       'pay'=>1000.65,
        //       'surgery_report_id'=>1,
        //       'balance'=>10555.4,
        //       ]);
        //    }
           //Seeding Service collection
        //    $faker = Faker::create();
        //    foreach (range(1,50) as $index) {
            
        //       DB::table('served_services_collection')->insert([
        //       'served_service_id'=>$faker->randomDigit,
        //       'doc_id'=>1,
        //       'pat_id'=>2,
        //       ]);
        //    }
    }
}
