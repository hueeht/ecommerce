@component('mail::table')
    |   Order ID  | Status | User ID | Total Price |    Check the Order  |
    |:-----------:|:------:|:-------:|:-----------:|:-------------------:|
    @foreach($orders as $order)
        |{{ $order->id }}|{{ $order->status }}|{{ $order->user_id }}|{{ money_format('%.2n', $order->total_price) }}|<a href="{{ route('admin.orders.show', $order->id) }}">Click here</a>|
    @endforeach
@endcomponent
