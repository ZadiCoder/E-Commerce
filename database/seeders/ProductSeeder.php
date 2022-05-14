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
          
            'name'=> 'LCD samsung',
            'price'=> '45000',
            'category'=>'LCD',
            'description'=>'Shop the full line of the best Samsung TV models. Discover 4k, 8k, Neo QLED and UHD smart TVs in a wide range of sizes ',
            'gallery'=> 'https://www.savers.pk/images/thumbnails/1600/1400/detailed/78/DT-UN32N5300AFXZA-heroimage-050118.jpg',
         ]);
    }
}
