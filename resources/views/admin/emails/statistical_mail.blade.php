@component('mail::table')
        |   Status      | Quantity |
        |:-------------:|:--------:|
    @foreach($statistics as $statistic)
        |{{ $statistic->status }}|{{ $statistic->quantity }}|
    @endforeach
@endcomponent
