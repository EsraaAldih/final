
	<div class="row mb-4">
	   <div class="col-md-3 col-10">
         <div class="book-coverphoto">
            <img src="{{ $book->cover }}">
           
         </div>
	   </div>
	   <div class="col-md-6">
	      <div class="book-information">
	         <h4>{{ $book->title }}</h4>
	         <span>by {{ $book->author }}</span>
	       
	         <article class="text-justify">
	            {!! $book->description !!}
	         </article>
	    
	      </div>
	   </div>
	   <div class="col-md-3">
	      <div class="pricebox">
	         	<p>Price: Tk. <span> {{ $book->price }}</span></p>
				
	      </div>
	   </div>
	</div>

