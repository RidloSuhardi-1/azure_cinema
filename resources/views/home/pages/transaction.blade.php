@extends('home.master.home')

@section('title', 'Transaction History')

@section('content')

<section class="after-head d-flex section-text-white position-relative">
            <div class="d-background" data-image-src="http://via.placeholder.com/1920x1080" data-parallax="scroll"></div>
            <div class="d-background bg-black-80"></div>
            <div class="top-block top-inner container">
                <div class="top-block-content">
                    <h1 class="section-title">Transaction History</h1>
                    <div class="page-breadcrumbs">
                        <a class="content-link" href="index.html">Home</a>
                        <span class="text-theme mx-2"><i class="fas fa-chevron-right"></i></span>
                        <a class="content-link" href="movies-blocks.html">Transaction</a>

                        <span class="text-theme mx-2"><i class="fas fa-chevron-right"></i></span>
                        <a class="content-link" href="movies-blocks.html">Transaction History</a>
                    </div>
                </div>
            </div>
        </section>

        <section class="section-long">
            <div class="container">
                <div class="section-head">
                    <h2 class="section-title text-uppercase">Transaction</h2>
                </div>

                <table class="table table-bordered">
                    <tr>
                        <th scope="col">Transaction ID</th>
                        <th scope="col">Film</th>
                        <th scope="col">Quantity</th>
                        <th scope="col">Total Price</th>
                        <th scope="col">Date</th>
                    </tr>
                    <tr>
                        <td>TX1001</td>
                        <td>Star Wars</td>
                        <td>2</td>
                        <td>15000</td>
                        <td>2020/02/27 01:50:60 PM</td>
                    </tr>
                </table>
            </div>
        </section>
        <!-- section -->

@endsection
