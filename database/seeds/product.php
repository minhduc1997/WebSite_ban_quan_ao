<?php

use Illuminate\Database\Seeder;

class product extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('product')->delete();
        DB::table('product')->insert([
            ['id'=>1,'code'=>'SP01','name'=>'Áo nam da thật MX105','slug'=>'ao-nam-da-that-mx105','price'=>500000,'featured'=>1,'state'=>1,'img'=>'no-img.jpg','category_id'=>2],
            ['id'=>2,'code'=>'SP02','name'=>'Áo Thun Có Cổ','slug'=>'ao-thun-co-co','price'=>500000,'featured'=>1,'state'=>0,'img'=>'no-img.jpg','category_id'=>2],
            ['id'=>3,'code'=>'SP03','name'=>'Quần âu nam Prazenta I-QAM61','slug'=>'quan-au-nam-prazenta-i-qam61','price'=>500000,'featured'=>0,'state'=>1,'img'=>'no-img.jpg','category_id'=>3],
            ['id'=>4,'code'=>'SP04','name'=>'Áo nữ cổ V viền tay xinh xắn','slug'=>'ao-nu-co-v-vien-tay-xinh-xan','price'=>500000,'featured'=>1,'state'=>1,'img'=>'no-img.jpg','category_id'=>6],
            ['id'=>5,'code'=>'SP05','name'=>'Quần Nữ Suông Ống Rộng','slug'=>'quan-nu-xuong-ong-rong','price'=>500000,'featured'=>1,'state'=>1,'img'=>'no-img.jpg','category_id'=>7],
        ]);
    }
}
