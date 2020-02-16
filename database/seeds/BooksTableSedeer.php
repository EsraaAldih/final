<?php

use Illuminate\Database\Seeder;

class BooksTableSedeer extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      
        \App\Book::create([
                'title'=>'A',
                'price'=>rand(20,50),
                'category_id'=>rand(1,20),
                'author'=>'Lorem',
                'description'=>'Lorem ipsum dolor sit amet consectetur adipisicing elit. Recusandae dolor, delectus quam temporibus voluptas deserunt expedita numquam. Deleniti nesciunt suscipit officia itaque, odit, incidunt inventore totam pariatur aspernatur dolor eos?',
                'quantity'=>rand(1,20),
                'user_id'=>rand(1,4),
                'status' => rand(0, 1),
                'cover'=> rand(1, 25).'.jpg'
            ]);
         



       
    }
}
