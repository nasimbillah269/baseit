@extends(welcomeTheme().'customer.layout', ['accountTitle' => 'Account Details'])

@section('account')
<form method="POST" action="{{route('customer.profile')}}" class="bi-acc-form">
    @csrf
    <div class="bi-acc-row">
        <div>
            <label for="acc-first">First name <span>*</span></label>
            <input type="text" id="acc-first" name="first_name" value="{{old('first_name', $user->first_name)}}" maxlength="100" required>
            @error('first_name')<small class="text-danger">{{$message}}</small>@enderror
        </div>
        <div>
            <label for="acc-last">Last name <span>*</span></label>
            <input type="text" id="acc-last" name="last_name" value="{{old('last_name', $user->last_name)}}" maxlength="100" required>
            @error('last_name')<small class="text-danger">{{$message}}</small>@enderror
        </div>
    </div>

    <label for="acc-display">Display name <span>*</span></label>
    <input type="text" id="acc-display" name="name" value="{{old('name', $user->name)}}" maxlength="100" required>
    <em class="bi-acc-hint">This will be how your name will be displayed in the account section and in reviews</em>
    @error('name')<small class="text-danger">{{$message}}</small>@enderror

    <label for="acc-email">Email address <span>*</span></label>
    <input type="email" id="acc-email" name="email" value="{{old('email', $user->email)}}" maxlength="100" required>
    @error('email')<small class="text-danger">{{$message}}</small>@enderror

    <h3 class="bi-acc-sub">Password change</h3>

    <label for="acc-cur">Current password (leave blank to leave unchanged)</label>
    <input type="password" id="acc-cur" name="current_password" autocomplete="current-password">
    @error('current_password')<small class="text-danger">{{$message}}</small>@enderror

    <label for="acc-new">New password (leave blank to leave unchanged)</label>
    <input type="password" id="acc-new" name="password" autocomplete="new-password">
    @error('password')<small class="text-danger">{{$message}}</small>@enderror

    <label for="acc-confirm">Confirm new password</label>
    <input type="password" id="acc-confirm" name="password_confirmation" autocomplete="new-password">

    <button type="submit" class="bi-acc-btn mt-4">Save changes</button>
</form>
@endsection
