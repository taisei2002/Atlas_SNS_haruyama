<?php

use Illuminate\Database\Seeder;

class PostsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */

      public function run()
    {
        DB::table('posts')->insert([
        [
            'id' => 1,
            'user_id' => 1,
            'post' => 'よろしく',
        ],

        [
             'id' => 2,
            'user_id' => 2,
            'post' => 'ありがとう',
        ],




    ]);
    }
}

