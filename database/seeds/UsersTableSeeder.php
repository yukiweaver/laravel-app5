<?php

use Illuminate\Database\Seeder;
use App\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $users = [
        [
          'name'      => 'test0001',
          'email'     => 'test0001@example.com',
          'password'  => Hash::make('password'),
        ],
        [
          'name'      => 'test0002',
          'email'     => 'test0002@example.com',
          'password'  => Hash::make('password'),
        ],
      ];
    
      // 登録
      foreach ($users as $user) {
        User::create($user);
      }
    }
}
