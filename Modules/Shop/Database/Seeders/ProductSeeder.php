<?php

namespace Modules\Shop\Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Modules\Shop\App\Models\Attribute;
use Modules\Shop\App\Models\Category;
use Modules\Shop\App\Models\Tag;
use Modules\Shop\App\Models\Product;
use Modules\Shop\App\Models\ProductAttribute;
use Modules\Shop\App\Models\ProductInventory;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */

     // Fungsi utk mengisi data produk ke dalam database
    public function run(): void
    {
        // Ambil user pertama dari database
        $user = User::first();

        // Buat atribut default untuk produk
        Attribute::setDefaultAttributes();
        $this->command->info('Default attributes seeded.');
        // Ambil atribut berat dari database
        $attributeWeight = Attribute::where('code', Attribute::ATTR_WEIGHT)->first();

         // Buat 10 kategori produk secara acak
        Category::factory()->count(10)->create();
        $this->command->info('Categories seeded.');
        // Ambil 2 kategori produk secara acak
        $randomCategoryIDs = Category::all()->random()->limit(2)->pluck('id');

        // Buat 10 tag produk secara acak
        Tag::factory()->count(10)->create();
        $this->command->info('Tags seeded.');
        // Ambil 2 tag produk secara acak
        $randomTagIDs = Tag::all()->random()->limit(2)->pluck('id');

        // Looping untuk membuat 10 produk
        for ($i = 1; $i <= 10; $i++) {
            $manageStock = (bool)random_int(0, 1);
            
            // Buat produk dengan user_id dan manage_stock secara acak
            $product = Product::factory()->create([
                'user_id' => $user->id,
                'manage_stock' => $manageStock,
            ]);

            // Tambahkan kategori dan tag ke produk
            $product->categories()->sync($randomCategoryIDs);
            $product->tags()->sync($randomTagIDs);

            // Buat atribut produk dengan berat secara acak
            ProductAttribute::create([
                'product_id' => $product->id,
                'attribute_id' => $attributeWeight->id,
                'integer_value' => random_int(200, 2000), // gram
            ]);

            // Jika produk memiliki stok, maka buat inventori produk
            if ($manageStock) {
                ProductInventory::create([
                    'product_id' => $product->id,
                    'qty' => random_int(3, 20),
                    'low_stock_threshold' => random_int(1,3),
                ]);
            }
        }

        $this->command->info('10 sample products seeded.');
    }
}
