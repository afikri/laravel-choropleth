<?php

use App\Models\User;

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
    User::create([
      'name' => env('FIRST_USER_NAME'),
      'email' => env('FIRST_USER_EMAIL'),
      'password' => env('FIRST_USER_PASSWORD'),
      'email_verified_at' => now()
    ]);
  }
}
