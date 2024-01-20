<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use DateTime;

class PostSeeder extends Seeder
{
    public function run()
    {
        DB::table('posts')->insert([
            'title' => 'レバテックカレッジ卒業ライブを開催します！',
            'body' => '３か月間お世話になったレバテックカレッジの運営やメンターの方々に感謝の気持ちを伝えるためにライブをします！日時は2024年2月16日17:00、場所は渋谷です。是非来てください！',
            'created_at' => new DateTime(),
            'updated_at' => new DateTime(),
            ]);
    }
}
