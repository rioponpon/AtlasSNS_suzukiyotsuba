<?php

namespace Database\Seeders;

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder{
   /**
     * Seed the application's database.
     *
     * @return void
     */
  public function run()
  {
      //
      DB::table('Users')->insert([
        ['username' =>'りお'],
        ['mail' => 'rio@dog.com'],
        ['password' => Hash::make('niko25')],
      ]);
    }
  }
