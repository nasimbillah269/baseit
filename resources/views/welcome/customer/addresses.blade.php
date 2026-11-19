@extends(welcomeTheme().'customer.layout', ['accountTitle' => 'Addresses'])

@section('account')
@php($types = ['billing' => ['Billing address', $user->address_line1], 'shipping' => ['Shipping address', $user->address_line2]])

@if($edit && isset($types[$edit]))
{{-- Edit one address --}}
<form method="POST" action="{{route('customer.addresses', ['edit' => $edit])}}" class="bi-acc-form">
    @csrf
    <h3 class="bi-acc-sub">{{$types[$edit][0]}}</h3>
    <label for="addr">Address <span>*</span></label>
    <textarea id="addr" name="address" rows="3" maxlength="200" required>{{old('address', $types[$edit][1])}}</textarea>
    @error('address')<small class="text-danger">{{$message}}</small>@enderror

    @if($edit==='billing')
    <div class="bi-acc-row">
        <div>
            <label for="addr-phone">Phone</label>
            <input type="text" id="addr-phone" name="mobile" value="{{old('mobile', $user->mobile)}}" maxlength="20">
            @error('mobile')<small class="text-danger">{{$message}}</small>@enderror
        </div>
        <div>
            <label for="addr-postal">Postcode / ZIP</label>
            <input type="text" id="addr-postal" name="postal_code" value="{{old('postal_code', $user->postal_code)}}" maxlength="20">
            @error('postal_code')<small class="text-danger">{{$message}}</small>@enderror
        </div>
    </div>
    @endif

    <button type="submit" class="bi-acc-btn mt-4">Save address</button>
    <a href="{{route('customer.addresses')}}" class="bi-acc-cancel">Cancel</a>
</form>
@else
<p class="bi-acc-note">The following addresses will be used on the checkout page by default.</p>
<div class="bi-acc-addresses">
    @foreach($types as $key => [$label, $value])
    <div class="bi-acc-address">
        <header>
            <h3>{{$label}}</h3>
            <a href="{{route('customer.addresses', ['edit' => $key])}}">Edit</a>
        </header>
        @if($value)
        <address>
            {{$user->name}}<br>
            {!! nl2br(e($value)) !!}
            @if($key==='billing')
                @if($user->postal_code)<br>{{$user->postal_code}}@endif
                @if($user->mobile)<br>{{$user->mobile}}@endif
                <br>{{$user->email}}
            @endif
        </address>
        @else
        <p>You have not set up this type of address yet.</p>
        @endif
    </div>
    @endforeach
</div>
@endif
@endsection
