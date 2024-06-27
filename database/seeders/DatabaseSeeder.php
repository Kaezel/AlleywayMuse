<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Modules\Shop\Database\Seeders\ShopDatabaseSeeder;
use App\Models\User;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Jika ingin membuat 10 pengguna menggunakan factory
        // \App\Models\User::factory(10)->create();

        // Jika ingin membuat satu pengguna dengan data spesifik
        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        // Menanyakan apakah ingin menyegarkan migrasi sebelum seeding
        if ($this->command->confirm('Do you want to refresh migration before seeding, it will clear all old data ?')) {
            // Menjalankan perintah migrate:refresh yang akan menghapus semua data lama
            $this->command->call('migrate:refresh');
            // Menampilkan informasi bahwa data telah dihapus dan database kembali kosong
            $this->command->info('Data cleared, starting from blank database');
        }

        // Membuat satu pengguna menggunakan factory
        User::factory()->create();
        // Menampilkan informasi bahwa pengguna contoh telah ditanam
        $this->command->info('sample user seeded');

        // Menanyakan apakah ingin menanam beberapa produk contoh
        if ($this->command->confirm('Do you want to seed some sample products ?')) {
            // Memanggil seeder lain untuk menanam data produk
            $this->call(ShopDatabaseSeeder::class);
        }
    }
}
