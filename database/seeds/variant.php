<?php

use Illuminate\Database\Seeder;

class variant extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('variant')->delete();
        DB::table('variant')->insert([
            ['id'=>1,'price'=>'10000','product_id'=>'1'],
            ['id'=>2,'price'=>'20000','product_id'=>'1'],

            ['id'=>3,'price'=>'30000','product_id'=>'2'],
            ['id'=>4,'price'=>'40000','product_id'=>'2'],

            ['id'=>5,'price'=>'70000','product_id'=>'4'],
            ['id'=>6,'price'=>'80000','product_id'=>'4'],

            ['id'=>7,'price'=>'70000','product_id'=>'5'],
            ['id'=>8,'price'=>'80000','product_id'=>'5'],
        ]);
    }
}
