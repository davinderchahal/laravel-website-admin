<div class="card card-tasks h-auto">
    <div class="card-header">
        <h4 class="title d-inline"> {{ __('Update Password') }}</h4>
        <p class="mt-1 text-sm text-gray-600">
            {{ __("Ensure your account is using a long, random password to stay secure.") }}
        </p>
    </div>
    <form method="post" action="{{ route('password.update') }}">
        <div class="card-body">
            @csrf
            @method('put')

            <div class="row">
                <div class="col-6">
                    <div class="{{ $errors->updatePassword->has('current_password') ? ' has-danger' : '' }}">
                        <label>{{ __('Current Password') }}</label>
                        <input type="password" id="update_password_current_password" name="current_password" class="form-control{{ $errors->updatePassword->has('current_password') ? ' is-invalid' : '' }}" placeholder="{{ __('Current Password') }}" value="" autocomplete="current-password">
                        @include('alerts.feedback', ['field' => 'current_password','errorBag' => 'updatePassword'])
                    </div>
                    <div class="{{ $errors->updatePassword->has('password') ? ' has-danger' : '' }}">
                        <label>{{ __('New Password') }}</label>
                        <input type="password" id="update_password_password" name="password" class="form-control{{ $errors->updatePassword->has('password') ? ' is-invalid' : '' }}" placeholder="{{ __('New Password') }}" value="" autocomplete="new-password">
                        @include('alerts.feedback', ['field' => 'password','errorBag' => 'updatePassword'])
                    </div>
                    <div class="{{ $errors->updatePassword->has('password_confirmation') ? ' has-danger' : '' }}">
                        <label>{{ __('Confirm Password') }}</label>
                        <input type="password" id="update_password_password_confirmation" name="password_confirmation" class="form-control{{ $errors->updatePassword->has('password_confirmation') ? ' is-invalid' : '' }}" placeholder="{{ __('Confirm Password') }}" value="" autocomplete="new-password">
                        @include('alerts.feedback', ['field' => 'password_confirmation','errorBag' => 'updatePassword'])
                    </div>
                </div>
            </div>
        </div>
        <div class="card-footer">
            <button type="submit" class="btn btn-fill btn-primary">{{ __('Update') }}</button>
        </div>
    </form>
</div>