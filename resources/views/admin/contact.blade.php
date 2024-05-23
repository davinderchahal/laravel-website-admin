@extends('layouts.app',['page' => __('Contact Us')])

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card card-tasks h-auto">
            <div class="card-header">
                <h4 class="title d-inline">Contact</h4>
            </div>
            <form method="post" action="{{ route('contact.update', $contact) }}" enctype="multipart/form-data" autocomplete="off">
                <div class="card-body">
                    @csrf
                    @method('put')

                    <div class="row">
                        <div class="col-12{{ $errors->has('tagline') ? ' has-danger' : '' }}">
                            <label>{{ __('Tagline') }}</label>
                            <input type="text" name="tagline" class="form-control{{ $errors->has('tagline') ? ' is-invalid' : '' }}" placeholder="{{ __('Tagline') }}" value="{{ old('tagline',  $contact->tagline) }}">
                            @include('alerts.feedback', ['field' => 'tagline'])
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12{{ $errors->has('title') ? ' has-danger' : '' }}">
                            <label>{{ __('Title') }}</label>
                            <input type="text" name="title" class="form-control{{ $errors->has('title') ? ' is-invalid' : '' }}" placeholder="{{ __('Title') }}" value="{{ old('title',  $contact->title) }}">
                            @include('alerts.feedback', ['field' => 'title'])
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12{{ $errors->has('description') ? ' has-danger' : '' }}">
                            <label>{{ __('Description') }}</label>
                            <textarea name="description" class="form-control{{ $errors->has('description') ? ' is-invalid' : '' }}" placeholder="{{ __('Description') }}">{{ old('description',  $contact->description) }}</textarea>
                            @include('alerts.feedback', ['field' => 'description'])
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-4{{ $errors->has('phone') ? ' has-danger' : '' }}">
                            <label>{{ __('Phone') }}</label>
                            <input type="text" name="phone" class="form-control{{ $errors->has('phone') ? ' is-invalid' : '' }}" placeholder="{{ __('Phone') }}" value="{{ old('phone',  $contact->phone) }}">
                            @include('alerts.feedback', ['field' => 'phone'])
                        </div>
                        <div class="col-4{{ $errors->has('email') ? ' has-danger' : '' }}">
                            <label>{{ __('Email') }}</label>
                            <input type="text" name="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" placeholder="{{ __('Email') }}" value="{{ old('email',  $contact->email) }}">
                            @include('alerts.feedback', ['field' => 'email'])
                        </div>
                        <div class="col-4{{ $errors->has('address') ? ' has-danger' : '' }}">
                            <label>{{ __('Address') }}</label>
                            <input type="text" name="address" class="form-control{{ $errors->has('address') ? ' is-invalid' : '' }}" placeholder="{{ __('Address') }}" value="{{ old('address',  $contact->address) }}">
                            @include('alerts.feedback', ['field' => 'address'])
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-6{{ $errors->has('social_media.facebook') ? ' has-danger' : '' }}">
                            <label>{{ __('Facebook Link') }}</label>
                            <input type="text" name="social_media[facebook]" class="form-control{{ $errors->has('social_media.facebook') ? ' is-invalid' : '' }}" placeholder="{{ __('Facebook Link') }}" value="{{ old('social_media.facebook',  (isset($contact->social_media['facebook'])) ? $contact->social_media['facebook'] :'') }}">
                            @include('alerts.feedback', ['field' => 'social_media.facebook'])
                        </div>
                        <div class="col-6{{ $errors->has('social_media.insta') ? ' has-danger' : '' }}">
                            <label>{{ __('Instagram Link') }}</label>
                            <input type="text" name="social_media[insta]" class="form-control{{ $errors->has('social_media.insta') ? ' is-invalid' : '' }}" placeholder="{{ __('Instagram Link') }}" value="{{ old('social_media.insta',  (isset($contact->social_media['insta'])) ? $contact->social_media['insta'] :'') }}">
                            @include('alerts.feedback', ['field' => 'social_media.insta'])
                        </div>
                        <div class="col-6{{ $errors->has('social_media.linkedin') ? ' has-danger' : '' }}">
                            <label>{{ __('Linkedin Link') }}</label>
                            <input type="text" name="social_media[linkedin]" class="form-control{{ $errors->has('social_media.linkedin') ? ' is-invalid' : '' }}" placeholder="{{ __('Linkedin Link') }}" value="{{ old('social_media.linkedin',  (isset($contact->social_media['linkedin'])) ? $contact->social_media['linkedin'] :'') }}">
                            @include('alerts.feedback', ['field' => 'social_media.linkedin'])
                        </div>
                        <div class="col-6{{ $errors->has('social_media.twitter') ? ' has-danger' : '' }}">
                            <label>{{ __('Twitter Link') }}</label>
                            <input type="text" name="social_media[twitter]" class="form-control{{ $errors->has('social_media.twitter') ? ' is-invalid' : '' }}" placeholder="{{ __('Twitter Link') }}" value="{{ old('social_media.twitter',  (isset($contact->social_media['twitter'])) ? $contact->social_media['twitter'] :'') }}">
                            @include('alerts.feedback', ['field' => 'social_media.twitter'])
                        </div>
                        <div class="col-6{{ $errors->has('social_media.youtube') ? ' has-danger' : '' }}">
                            <label>{{ __('Youtube Link') }}</label>
                            <input type="text" name="social_media[youtube]" class="form-control{{ $errors->has('social_media.youtube') ? ' is-invalid' : '' }}" placeholder="{{ __('Youtube Link') }}" value="{{ old('social_media.youtube',  (isset($contact->social_media['youtube'])) ? $contact->social_media['youtube'] :'') }}">
                            @include('alerts.feedback', ['field' => 'social_media.youtube'])
                        </div>
                    </div>
                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-fill btn-primary">{{ __('Save') }}</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection