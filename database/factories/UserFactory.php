<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class UserFactory extends Factory
{
    /**
     * The current password being used by the factory.
     */
    protected static ?string $password;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        // Mengembalikan array atribut default untuk model User
        return [
            // Nama pengguna acak
            'name' => fake()->name(),
            // Email unik dan aman untuk pengguna
            'email' => fake()->unique()->safeEmail(),
            // Tanggal dan waktu ketika email diverifikasi, diset saat ini
            'email_verified_at' => now(),
            // Password pengguna, jika belum diset sebelumnya, hash dari 'password'
            'password' => static::$password ??= Hash::make('password'),
            // Token acak untuk "remember me"
            'remember_token' => Str::random(10),
        ];
    }

    /**
     * Indicate that the model's email address should be unverified.
     */
    public function unverified(): static
    {
        // Mengubah state dari model sehingga 'email_verified_at' menjadi null
        return $this->state(fn (array $attributes) => [
            'email_verified_at' => null,
        ]);
    }
}
