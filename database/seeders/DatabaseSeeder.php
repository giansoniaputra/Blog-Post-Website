<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Post;
use App\Models\User;
use App\Models\Category;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::create([
            'name' => 'Gian Sonia',
            'username' => 'giansonia',
            'email' => 'giansonia555@gmail.com',
            'password' => bcrypt(12345)
        ]);
        User::factory(3)->create();
        Category::create([
            'name' => 'Web Programing',
            'slug' => 'web-programing',
        ]);
        Category::create([
            'name' => 'Mobile Programing',
            'slug' => 'mobile-programing',
        ]);
        Category::create([
            'name' => 'Web Desain',
            'slug' => 'web-desain',
        ]);
        Post::factory(20)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        // Post::create([
        //     'title' => 'Judul Pertama',
        //     'slug' => 'judul-pertama',
        //     'excerpt' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Veritatis soluta hic neque quasi ullam quo, incidunt iusto excepturi necessitatibus.',
        //     'body' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Veritatis soluta hic neque quasi ullam quo, incidunt iusto excepturi necessitatibus. Mollitia, temporibus eos! Praesentium adipisci debitis tempore obcaecati eligendi magni dolorum? Similique rem dignissimos facere at quasi a deleniti eos, quis porro ad nihil, totam temporibus nisi quisquam nobis debitis quidem reprehenderit saepe assumenda. Corporis accusantium ex ipsum maxime praesentium assumenda! Facere, voluptatum esse dignissimos nihil ipsa, corporis sint earum itaque nemo ad ullam repellendus quis tenetur, magnam sunt distinctio ratione aperiam veritatis vero hic labore recusandae! Facere consectetur in qui quam vitae quos deserunt veniam minima architecto! Saepe, obcaecati ex.',
        //     'category_id' => 1,
        //     'user_id' => 1,
        // ]);
        // Post::create([
        //     'title' => 'Judul Kedua',
        //     'slug' => 'judul-kedua',
        //     'excerpt' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Veritatis soluta hic neque quasi ullam quo, incidunt iusto excepturi necessitatibus.',
        //     'body' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Veritatis soluta hic neque quasi ullam quo, incidunt iusto excepturi necessitatibus. Mollitia, temporibus eos! Praesentium adipisci debitis tempore obcaecati eligendi magni dolorum? Similique rem dignissimos facere at quasi a deleniti eos, quis porro ad nihil, totam temporibus nisi quisquam nobis debitis quidem reprehenderit saepe assumenda. Corporis accusantium ex ipsum maxime praesentium assumenda! Facere, voluptatum esse dignissimos nihil ipsa, corporis sint earum itaque nemo ad ullam repellendus quis tenetur, magnam sunt distinctio ratione aperiam veritatis vero hic labore recusandae! Facere consectetur in qui quam vitae quos deserunt veniam minima architecto! Saepe, obcaecati ex.',
        //     'category_id' => 2,
        //     'user_id' => 2,
        // ]);

        // User::create([
        //     'name' => 'Gian Sonia',
        //     'email' => 'giansonia555@gmail.com',
        //     'password' => bcrypt(12345)
        // ]);


    }
}
