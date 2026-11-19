@extends(welcomeTheme().'customer.layout', ['accountTitle' => 'My Orders'])

@section('account')
@if($orders->count()==0)
<div class="bi-acc-empty">
    No order has been made yet.
    <a href="{{route('index')}}" class="bi-acc-btn">Go Shop</a>
</div>
@else
<div class="bi-acc-table-wrap">
    <table class="bi-acc-table">
        <thead>
            <tr>
                <th>Order</th>
                <th>Date</th>
                <th>Status</th>
                <th>Total</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($orders as $order)
            @php($qty = (int) $order->items->sum('quantity') ?: $order->items->count())
            <tr>
                <td>#{{$order->invoice}}</td>
                <td>{{$order->created_at->format('F j, Y')}}</td>
                <td>{{ucfirst($order->order_status)}}</td>
                <td>{{priceFullFormat($order->grand_total)}} for {{$qty}} {{$qty==1 ? 'item' : 'items'}}</td>
                <td><a href="{{route('customer.orderDetails',$order->invoice)}}" class="bi-acc-btn">View</a></td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
<div class="mt-3">{{ $orders->links('pagination') }}</div>
@endif
@endsection
