<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('shop', function (Blueprint $table) {
            Schema::create('shop_categories', function (Blueprint $table) {
                $table->id();
                $table->foreignId('parent_id')->index()->nullable()->constrained('shop_categories');
                $table->string('slug');
                $table->unique(['slug', 'parent_id']);
                $table->string('name');
                $table->timestamps();
                $table->index('created_at');
            });
        
            Schema::create('shop_attributes', function (Blueprint $table) {
                $table->id();
                $table->string('code');
                $table->string('name');
                $table->string('attribute_type');
                $table->string('validation_rules')->nullable();
                $table->timestamps();
            });
        
            Schema::create('shop_attribute_options', function (Blueprint $table) {
                $table->id();
                $table->foreignId('attribute_id')->constrained('shop_attributes');
                $table->string('slug');
                $table->string('name');
                $table->timestamps();
            });
        
            Schema::create('shop_products', function (Blueprint $table) {
                $table->id();
                $table->foreignId('user_id')->constrained('users');
                $table->string('sku');
                $table->string('type');
                $table->foreignId('parent_id')->nullable()->constrained('shop_products');
                $table->unique(['sku', 'parent_id']);
                $table->string('name');
                $table->string('slug');
                $table->decimal('price', 15, 2)->nullable();
                $table->decimal('sale_price', 15, 2)->nullable();
                $table->string('status');
                $table->string('stock_status')->default('IN_STOCK');
                $table->boolean('manage_stock')->default(false);
                $table->datetime('publish_date')->nullable()->index();
                $table->text('excerpt')->nullable();
                $table->text('body')->nullable();
                $table->json('metas')->nullable();
                $table->string('featured_image')->nullable();
                $table->timestamps();
                $table->softDeletes();
            });
        
            Schema::create('shop_categories_products', function (Blueprint $table) {
                $table->foreignId('product_id')->constrained('shop_products');
                $table->foreignId('category_id')->constrained('shop_categories');
                $table->unique(['product_id', 'category_id']);
            });
        
            Schema::create('shop_tags', function (Blueprint $table) {
                $table->id();
                $table->string('slug')->unique();
                $table->string('name');
                $table->timestamps();
                $table->index('created_at');
            });
        
            Schema::create('shop_products_tags', function (Blueprint $table) {
                $table->foreignId('product_id')->constrained('shop_products');
                $table->foreignId('tag_id')->constrained('shop_tags');
                $table->unique(['product_id', 'tag_id']);
            });
        
            Schema::create('shop_product_attributes', function (Blueprint $table) {
                $table->id();
                $table->foreignId('product_id')->constrained('shop_products')->onDelete('cascade');
                $table->foreignId('attribute_id')->constrained('shop_attributes')->onDelete('cascade');
                $table->string('string_value')->nullable();
                $table->text('text_value')->nullable();
                $table->boolean('boolean_value')->nullable();
                $table->integer('integer_value')->nullable();
                $table->decimal('float_value')->nullable();
                $table->datetime('datetime_value')->nullable();
                $table->date('date_value')->nullable();
                $table->text('json_value')->nullable();
                $table->timestamps();
            });
        
            Schema::create('shop_product_inventories', function (Blueprint $table) {
                $table->id();
                $table->foreignId('product_id')->constrained('shop_products')->onDelete('cascade');
                $table->foreignId('product_attribute_id')->nullable()->constrained('shop_product_attributes')->onDelete('cascade');
                $table->integer('qty')->nullable();
                $table->integer('low_stock_threshold')->nullable();
                $table->timestamps();
            });
        
            Schema::create('shop_addresses', function (Blueprint $table) {
                $table->id();
                $table->foreignId('user_id')->constrained('users');
                $table->boolean('is_primary')->default(false);
                $table->string('first_name');
                $table->string('last_name');
                $table->string('address1')->nullable();
                $table->string('address2')->nullable();
                $table->string('phone')->nullable();
                $table->string('email')->nullable();
                $table->string('city')->nullable();
                $table->string('province')->nullable();
                $table->integer('postcode')->nullable();
                $table->timestamps();
            });
        
            Schema::create('shop_carts', function (Blueprint $table) {
                $table->id();
                $table->foreignId('user_id')->nullable()->constrained('users');
                $table->datetime('expired_at')->index();
                $table->decimal('base_total_price', 16, 2)->default(0);
                $table->decimal('tax_amount', 16, 2)->default(0);
                $table->decimal('tax_percent', 16, 2)->default(0);
                $table->decimal('discount_amount', 16, 2)->default(0);
                $table->decimal('discount_percent', 16, 2)->default(0);
                $table->decimal('grand_total', 16, 2)->default(0);
                $table->softDeletes();
                $table->timestamps();
            });
        
            Schema::create('shop_cart_items', function (Blueprint $table) {
                $table->id();
                $table->foreignId('cart_id')->constrained('shop_carts');
                $table->foreignId('product_id')->constrained('shop_products');
                $table->integer('qty');
                $table->timestamps();
            });
        
            Schema::create('shop_orders', function (Blueprint $table) {
                $table->id();
                $table->foreignId('user_id')->constrained('users');
                $table->string('code')->unique();
                $table->string('status');
                $table->foreignId('approved_by')->nullable()->constrained('users');
                $table->datetime('approved_at')->nullable();
                $table->foreignId('cancelled_by')->nullable()->constrained('users');
                $table->datetime('cancelled_at')->nullable();
                $table->text('cancellation_note')->nullable();
                $table->datetime('order_date');
                $table->datetime('payment_due');
                $table->decimal('base_total_price', 16, 2)->default(0);
                $table->decimal('tax_amount', 16, 2)->default(0);
                $table->decimal('tax_percent', 16, 2)->default(0);
                $table->decimal('discount_amount', 16, 2)->default(0);
                $table->decimal('discount_percent', 16, 2)->default(0);
                $table->decimal('shipping_cost', 16, 2)->default(0);
                $table->decimal('grand_total', 16, 2)->default(0);
                $table->text('customer_note')->nullable();
                $table->string('customer_first_name');
                $table->string('customer_last_name');
                $table->string('customer_address1')->nullable();
                $table->string('customer_address2')->nullable();
                $table->string('customer_phone')->nullable();
                $table->string('customer_email')->nullable();
                $table->string('customer_city')->nullable();
                $table->string('customer_province')->nullable();
                $table->integer('customer_postcode')->nullable();
                $table->softDeletes();
                $table->timestamps();
                $table->index('code');
                $table->index(['code', 'order_date']);
            });
        
            Schema::create('shop_order_items', function (Blueprint $table) {
                $table->id();
                $table->foreignId('order_id')->constrained('shop_orders');
                $table->foreignId('product_id')->constrained('shop_products');
                $table->integer('qty');
                $table->decimal('base_price', 16, 2)->default(0);
                $table->decimal('base_total', 16, 2)->default(0);
                $table->decimal('tax_amount', 16, 2)->default(0);
                $table->decimal('tax_percent', 16, 2)->default(0);
                $table->decimal('discount_amount', 16, 2)->default(0);
                $table->decimal('discount_percent', 16, 2)->default(0);
                $table->decimal('sub_total', 16, 2)->default(0);
                $table->string('sku');
                $table->string('type');
                $table->string('name');
                $table->json('attributes');
                $table->timestamps();
                $table->index('sku');
            });
        
            Schema::create('shop_payments', function (Blueprint $table) {
                $table->id();
                $table->foreignId('user_id')->constrained('users');
                $table->foreignId('order_id')->constrained('shop_orders');
                $table->string('payment_type');
                $table->string('status');
                $table->foreignId('approved_by')->nullable()->constrained('users');
                $table->datetime('approved_at')->nullable();
                $table->text('note')->nullable();
                $table->foreignId('rejected_by')->nullable()->constrained('users');
                $table->datetime('rejected_at')->nullable();
                $table->text('rejection_note')->nullable();
                $table->decimal('amount', 16, 2)->default(0);
                $table->json('payloads')->nullable();
                $table->softDeletes();
                $table->timestamps();
                $table->index('payment_type');
            });
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('shop_payments');
        Schema::dropIfExists('shop_order_items');
        Schema::dropIfExists('shop_orders');
        Schema::dropIfExists('shop_cart_items');
        Schema::dropIfExists('shop_carts');
        Schema::dropIfExists('shop_addresses');
        Schema::dropIfExists('shop_categories_products');
        Schema::dropIfExists('shop_products_tags');
        Schema::dropIfExists('shop_product_inventories');
        Schema::dropIfExists('shop_product_attributes');
        Schema::dropIfExists('shop_tags');
        Schema::dropIfExists('shop_products');
        Schema::dropIfExists('shop_attribute_options');
        Schema::dropIfExists('shop_attributes');
        Schema::dropIfExists('shop_categories');
    }
};
