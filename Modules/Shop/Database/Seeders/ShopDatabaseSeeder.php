<?php

namespace Modules\Shop\Database\Seeders;

use Illuminate\Database\Seeder;

class ShopDatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */

    // Fungsi untuk menjalankan seeding data
    public function run(): void
    {
        // Jalankan ProductSeeder
        $this->call(ProductSeeder::class);
    }
}
