@extends('home.master.home')

@section('title', 'Movie Details')

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
                                            <div class="col-4">

                                                <span class="entity-list-title">Rp. <span id="item-price">11200</span></span>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="entity-info">
                                        <hr>
                                        <div class="row">
                                            <div class="col-2"><span class="">Quantity</span></div>
                                            <div class="col-4">
                                                <div class="btn-group">
                                                    <input type="number" name="qty" class="form-control" id="item-qty" placeholder="Quantity" size="20" value="1" min="1" max="99" readonly />

                                                    <button type="button" class="btn btn-danger inline-block" onclick="decreaseValue()" value="Decrease Value">-</button>
                                                    <button type="button" class="btn btn-primary" id="increase" onclick="increaseValue()" value="Increase Value">+</button>
                                                </div>
                                                <!-- <div class="value-button" id="increase" onclick="increaseValue()" value="Increase Value">+</div> -->
                                            </div>
                                        </div>
                                    </div>

                                    <div class="entity-info">
                                        <hr>
                                        <a href="" class="btn btn-outline-danger mr-2">Wishlist</a>
                                        <a href="/checkout" class="btn btn-outline-warning">Order Ticket Now</a>
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

                        <div class="section-line">
                            <div class="section-head">
                                <h2 class="section-title text-uppercase">Comments</h2>
                            </div>
                            <div class="comment-entity">
                                <div class="entity-inner">
                                    <div class="entity-content">
                                        <h4 class="entity-title">Lie Stone</h4>
                                        <p class="entity-subtext">07.08.2018, 14:33</p>
                                        <p class="entity-text">Comment example here. Nulla risus lacus, vehicula id mi vitae, auctor accumsan nulla. Sed a mi quam. In euismod urna ac massa adipiscing interdum.
                                        </p>
                                    </div>
                                    <div class="entity-extra">
                                        <div class="grid-md row">
                                            <div class="col-12 col-sm-auto">
                                                <div class="entity-rating">
                                                    <span class="entity-rating-icon text-theme"><i class="fas fa-star"></i></span>
                                                    <span class="entity-rating-icon text-theme"><i class="fas fa-star"></i></span>
                                                    <span class="entity-rating-icon text-theme"><i class="fas fa-star"></i></span>
                                                    <span class="entity-rating-icon text-theme"><i class="fas fa-star"></i></span>
                                                    <span class="entity-rating-icon text-theme"><i class="fas fa-star"></i></span>
                                                    <span class="entity-rating-icon text-theme"><i class="fas fa-star"></i></span>
                                                    <span class="entity-rating-icon text-theme"><i class="fas fa-star"></i></span>
                                                    <span class="entity-rating-icon"><i class="fas fa-star"></i></span>
                                                    <span class="entity-rating-icon"><i class="fas fa-star"></i></span>
                                                    <span class="entity-rating-icon"><i class="fas fa-star"></i></span>
                                                </div>
                                            </div>
                                            <div class="ml-sm-auto col-auto">
                                                <a class="content-link" href="#"><i class="fas fa-reply"></i>&nbsp;&nbsp;reply</a>
                                            </div>
                                            <div class="col-auto">
                                                <a class="content-link" href="#"><i class="fas fa-quote-left"></i>&nbsp;&nbsp;quote</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="comment-entity">
                                    <div class="entity-inner">
                                        <div class="entity-content">
                                            <h4 class="entity-title">Gabriel Norris</h4>
                                            <p class="entity-subtext">09.08.2018, 11:33</p>
                                            <p class="entity-text">Comment example here. Nulla risus lacus, vehicula id mi vitae, auctor accumsan nulla. Sed a mi quam. In euismod urna ac massa adipiscing interdum.
                                            </p>
                                        </div>
                                        <div class="entity-extra">
                                            <div class="grid-md row">
                                                <div class="ml-sm-auto col-auto">
                                                    <a class="content-link" href="#"><i class="fas fa-reply"></i>&nbsp;&nbsp;reply</a>
                                                </div>
                                                <div class="col-auto">
                                                    <a class="content-link" href="#"><i class="fas fa-quote-left"></i>&nbsp;&nbsp;quote</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="section-line">
                            <div class="section-head">
                                <h2 class="section-title text-uppercase">Add comment</h2>
                            </div>
                            <form autocomplete="off">
                                <div class="row form-grid">
                                    <div class="col-12 col-sm-6">
                                        <div class="input-view-flat input-group">
                                            <input class="form-control" name="name" type="text" placeholder="Name" />
                                        </div>
                                    </div>
                                    <div class="col-12 col-sm-6">
                                        <div class="input-view-flat input-group">
                                            <input class="form-control" name="email" type="email" placeholder="Email" />
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="input-view-flat input-group">
                                            <textarea class="form-control" name="review" placeholder="Add your review"></textarea>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="rating-line">
                                            <label>Rating:</label>
                                            <div class="form-rating" name="rating">
                                                <input type="radio" id="rating-10" name="rating" value="10" />
                                                <label for="rating-10">
                                                    <span class="rating-active-icon"><i class="fas fa-star"></i></span>
                                                    <span class="rating-icon"><i class="far fa-star"></i></span>
                                                </label>
                                                <input type="radio" id="rating-9" name="rating" value="9" />
                                                <label for="rating-9">
                                                    <span class="rating-active-icon"><i class="fas fa-star"></i></span>
                                                    <span class="rating-icon"><i class="far fa-star"></i></span>
                                                </label>
                                                <input type="radio" id="rating-8" name="rating" value="8" />
                                                <label for="rating-8">
                                                    <span class="rating-active-icon"><i class="fas fa-star"></i></span>
                                                    <span class="rating-icon"><i class="far fa-star"></i></span>
                                                </label>
                                                <input type="radio" id="rating-7" name="rating" value="7" />
                                                <label for="rating-7">
                                                    <span class="rating-active-icon"><i class="fas fa-star"></i></span>
                                                    <span class="rating-icon"><i class="far fa-star"></i></span>
                                                </label>
                                                <input type="radio" id="rating-6" name="rating" value="6" />
                                                <label for="rating-6">
                                                    <span class="rating-active-icon"><i class="fas fa-star"></i></span>
                                                    <span class="rating-icon"><i class="far fa-star"></i></span>
                                                </label>
                                                <input type="radio" id="rating-5" name="rating" value="5" />
                                                <label for="rating-5">
                                                    <span class="rating-active-icon"><i class="fas fa-star"></i></span>
                                                    <span class="rating-icon"><i class="far fa-star"></i></span>
                                                </label>
                                                <input type="radio" id="rating-4" name="rating" value="4" />
                                                <label for="rating-4">
                                                    <span class="rating-active-icon"><i class="fas fa-star"></i></span>
                                                    <span class="rating-icon"><i class="far fa-star"></i></span>
                                                </label>
                                                <input type="radio" id="rating-3" name="rating" value="3" />
                                                <label for="rating-3">
                                                    <span class="rating-active-icon"><i class="fas fa-star"></i></span>
                                                    <span class="rating-icon"><i class="far fa-star"></i></span>
                                                </label>
                                                <input type="radio" id="rating-2" name="rating" value="2" />
                                                <label for="rating-2">
                                                    <span class="rating-active-icon"><i class="fas fa-star"></i></span>
                                                    <span class="rating-icon"><i class="far fa-star"></i></span>
                                                </label>
                                                <input type="radio" id="rating-1" name="rating" value="1" />
                                                <label for="rating-1">
                                                    <span class="rating-active-icon"><i class="fas fa-star"></i></span>
                                                    <span class="rating-icon"><i class="far fa-star"></i></span>
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <button class="px-5 btn btn-theme" type="submit">Send</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </section>
                </div>


            </div>
        </div>

@endsection
