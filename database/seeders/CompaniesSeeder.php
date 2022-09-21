<?php

namespace Database\Seeders;

use App\Models\Companies;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class CompaniesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('companies')->insert([
            'name' => fake()->text(10),
            'email' => fake()->unique()->safeEmail(),
            'logo' => Str::slug('image'),
            'website' => "https://www.google.com",
            'created_at' => date("Y-m-d H:i:s"),
            'created_at' => date("Y-m-d H:i:s")
        ]);
        // Companies::factory()->times(12)->create();
    }
}
