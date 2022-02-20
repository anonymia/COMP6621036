<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\User::create(['name' => 'admin', 'email' => 'admin@binus.edu', 'password' => Hash::make('admin@123'), 'role' => 'admin']);
        \App\Models\User::create(['name' => 'user', 'email' => 'user@binus.edu', 'password' => Hash::make('user@123'), 'role' => 'user']);

        \App\Models\Kategori::create(['nama' => 'CPU']);
        \App\Models\Kategori::create(['nama' => 'RAM']);
        \App\Models\Kategori::create(['nama' => 'SSD']);
        \App\Models\Kategori::create(['nama' => 'GPU']);

        \App\Models\Part::create(['nama' => 'Intel Core i5-12500', 'kategori_id' => 1, 'harga' => 3340000]);
        \App\Models\Part::create(['nama' => 'Intel Core i5-12600', 'kategori_id' => 1, 'harga' => 3740000]);
        \App\Models\Part::create(['nama' => 'Intel Core i7-12700', 'kategori_id' => 1, 'harga' => 5090000]);
        \App\Models\Part::create(['nama' => 'Intel Core i9-12900', 'kategori_id' => 1, 'harga' => 8280000]);
        \App\Models\Part::create(['nama' => 'AMD Ryzen 5 5600X', 'kategori_id' => 1, 'harga' => 4500000]);
        \App\Models\Part::create(['nama' => 'AMD Ryzen 7 5800X', 'kategori_id' => 1, 'harga' => 6100000]);
        \App\Models\Part::create(['nama' => 'AMD Ryzen 9 5900X', 'kategori_id' => 1, 'harga' => 8390000]);
        \App\Models\Part::create(['nama' => 'Corsair CMT16GX4M2C3600C18', 'kategori_id' => 2, 'harga' => 2149000]);
        \App\Models\Part::create(['nama' => 'Corsair CMW32GX4M2E3200C16', 'kategori_id' => 2, 'harga' => 2479000]);
        \App\Models\Part::create(['nama' => 'Gskill Trid Z RGB F4-4000C17D-16GTZRB', 'kategori_id' => 2, 'harga' => 2460000]);
        \App\Models\Part::create(['nama' => 'Gskill Trid Z RGB F4-4000C17D-32GTZRB', 'kategori_id' => 2, 'harga' => 4390000]);
        \App\Models\Part::create(['nama' => 'Gskill TridentZ Neo F4-3600C16D-16GTZN', 'kategori_id' => 2, 'harga' => 2150000]);
        \App\Models\Part::create(['nama' => 'Gskill TridentZ Neo F4-3600C16D-32GTZN', 'kategori_id' => 2, 'harga' => 3710000]);
        \App\Models\Part::create(['nama' => 'Samsung SSD 970 EVO PLUS M.2 1TB', 'kategori_id' => 3, 'harga' => 2280000]);
        \App\Models\Part::create(['nama' => 'Samsung SSD 970 EVO PLUS M.2 2TB', 'kategori_id' => 3, 'harga' => 4650000]);
        \App\Models\Part::create(['nama' => 'Samsung SSD 980 M.2 1TB', 'kategori_id' => 3, 'harga' => 2120000]);
        \App\Models\Part::create(['nama' => 'Samsung SSD 980 PRO M.2 1TB', 'kategori_id' => 3, 'harga' => 3120000]);
        \App\Models\Part::create(['nama' => 'Samsung SSD 980 PRO M.2 2TB', 'kategori_id' => 3, 'harga' => 6650000]);
        \App\Models\Part::create(['nama' => 'MSI Geforce RTX 3060 12GB', 'kategori_id' => 4, 'harga' => 11875000]);
        \App\Models\Part::create(['nama' => 'MSI GeForce RTX 3060 Ti 8GB', 'kategori_id' => 4, 'harga' => 16995000]);
        \App\Models\Part::create(['nama' => 'MSI GeForce RTX 3070 8GB', 'kategori_id' => 4, 'harga' => 19990000]);
        \App\Models\Part::create(['nama' => 'MSI GeForce RTX 3070 Ti 8GB', 'kategori_id' => 4, 'harga' => 20690000]);
        \App\Models\Part::create(['nama' => 'MSI GeForce RTX 3080 10GB', 'kategori_id' => 4, 'harga' => 26995000]);
    }
}
