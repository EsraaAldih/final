<!DOCTYPE html>
<html lang="zxx">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="Fashi Template">
    <meta name="keywords" content="Fashi, unica, creative, html">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>BOOKIE</title>

    <!-- Google Font -->
    <link href='https://fonts.googleapis.com/css?family=Sofia' rel='stylesheet'>
    
    <link href="https://fonts.googleapis.com/css?family=Muli:300,400,500,600,700,800,900&display=swap" rel="stylesheet">

    <link href="https://fonts.googleapis.com/css?family=Muli:300,400,500,600,700,800,900&display=swap" rel="stylesheet">

    <link href="http://netdna.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.css" rel="stylesheet">

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-star-rating/4.0.2/css/star-rating.min.css" />

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-star-rating/4.0.2/js/star-rating.min.js"></script>
<
    <!-- Css Styles -->
    <link rel="stylesheet" href="../fashi/css/bootstrap.min.css" type="text/css">
    <link rel="stylesheet" href="../fashi/css/font-awesome.min.css" type="text/css">
    <link rel="stylesheet" href="../fashi/css/themify-icons.css" type="text/css">
    <link rel="stylesheet" href="../fashi/css/elegant-icons.css" type="text/css">
    <link rel="stylesheet" href="../fashi/css/owl.carousel.min.css" type="text/css">
    <link rel="stylesheet" href="../fashi/css/nice-select.css" type="text/css">
    <link rel="stylesheet" href="../fashi/css/jquery-ui.min.css" type="text/css">
    <link rel="stylesheet" href="../fashi/css/slicknav.min.css" type="text/css">
    <link rel="stylesheet" href="../fashi/css/style.css" type="text/css">
    <link rel="stylesheet" href="{{asset('book-store/css/styles.css')}}">
    <style>
        input {
            border: none;
            /* border-bottom: 1px solid grey */
        }
    </style>
</head>

<body>
    <!-- Page Preloder -->
    <div id="preloder">
        <div class="loader"></div>
    </div>

    <header>
       
        <div class="main-menu">
            <div class="container">
                @include('layouts.navbar')

            </div>
        </div>
    </header>

    <div class="register-login-section p-1 m-1 ">
        <div class="container">
            @if($errors->any())
            <div class="alert alert-danger">
                <ul class="list-unstyled">
                    @foreach($errors->all() as $error)
                    <li>{{$error}}</li>
                    @endforeach
                </ul>
            </div>
            @endif
            @if(session()->get('message'))
            <div class="alert alert-success" role="alert">
                <strong>SUCESS &nbsp;</strong> {{session()->get('message')}}
            </div>
            @endif
            <div class="row">
                <div class="col-lg-6 offset-lg-3">
                    <div class="register-form">
                        @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                        @endif
                        <form class="px-5 py-4" enctype="multipart/form-data" action="{{route('addBook')}}" method="post" style="border: none; box-shadow: 4px 4px 8px 4px rgba(0, 0, 0, 0.2);">
                            @csrf
                            <div class="group-input">
                                <label for="title"><strong>Title:</strong></label>
                                <input  type="text" class="form-control" id="title" name="title">

                            </div>
                            <div class="group-input">
                                <label for="author"><strong>Author:</strong></label>
                                <input  type="text" class="form-control" id="author" name="author">
                            </div>
                            <div class="group-input">
                                <label for="category"><strong>Category:</strong></label>
                                <select  class="browser-default custom-select" name="category" style="padding: 20px 10px" id="category" >
                                    <option disabled selected>Open this select menu</option>
                                       @foreach($categories as $category)
                                    <option value="{{$category->id}}"> {{$category->title}} </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="group-input">
                                <label for="cover"><strong>Cover</strong></label>
                                <div >
                                    <input type="file" name="cover" class="form-control">
                                </div>

                                <input type="hidden" class="form-control" name="_token" value="{{csrf_token()}}">
                            </div>
                            <button type="submit" class="btn register-btn">Share</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <script src="../fashi/js/jquery-3.3.1.min.js"></script>
    <script src="../fashi/js/bootstrap.min.js"></script>
    <script src="../fashi/js/jquery-ui.min.js"></script>
    <script src="../fashi/js/jquery.countdown.min.js"></script>
    <script src="../fashi/js/jquery.nice-select.min.js"></script>
    <script src="../fashi/js/jquery.zoom.min.js"></script>
    <script src="../fashi/js/jquery.dd.min.js"></script>
    <script src="../fashi/js/jquery.slicknav.js"></script>
    <script src="../fashi/js/owl.carousel.min.js"></script>
    <script src="../fashi/js/main.js"></script>
    <script>
        $('#exampleModal').on('show.bs.modal', function(event) {
            var button = $(event.relatedTarget) // Button that triggered the modal
            var recipient = button.data('whatever') // Extract info from data-* attributes
            // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
            // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
            var modal = $(this)
            modal.find('.modal-title').text('New message to ' + recipient)
            modal.find('.modal-body input').val(recipient)
        })
    </script>
</body>

</html>