@extends('home.master.home')

@section('title', 'Check Out')

@section('content')

<section class="after-head d-flex section-text-white position-relative">
            <div class="d-background" data-image-src="http://via.placeholder.com/1920x1080" data-parallax="scroll"></div>
            <div class="d-background bg-black-80"></div>
            <div class="top-block top-inner container">
                <div class="top-block-content">
                    <h1 class="section-title">Movies info</h1>
                    <div class="page-breadcrumbs">
                        <a class="content-link" href="index.html">Home</a>
                        <span class="text-theme mx-2"><i class="fas fa-chevron-right"></i></span>
                        <a class="content-link" href="movies-blocks.html">Movies</a>

                        <span class="text-theme mx-2"><i class="fas fa-chevron-right"></i></span>
                        <a class="content-link" href="movies-blocks.html">Lorem ipsum dolor</a>
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
                                        <img class="embed-responsive-item" src="http://via.placeholder.com/340x510" alt="" />
                                    </div>
                                    <div class="d-over bg-theme-lighted collapse animated faster" data-show-class="fadeIn show" data-hide-class="fadeOut show">
                                        <div class="entity-play">
                                            <a class="action-icon-theme action-icon-bordered rounded-circle" href="https://www.youtube.com/watch?v=d96cjJhvlMA" data-magnific-popup="iframe">
                                                <span class="icon-content"><i class="fas fa-play"></i></span>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <div class="entity-content">
                                    <h2 class="entity-title">Lorem ipsum dolor sit.</h2>
                                    <div class="entity-category">
                                        <a class="content-link" href="movies-blocks.html">comedy</a>,
                                        <a class="content-link" href="movies-blocks.html">detective</a>
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
                                                <span class="info-text">130</span>
                                                <span class="info-rest">&nbsp;min</span>
                                            </div>
                                        </div>
                                    </div>
                                    <ul class="entity-list">
                                        <li>
                                            <span class="entity-list-title">Broadcast date:</span>July 21, 2014 (Dolby Theatre), August 1, 2014 (United States)
                                        </li>
                                        <li>
                                            <span class="entity-list-title">Available at:</span>
                                            <a class="content-link" href="#">Octopus Wardens</a>,
                                            <a class="content-link" href="#">Quanta Wardens</a>,
                                        </li>
                                    </ul>

                                    <div class="entity-info">
                                        <hr>
                                        <div class="row">
                                            <div class="col-2">
                                                <span class="entity-list-title">Price</span>
                                            </div>
                                            <div class="col-2">
                                                <span class="entity-list-title">Rp. <span id="item-price">11200</span></span>
                                            </div>
                                            <div class="col-4">
                                                <span class="entity-list-title">Qty: 5</span>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="entity-info">
                                        <hr>
                                        <div class="row">
                                            <div class="col-2"><span class="">Code</span></div>
                                            <div class="col-4">
                                                <input type="text" class="form-control" id="" size="7" placeholder="Promote Code">
                                            </div>
                                        </div>

                                    </div>

                                    <div class="entity-info">
                                        <hr>
                                        <div class="row mt-2">
                                            <div class="col-2"><span class="">Total Price</span></div>

                                            <div class="col-4"><span class="">Rp. 50000</span></div>
                                        </div>
                                    </div>

                                    <div class="entity-info">
                                        <hr>
                                        <a href="" class="btn btn-outline-danger mr-2">Back to Movies</a>
                                        <a href="/thankyou" class="btn btn-outline-primary">Order Ticket Now<i class="fas fa-arrow-right ml-2"></i></a>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <div class="section-line">
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
