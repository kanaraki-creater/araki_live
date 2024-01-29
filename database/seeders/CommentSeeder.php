<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use DateTime;


class CommentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('comments')->insert([
            'title' => '最高でした！',
            'body' => '歌もダンスも上手でビックリしました。',
            'created_at' => new DateTime(),
            'updated_at' => new DateTime(),
            'deleted_at' => Null,
            'user_id' => 1,
            'post_id' => 1
            ]);
    }
}
