<?php

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
        $user = App\User::create([
            'name' => 'Ashraf Kabir',
            'email' => 'ashrafkabir95@gmail.com',
            'password' => bcrypt('12345678'),
            'admin' => 1
        ]);

        App\Profile::create([
            'user_id' => $user->id,
            'avatar' => 'uploads/avatars/1.jpg',
            'about' => 'Occaecati odio magnam a doloribus quam sed. Ut quidem consectetur ratione ex atque. Qui aliquid qui odit ab et. Quia laudantium eveniet quia eligendi magnam nam nihil eius.',
            'facebook' => 'facebook.com',
            'youtube' => 'youtube.com'
        ]);
    }
}
