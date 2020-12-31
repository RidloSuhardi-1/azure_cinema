@extends('home.master.home')

@section('title', 'Movie Details')

@section('content')

<section class="after-head d-flex section-text-white position-relative">
            <div class="d-background" data-image-src="{{ asset('storage/'.$ticket->film->image) }}" data-parallax="scroll"></div>
            <div class="d-background bg-black-80"></div>
            <div class="top-block top-inner container">
                <div class="top-block-content">
                    <h1 class="section-title">{{ $ticket->film->item_name }}</h1>
                    <div class="page-breadcrumbs">
                        <a class="content-link" href="{{ route('home') }}">Home</a>
                        <span class="text-theme mx-2"><i class="fas fa-chevron-right"></i></span>
                        <a class="content-link" href="{{ route('movie.lists') }}">Movies</a>

                        <span class="text-theme mx-2"><i class="fas fa-chevron-right"></i></span>
                        <a class="content-link" href="{{ route('movie.details', Crypt::encrypt($ticket->ticket_id)) }}">{{ $ticket->film->item_name }}</a>

                        <span class="text-theme mx-2"><i class="fas fa-chevron-right"></i></span>
                        <a class="content-link" href="#">Checkout</a>
                    </div>
                </div>
            </div>
        </section>

        <div class="container">
            <div class="sidebar-container">
                <div class="content">
                    <section class="section-long">
                        <div class="section-line">
                            <div class="movie-info-entity">
                                <div class="entity-poster" data-role="hover-wrap">
                                    <div class="embed-responsive embed-responsive-poster">
                                        <img class="embed-responsive-item" src="{{ asset('storage/'.$ticket->film->image) }}" alt="" />
                                    </div>
                                    <div class="d-over bg-theme-lighted collapse animated faster" data-show-class="fadeIn show" data-hide-class="fadeOut show">
                                        <div class="entity-play">
                                            <a class="action-icon-theme action-icon-bordered rounded-circle" href="{{ $ticket->film->trailer }}" data-magnific-popup="iframe">
                                                <span class="icon-content"><i class="fas fa-play"></i></span>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <div class="entity-content">
                                    <h2 class="entity-title">{{ $ticket->film->item_name }}</h2>
                                    <div class="entity-category">
                                        @foreach(explode(',', $ticket->film->genre) AS $film_genre)
                                            <a class="content-link" href="#">{{ $film_genre }}</a>,
                                        @endforeach
                                    </div>
                                    <div class="entity-info">
                                        <div class="info-lines">
                                            <div class="info info-short">
                                                <span class="text-theme info-icon"><i class="fas fa-star"></i></span>
                                                <span class="info-text">8,7</span>
                                                <span class="info-rest">/10</span>
                                            </div>
                                            <div class="info info-short">
                                                <span class="text-theme info-icon"><i class="fas fa-clock"></i></span>
                                                <span class="info-text">{{ $ticket->film->time }}</span>
                                                <span class="info-rest">&nbsp;min</span>
                                            </div>
                                        </div>
                                    </div>
                                    <ul class="entity-list">
                                        <li>
                                            <span class="entity-list-title">Broadcast date:</span>{{ \Carbon\Carbon::parse($ticket->broadcast_date)->format('M d, Y') }}
                                        </li>
                                        <li>
                                            <span class="entity-list-title">Available at:</span>
                                            <a class="content-link" href="#">{{ $ticket->cinema->cinema_name }}</a>
                                        </li>
                                    </ul>

                                    <div class="entity-info">
                                        <hr>
                                        <div class="row">
                                            <div class="col-2">
                                                <span class="entity-list-title">Price</span>
                                            </div>
                                            <div class="col-4">
                                                <span class="entity-list-title">Rp. {{ $total }}</span>
                                            </div>
                                            <div class="col-4">
                                                <span class="entity-list-title">Qty: {{ $qty }}</span>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Checkout process -->
                                    <form action="{{ route('movie.checkout', Crypt::encrypt($ticket->ticket_id)) }}" method="POST">
                                    @csrf

                                    <input type="hidden" name="qty" value="{{ $qty }}">
                                    <input type="hidden" name="total" value="{{ $total }}">

                                    <div class="entity-info">
                                        <hr>
                                        <div class="row">
                                            <div class="col-2"><span class="">Choose Seat</span></div>
                                            <div class="col-4">
                                                <table class="table table-bordered">
                                                    @php $seatKey = $ticket->cinema->seats; @endphp
                                                    @foreach($seatKey AS $key => $item)
                                                        @if ($key % 4 == 0)
                                                            <tr>
                                                        @endif

                                                        <td class="text-center">
                                                            <input type="checkbox" class="check-seats" name="seat-selection[]" value="{{ $item['seat_id'] }}" />
                                                            {{ $item['seat_name'] }}
                                                        </td>

                                                        @if (($key + 1) % 4 == 0)
                                                            </tr>
                                                        @endif
                                                    @endforeach
                                                </table>

                                                @error('seat-selection')
                                                    <span class="@error('seat-selection') text-danger @enderror">{{ $message }}</span>
                                                @enderror

                                                @if (session('seatqty'))
                                                    <div class="alert alert-danger">
                                                        {{ session('seatqty') }}
                                                    </div>
                                                @endif
                                            </div>
                                        </div>
                                        <!-- ./row -->
                                    </div>

                                    <div class="entity-info">
                                        <hr>
                                        <div class="row">
                                            <div class="col-2">
                                                <span class="entity-list-title">Promote Code</span>
                                            </div>
                                            <div class="col-4">
                                                <div class="form-group">
                                                    <input type="text" name="code" class="form-control @error('code') is-invalid @enderror" value="{{ old('code') }}" placeholder="Enter Promote Code..">

                                                    @error('code')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                    @enderror
                                                </div>
                                            </div>

                                            @if (session('codeinvalid'))
                                                <div class="alert alert-danger">
                                                    {{ session('codeinvalid') }}
                                                </div>
                                            @elseif (session('reachminimum'))
                                                <div class="alert alert-danger">
                                                    {{ session('reachminimum') }}
                                                </div>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="entity-info">
                                        <hr>
                                        <button onclick="location.href = '{{ route('movie.details', Crypt::encrypt($ticket->ticket_id)) }}'; return false;" type="button" class="btn btn-outline-default pl-4 pr-4 mr-2"><i class="fas fa-arrow-circle-left mr-2"></i>Back to Movie</button>
                                        <button type="submit" class="btn btn-outline-warning pl-4 pr-4">Checkout<i class="fas fa-shopping-cart ml-2"></i></button>
                                    </div>

                                    </form>
                                    <!-- Checkout process -->

                                </div>
                            </div>
                        </div>

                        {{-- Synopsis --}}
                        <div class="section-line">
                            <div class="section-head">
                                <h2 class="section-title text-uppercase">Synopsis</h2>
                            </div>
                            <div class="section-description">
                                <p class="lead">{{ $ticket->film->desc }}</p>
                            </div>
                            <div class="section-bottom">
                                <div class="row">
                                    <div class="mr-auto col-auto">
                                        <div class="entity-links">
                                            <div class="entity-list-title">Share:</div>
                                            <a class="content-link entity-share-link" href="#"><i class="fab fa-facebook-f"></i></a>
                                            <a class="content-link entity-share-link" href="#"><i class="fab fa-twitter"></i></a>
                                            <a class="content-link entity-share-link" href="#"><i class="fab fa-google-plus-g"></i></a>
                                            <a class="content-link entity-share-link" href="#"><i class="fab fa-pinterest-p"></i></a>
                                            <a class="content-link entity-share-link" href="#"><i class="fab fa-instagram"></i></a>
                                        </div>
                                    </div>
                                    <div class="col-auto">
                                        <div class="entity-links">
                                            <div class="entity-list-title">Tags:</div>
                                            <a class="content-link" href="#">family</a>,&nbsp;
                                            <a class="content-link" href="#">gaming</a>,&nbsp;
                                            <a class="content-link" href="#">historical</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                </div>


            </div>
        </div>

@endsection

@section('script')
<script>
    $(document).ready(function () {
        var limit = {{ $qty }};

        $('.check-seats').on('change', function(evt) {
            if($('.check-seats:checked').length > limit) {
                this.checked = false;
                alert('You can only choose ' + limit + ' seats');
            }
        });
    });
</script>
@endsection
