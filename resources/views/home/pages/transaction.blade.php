@extends('home.master.home')

@section('title', 'Transaction History')

@section('content')

<section class="after-head d-flex section-text-white position-relative">
            <div class="d-background" data-image-src="{{ asset('dist/img/parts/bg-banner-3.jpg') }}" data-parallax="scroll"></div>
            <div class="d-background bg-black-80"></div>
            <div class="top-block top-inner container">
                <div class="top-block-content">
                    <h1 class="section-title">Transaction History</h1>
                    <div class="page-breadcrumbs">
                        <a class="content-link" href="{{ route('home') }}">Home</a>
                        <span class="text-theme mx-2"><i class="fas fa-chevron-right"></i></span>
                        <a class="content-link" href="{{ route('movie.transactions') }}">Transaction</a>

                        <span class="text-theme mx-2"><i class="fas fa-chevron-right"></i></span>
                        <a class="content-link" href="{{ route('movie.transactions') }}">Transaction History</a>
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
                    <thead>
                        <tr>
                            <th class="text-center" scope="col">No</th>
                            <th scope="col">Film</th>
                            <th scope="col">Cinema</th>
                            <th scope="col">Seat</th>
                            <th scope="col">Broadcast date</th>
                            <th scope="col">Transaction Date</th>
                            <th scope="col" class="text-center">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach ($transact as $key => $item)
                        <tr>
                            <td class="text-center">{{ $transact->firstItem() + $key }}</td>
                            <td>{{ $item->ticket->film->item_name }}</td>
                            <td>{{ $item->ticket->cinema->cinema_name }}</td>
                            <td>{{ $item->seat->seat_name }}</td>
                            <td>{{ $item->ticket->broadcast_date }}</td>
                            <td>{{ $item->created_at }}</td>
                            <td class="text-center">
                                <button onclick="location.href = '{{ route('movie.ticket.print', $item->transaction_id) }}';" class="btn btn-outline-warning">Download Ticket</button>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>

                <div class="page">
                    <span class="float-right">
                        {{ $transact->links() }}
                    </span>
                </div>
            </div>
        </section>
        <!-- section -->

@endsection
