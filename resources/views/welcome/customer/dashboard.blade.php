@extends(welcomeTheme().'customer.layout', ['accountTitle' => 'My Account'])

@section('account')
<div class="bi-acc-dash">
    <p>
        Hello <b>{{$user->name}}</b> (not <b>{{$user->name}}</b>?
        <a href="javascript:void(0)" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Log out</a>)
    </p>
    <p>
        From your account dashboard you can view your <a href="{{route('customer.myOrders')}}">recent orders</a>,
        manage your <a href="{{route('customer.addresses')}}">shipping and billing addresses</a>,
        and <a href="{{route('customer.profile')}}">edit your password and account details</a>.
    </p>
</div>
@endsection
