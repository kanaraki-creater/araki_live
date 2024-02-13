<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use DateTime;
use Carbon\Carbon;

class PostSeeder extends Seeder
{
    public function run()
    {
        DB::table('posts')->insert([
            [
            'title' => 'レバテックカレッジ卒業ライブを開催します！',
            'name' => 'レバテックガールズ',
            'body' => '３か月間お世話になったレバテックカレッジの運営やメンターの方々に感謝の気持ちを伝えるためにライブをします！日時は2024年2月16日17:00、場所は渋谷です。是非来てください！',
            'date' => Carbon::createFromDate(2023, 12, 25),
            'created_at' => new DateTime(),
            'updated_at' => new DateTime(),
            'deleted_at' => Null,
            'user_id' => 1,
            'image_url' => 'https://res.cloudinary.com/dkitzgpf6/image/upload/v1707386229/4d6214dba45f5a929a6cae41d0c4c60e_t_x10tu1.jpg',
            ],
            [
            'title' => '荒木ライブ',
            'name' => '荒木ライバー',
            'body' => '荒木がライブをします。',
            'date' => Carbon::createFromDate(2025, 12, 25),
            'created_at' => new DateTime(),
            'updated_at' => new DateTime(),
            'deleted_at' => Null,
            'user_id' => 1,
            'image_url' => 'https://res.cloudinary.com/dkitzgpf6/image/upload/v1707386405/IMGL5303_TP_V_g4ye7x.jpg',
            ],
            ]);
    }
}
