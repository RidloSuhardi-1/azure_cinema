@extends('home.master.home')

@section('title', 'List of Movies')

@section('content')

<section class="after-head d-flex section-text-white position-relative">
            <div class="d-background" data-image-src="http://via.placeholder.com/1920x1080" data-parallax="scroll"></div>
            <div class="d-background bg-black-80"></div>
            <div class="top-block top-inner container">
                <div class="top-block-content">
                    <h1 class="section-title">Movies list</h1>
                    <div class="page-breadcrumbs">
                        <a class="content-link" href="{{ route('home') }}">Home</a>
                        <span class="text-theme mx-2"><i class="fas fa-chevron-right"></i></span>
                        <span>Movies</span>
                    </div>
                </div>
            </div>
        </section>
        <section class="section-long">
            <div class="container">
                <div class="section-pannel">
                    <div class="grid row">
                        <div class="col-md-10">
                            <form autocomplete="off">
                                <div class="row form-grid">
                                    <div class="col-sm-6 col-lg-3">
                                        <div class="input-view-flat input-group">
                                            <select class="form-control" name="genre">
                                                <option selected="true">genre</option>
                                                <option>action</option>
                                                <option>adventure</option>
                                                <option>comedy</option>
                                                <option>crime</option>
                                                <option>detective</option>
                                                <option>drama</option>
                                                <option>fantasy</option>
                                                <option>melodrama</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-sm-6 col-lg-3">
                                        <div class="input-view-flat input-group">
                                            <select class="form-control" name="sortBy">
                                                <option selected="true">sort by</option>
                                                <option>name</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="col-md-2 my-md-auto d-flex">
                            <span class="info-title d-md-none mr-3">Select view:</span>
                            <ul class="ml-md-auto h5 list-inline">
                                <li class="list-inline-item">
                                    <a class="content-link transparent-link active" href="#"><i class="fas fa-th-list"></i></a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>

                @foreach ($films as $item)

                <article class="movie-line-entity">
                    <div class="entity-poster" data-role="hover-wrap">
                        <div class="embed-responsive embed-responsive-poster">
                            <img class="embed-responsive-item" src="{{ asset('storage/'.$item->image) }}" alt="" />
                        </div>
                        <div class="d-over bg-theme-lighted collapse animated faster" data-show-class="fadeIn show" data-hide-class="fadeOut show">
                            <div class="entity-play">
                                <a class="action-icon-theme action-icon-bordered rounded-circle" href="{{ $item->trailer }}" data-magnific-popup="iframe">
                                    <span class="icon-content"><i class="fas fa-play"></i></span>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="entity-content">
                        <h4 class="entity-title">
                            <a class="content-link" href="movie-info-sidebar-right.html">{{ $item->item_name }}</a>
                        </h4>
                        <div class="entity-category">
                            @foreach(explode(',', $item->genre) AS $film_genre)
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
                                    <span class="info-text">{{ $item->time }}</span>
                                    <span class="info-rest">&nbsp;min</span>
                                </div>
                            </div>
                        </div>
                        <p class="text-short entity-text">{{ $item->desc }}</p>
                    </div>
                    <div class="entity-extra">
                        @if ($item->label == 'standart')
                            <div class="text-uppercase entity-extra-title">Details</div>
                            <div class="entity-showtime">
                                <a href="#" class="btn btn-outline-primary"><i class="fas fa-ticket-alt mr-2"></i>Standart</a>
                            </div>
                        @elseif ($item->label == 'premium')
                            <div class="text-uppercase entity-extra-title">Details</div>
                            <div class="entity-showtime">
                                <a href="#" class="btn btn-outline-warning"><i class="fas fa-ticket-alt mr-2"></i>Premium</a>
                            </div>
                        @else
                            <div class="text-uppercase entity-extra-title">Coming Soon</div>
                        @endif
                    </div>
                </article>

                @endforeach

                <div class="section-bottom">
                    <div class="paginator">
                        {{ $films->links() }}
                    </div>
                </div>
            </div>
        </section>

@endsection
