<?php

namespace Database\Seeders;

use App\Models\Camps;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CampTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $camps = [
            [
                'title' => "Gila Belajar",
                'slug' => "gila-belajar",
                'price' => 250,
                'created_at' => date('Y-m-d H:i:s', time()),
                'updated_at' => date('Y-m-d H:i:s', time()),
            ],
            [
                'title' => "Baru Mulai",
                'slug' => "baru-mulai",
                'price' => 100,
                'created_at' => date('Y-m-d H:i:s', time()),
                'updated_at' => date('Y-m-d H:i:s', time()),
            ]
        ];
        Camps::insert($camps);
    }
}
