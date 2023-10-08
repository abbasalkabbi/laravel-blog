<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\post;
use Illuminate\Support\Facades\DB;
class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        DB::table('posts')->insert([
            'slug' => 'how-to-make-1',
            'title' => 'how can make 1',
            'img_path' => 'https://picsum.photos/id/50/960/620',
            'des' =>   "Lorem ipsum dolor, sit amet consectetur adipisicing elit.
                            Natus odio laboriosam nulla dolore non debitis nobis dolorum, e
                            xpedita dignissimos numquam, dolores, dolorem molestiae",
            'user_id'=>'1'

        ]);
    }
}
