<div class="card card-tasks h-auto">
    <div class="card-header">
        <h4 class="title d-inline"> {{ __('Profile Information') }}</h4>
        <p class="mt-1 text-sm text-gray-600">
            {{ __("Update your account's profile information and email address.") }}
        </p>
    </div>
    <form method="post" action="{{ route('profile.update') }}">
        <div class="card-body">
            @csrf
            @method('patch')

            <div class="row">
                <div class="col-6">
                    <div class="{{ $errors->has('name') ? ' has-danger' : '' }}">
                        <label>{{ __('Name') }}</label>
                        <input type="text" id="name" name="name" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" placeholder="{{ __('Name') }}" value="{{ old('name', $user->name) }}" required autofocus autocomplete="name">
                        @include('alerts.feedback', ['field' => 'name'])
                    </div>
                    <div class="{{ $errors->has('email') ? ' has-danger' : '' }}">
                        <label>{{ __('Email') }}</label>
                        <input type="text" id="email" name="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" placeholder="{{ __('Email') }}" value="{{ old('email', $user->email) }}" required autocomplete="username">
                        @include('alerts.feedback', ['field' => 'email'])
                    </div>
                    @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && ! $user->hasVerifiedEmail())
                    <div>
                        <p class="text-sm mt-2 text-gray-800">
                            {{ __('Your email address is unverified.') }}

                            <button form="send-verification" class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                {{ __('Click here to re-send the verification email.') }}
                            </button>
                        </p>

                        @if (session('status') === 'verification-link-sent')
                        <p class="mt-2 font-medium text-sm text-green-600">
                            {{ __('A new verification link has been sent to your email address.') }}
                        </p>
                        @endif
                    </div>
                    @endif
                </div>
            </div>
        </div>
        <div class="card-footer">
            <button type="submit" class="btn btn-fill btn-primary">{{ __('Update') }}</button>
        </div>
    </form>
</div>