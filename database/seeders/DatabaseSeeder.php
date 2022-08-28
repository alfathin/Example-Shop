<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        User::create([
            'name' => '1',
            'email' => '1@gmail.com',
            'password' => bcrypt('123'),
            'role' => 'admin'
        ]);

        User::create([
            'name' => '2',
            'email' => '2@gmail.com',
            'password' => bcrypt('123'),
            'role' => 'costumer'
        ]);

        Category::create([
            'name' => 'Makanan'
        ]);

        Category::create([
            'name' => 'Minuman'
        ]);

        Category::create([
            'name' => 'Baju'
        ]);

        Category::create([
            'name' => 'Celana'
        ]);

        Category::create([
            'name' => 'Camera'
        ]);

        Product::create([
            'title' => 'Product 1',
            'body' => 'Minyak masakan adalah minyak atau lemak yang berasal dari pemurnian bagian tumbuhan, hewan, atau dibuat secara sintetik yang dimurnikan dan biasanya digunakan untuk menggoreng makanan. Minyak masakan umumnya berbentuk cair dalam suhu kamar',
            'price' => 20000,
            'image' => '/asset/image/product.jpg',
            'category_id' => 1
        ]);

        Product::create([
            'title' => 'Product 2',
            'body' => 'Minyak masakan adalah minyak atau lemak yang berasal dari pemurnian bagian tumbuhan, hewan, atau dibuat secara sintetik yang dimurnikan dan biasanya digunakan untuk menggoreng makanan. Minyak masakan umumnya berbentuk cair dalam suhu kamar',
            'price' => 20000,
            'image' => '/asset/image/product.jpg',
            'category_id' => 2
        ]);

        Product::create([
            'title' => 'Product 3',
            'body' => 'Minyak masakan adalah minyak atau lemak yang berasal dari pemurnian bagian tumbuhan, hewan, atau dibuat secara sintetik yang dimurnikan dan biasanya digunakan untuk menggoreng makanan. Minyak masakan umumnya berbentuk cair dalam suhu kamar',
            'price' => 20000,
            'image' => '/asset/image/product.jpg',
            'category_id' => 3
        ]);

        Product::create([
            'title' => 'Product 4',
            'body' => 'Minyak masakan adalah minyak atau lemak yang berasal dari pemurnian bagian tumbuhan, hewan, atau dibuat secara sintetik yang dimurnikan dan biasanya digunakan untuk menggoreng makanan. Minyak masakan umumnya berbentuk cair dalam suhu kamar',
            'price' => 20000,
            'image' => '/asset/image/product.jpg',
            'category_id' => 4
        ]);

        Product::create([
            'title' => 'Product 5',
            'body' => 'Minyak masakan adalah minyak atau lemak yang berasal dari pemurnian bagian tumbuhan, hewan, atau dibuat secara sintetik yang dimurnikan dan biasanya digunakan untuk menggoreng makanan. Minyak masakan umumnya berbentuk cair dalam suhu kamar',
            'price' => 20000,
            'image' => '/asset/image/product.jpg',
            'category_id' => 5
        ]);

    }
}
