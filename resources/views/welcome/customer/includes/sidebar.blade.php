<ul class="bi-acc-menu">
    @if(Auth::user()->admin)
    <li><a href="{{route('admin.dashboard')}}">Admin Dashboard</a></li>
    @endif
    <li><a href="{{route('customer.dashboard')}}" class="{{Request::is('customer/dashboard') ? 'active' : ''}}">Dashboard</a></li>
    <li><a href="{{route('customer.myOrders')}}" class="{{Request::is('customer/orders*') ? 'active' : ''}}">Orders</a></li>
    <li><a href="{{route('customer.addresses')}}" class="{{Request::is('customer/addresses*') ? 'active' : ''}}">Addresses</a></li>
    <li><a href="{{route('customer.profile')}}" class="{{Request::is('customer/profile*') || Request::is('customer/change-password*') ? 'active' : ''}}">Account Details</a></li>
    <li>
        <a href="javascript:void(0)" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a>
        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">@csrf</form>
    </li>
</ul>
