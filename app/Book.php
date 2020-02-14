<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Laravelista\Comments\Commentable;
use Nicolaslopezj\Searchable\SearchableTrait;
use App\Order;

class Book extends Model
{
    use Notifiable , Commentable;
    use SearchableTrait;

   protected $fillable = [
        'title', 'description', 'price',  'author', 'category_id',  'cover',  'quantity', 'status', 'user_id',
    ];

    protected $searchable =[
        'colomns'=> [
                'books.title' =>10,
                'books.price' => 10,
                'books.author' =>10,

        ]
     ];


     public function copies_available()
     {
         $total = $this->quantity;
         $current_books = Order::where('book_id', $this->id)->count();
         $available_copies = $total - $current_books;
 
         return $available_copies;
     }


    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function borrower()
    {

      return $this->belongsTo('App\Borrower');

    }
    public function wishlist(){
        return $this->hasMany(Wishlist::class);
     }
   



}
