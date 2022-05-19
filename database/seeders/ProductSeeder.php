<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('products')->insert([
          
            'name'=> 'Dell Inspiron 15 3000',
            'price'=> '95000',
            'category'=>'Laptop',
            'description'=>'Dell Inspiron 15 3000 is a Windows 10 laptop with a 15.60-inch display that has a resolution of 1920x1080 pixels. It is powered by a Core i3 processor and it comes with 8GB of RAM. The Dell Inspiron 15 3000 packs 256GB of HDD storage ',
            'gallery'=> 'https://i.gadgets360cdn.com/products/laptops/large/1546456024_635_dell_inspiron-15-3000.jpg?downsize=*:180',
         ]);
    }
}
