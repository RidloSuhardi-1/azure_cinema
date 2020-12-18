@extends('home.master.home')

@section('title', 'Sorry for the inconvenience')

@section('content')

<section class="after-head d-flex section-text-white position-relative">
            <div class="d-background" data-image-src="http://via.placeholder.com/1920x1080" data-parallax="scroll"></div>
            <div class="d-background bg-black-80"></div>
            <div class="top-block top-inner container">
                <div class="top-block-content">
                    <h1 class="section-title">Under construction</h1>
                    <div class="page-breadcrumbs">
                        <a class="content-link" href="#">Home</a>
                        <span class="text-theme mx-2"><i class="fas fa-chevron-right"></i></span>
                        <span>Under construction</span>
                    </div>
                </div>
            </div>
        </section>
        <section class="section-long">
            <div class="container">
                <div class="status-entity">
                    <div class="entity-icon"><i class="fas fa-cogs opacity-20"></i></div>
                    <h4 class="entity-title">Under construction</h4>
                    <p class="entity-text">We are working hard to bring it to you</p>
                    <div class="entity-actions">
                        <a class="btn btn-theme" href="#">Back To Homepage</a>
                    </div>
                </div>
            </div>
        </section>

@endsection
