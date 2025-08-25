@extends('front.customer.account.master')

@section('dashboard-content')
<div class="container">
    <h2>My Orders</h2>
    <div class="table-responsive">
        <table class="table table-striped table-bordered tbl-shopping-cart">
            <thead>
                <tr>
                    <th>Order ID</th>
                    <th>Date</th>
                    <th>Status</th>
                    <th>Total</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @if (!$leads->isEmpty())
                    @foreach ($leads as $lead)
                    <tr>
                        <td>#{{$lead->serial}}</td>
                        <td>{{$lead->created_at}}</td>
                        <td>Pending Quote</td>
                        <td></td>
                        <td><a class="btn btn-primary" href="">View</a></td>
                    </tr>
                    @endforeach
                @endif
                @if (!$quotes->isEmpty())
                    @foreach ($quotes as $quote)
                    <tr>
                        <td>#{{$quote->serial}}</td>
                        <td>{{$quote->created_at}}</td>
                        <td>Pending Approve</td>
                        <td>${{$quote->price}}</td>
                        <td><a class="btn btn-primary" href="">View</a></td>
                    </tr>
                    @endforeach
                @endif
                @if (!$orders->isEmpty())
                    @foreach ($orders as $order)
                    <tr>
                        <td>#{{$order->serial}}</td>
                        <td>{{$order->created_at}}</td>
                        <td>{{$order->total}}</td>
                        <td>In Progress</td>
                        <td><a class="btn btn-primary" href="">View</a></td>
                    </tr>
                    @endforeach
                @endif
            </tbody>
        </table>
    </div>

    <a class="btn btn-secondary" href="{{route('customer_account')}}">Back to Dashboard</a>
</div>

@endsection
