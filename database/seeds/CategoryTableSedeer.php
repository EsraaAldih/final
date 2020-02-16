<?php

use Illuminate\Database\Seeder;

class CategoryTableSedeer extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Category::create(['title'=>'Fiction']);
        \App\Category::create(['title'=>'Histroy']);
        \App\Category::create(['title'=>'non-Fiction']);
        \App\Category::create(['title'=>'classics']);
        \App\Category::create(['title'=>'Historical-Fiction']);
        \App\Category::create(['title'=>'Childern']);
        \App\Category::create(['title'=>'Biography']);
        \App\Category::create(['title'=>'Horror ']);
        \App\Category::create(['title'=>'Thriller ']);
        \App\Category::create(['title'=>'Romance ']);
        \App\Category::create(['title'=>'Sci-Fiction']);
        \App\Category::create(['title'=>'Computer-Science']);
        \App\Category::create(['title'=>'Science']);
        \App\Category::create(['title'=>'Other']);
       
    }
}

 

  