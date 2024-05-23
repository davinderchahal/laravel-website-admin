@extends('layouts.app', ['page' => __('Profile')])

@section('content')
<div class="row">
    <div class="col-md-12">
        @include('profile.partials.update-profile-information-form')
        @include('profile.partials.update-password-form')
    </div>
</div>
@endsection