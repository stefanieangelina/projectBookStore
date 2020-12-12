{{-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>MyBook.com</title>
</head>
<body> --}}

    {{-- @extends('layouts.templateuser') --}}
    @extends('layouts.templateDetailBuku')

        @section('content')
        @php
            $rating = $detailBuku->rating;
            $genre = DB::table('genres')
                        ->where('id', $detailBuku->genre_id)
                        ->first();
        @endphp
        <div class="row" style="width:90%; block;margin: auto; transform: translateX(10%)">
            <div class="card mb-3 border-0" style="max-width: 100%">
                <div class="row no-gutters">
                  <div class="col-md-5">
                    <img id="coverBuku"src="{{ asset('/storage/images/'.$detailBuku->image) }}" class="rounded" style="width:300px; height:350x">
                  </div>
                  <div class="col-md-1">
                    </div>

                  <div class="col-md-5">
                    <div class="card-body">
                        <h5 class="card-title">{{ $detailBuku->name }}</h5>
                        <p class="card-text">{{ $detailBuku->writer }}</p>
                        <p class="card-text">{{ $genre->name }}</p>
                        <div>
                            @for ($i = 0; $i < $rating; $i++)
                                <span class="fa fa-star checked"  style="font-size:14px;"></span>
                            @endfor
                            @for ($i = 0; $i < 5-$rating; $i++)
                                <span class="fa fa-star"  style="font-size:14px;"></span>
                            @endfor
                        </div>
                        <br>
                        <div>
                            <h4 style="float: left ; margin-right : 2px">Harga: Rp. {{ number_format($detailBuku->sell_price) }}</h4>
                        </div>
                        <br>
                        <div>
                            <form method="post" style="margin: 25px 0px 25px 0px">
                                @csrf
                                <button formaction="/book/addToCart/{{ $detailBuku->id }}" class="btn btn-success" style="float: left;margin-right:5px">Add to Cart</button>
                                <button formaction="/book/addToWishlist/{{ $detailBuku->id }}" class="btn btn-primary" style="float: left;margin-right:5px">Add to Wishlist</button>
                            </form>
                        </div>

                        <br/> <br/> <br/> <br/>
                        <hr>
                        <br/>

                        <div>
                            <b>Blurb</b>
                        </div>
                        <!-- blurb-->
                        <div>
                            <p>{{ $detailBuku->blurb }}</p>
                                {{-- An entertaining illumination of the stupid beliefs that make us feel wise.

Whether you’re deciding which smart phone to purchase or which politician to believe, you think you are a rational being whose every decision is based on cool, detached logic, but here’s the truth: You are not so smart. You’re just as deluded as the rest of us--but that’s okay, because being deluded is part of being human.

Growing out of David McRaney’s popular blog, You Are Not So Smart reveals that every decision we make, every thought we contemplate, and every emotion we feel comes with a story we tell ourselves to explain them, but often these stories aren’t true. Each short chapter--covering topics such as Learned Helplessness, Selling Out, and the Illusion of Transparency--is like a psychology course with all the boring parts taken out.

Bringing together popular science and psychology with humor and wit, You Are Not So Smart is a celebration of our irrational, thoroughly human behavior.
                            </p> --}}
                        </div>
                    </div>
                  </div>
                </div>
              </div>

        </div>
        @endsection
    </body>
    </html>
