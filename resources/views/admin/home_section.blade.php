@extends('layouts.app', ['page' => __('Home Sections')])

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card card-tasks h-auto">
            <div class="card-header">
                <h4 class="title d-inline">Section 1</h4>
            </div>
            <form method="post" action="{{ route('home-section.update', $homeSection) }}" enctype="multipart/form-data" autocomplete="off">
                <div class="card-body">
                    @csrf
                    @method('put')

                    <div class="row">
                        <div class="col-6{{ $errors->has('sec1_tagline') ? ' has-danger' : '' }}">
                            <label>{{ __('Tagline') }}</label>
                            <input type="text" name="sec1_tagline" class="form-control{{ $errors->has('sec1_tagline') ? ' is-invalid' : '' }}" placeholder="{{ __('Tagline') }}" value="{{ old('sec1_tagline', $homeSection->sec1_tagline) }}">
                            @include('alerts.feedback', ['field' => 'sec1_tagline'])
                        </div>
                        <div class="col-6{{ $errors->has('sec1_title') ? ' has-danger' : '' }}">
                            <label>{{ __('Title') }}</label>
                            <input type="text" name="sec1_title" class="form-control{{ $errors->has('sec1_title') ? ' is-invalid' : '' }}" placeholder="{{ __('Title') }}" value="{{ old('sec1_title', $homeSection->sec1_title) }}">
                            @include('alerts.feedback', ['field' => 'sec1_title'])
                        </div>
                    </div>

                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-fill btn-primary">{{ __('Update') }}</button>
                </div>
            </form>
        </div>
        <div class="card card-tasks h-auto">
            <div class="card-header">
                <h4 class="title d-inline">Section 2</h4>
            </div>
            <form method="post" action="{{ route('home-section.update', $homeSection) }}" enctype="multipart/form-data" autocomplete="off">
                <div class="card-body">
                    @csrf
                    @method('put')

                    <div class="row">
                        <div class="col-6{{ $errors->has('sec2_tagline') ? ' has-danger' : '' }}">
                            <label>{{ __('Tagline') }}</label>
                            <input type="text" name="sec2_tagline" class="form-control{{ $errors->has('sec2_tagline') ? ' is-invalid' : '' }}" placeholder="{{ __('Tagline') }}" value="{{ old('sec2_tagline', $homeSection->sec2_tagline) }}">
                            @include('alerts.feedback', ['field' => 'sec2_tagline'])
                        </div>
                        <div class="col-6{{ $errors->has('sec2_title') ? ' has-danger' : '' }}">
                            <label>{{ __('Title') }}</label>
                            <input type="text" name="sec2_title" class="form-control{{ $errors->has('sec2_title') ? ' is-invalid' : '' }}" placeholder="{{ __('Title') }}" value="{{ old('sec2_title', $homeSection->sec2_title) }}">
                            @include('alerts.feedback', ['field' => 'sec2_title'])
                        </div>
                    </div>
                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-fill btn-primary">{{ __('Update') }}</button>
                </div>
            </form>
        </div>
        <div class="card card-tasks h-auto">
            <div class="card-header">
                <h4 class="title d-inline">Video Section</h4>
            </div>
            <form method="post" action="{{ route('home-section.update', $homeSection) }}" enctype="multipart/form-data" autocomplete="off">
                <div class="card-body">
                    @csrf
                    @method('put')

                    <div class="row">
                        <div class="col-6{{ $errors->has('video_sec_title') ? ' has-danger' : '' }}">
                            <label>{{ __('Title') }}</label>
                            <input type="text" name="video_sec_title" class="form-control{{ $errors->has('video_sec_title') ? ' is-invalid' : '' }}" placeholder="{{ __('Title') }}" value="{{ old('video_sec_title', $homeSection->video_sec_title) }}">
                            @include('alerts.feedback', ['field' => 'video_sec_title'])
                        </div>
                        <div class="col-6{{ $errors->has('video_sec_link') ? ' has-danger' : '' }}">
                            <label>{{ __('Video Url') }}</label>
                            <input type="text" name="video_sec_link" class="form-control{{ $errors->has('video_sec_link') ? ' is-invalid' : '' }}" placeholder="{{ __('Video Url') }}" value="{{ old('video_sec_link', $homeSection->video_sec_link) }}">
                            @include('alerts.feedback', ['field' => 'video_sec_link'])
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-6{{ $errors->has('video_sec_btn_text') ? ' has-danger' : '' }}">
                            <label>{{ __('Button Text') }}</label>
                            <input type="text" name="video_sec_btn_text" class="form-control{{ $errors->has('video_sec_btn_text') ? ' is-invalid' : '' }}" placeholder="{{ __('Button Text') }}" value="{{ old('video_sec_btn_text', $homeSection->video_sec_btn_text) }}">
                            @include('alerts.feedback', ['field' => 'video_sec_btn_text'])
                        </div>
                        <div class="col-6{{ $errors->has('video_sec_btn_link') ? ' has-danger' : '' }}">
                            <label>{{ __('Button Link') }}</label>
                            <input type="text" name="video_sec_btn_link" class="form-control{{ $errors->has('video_sec_btn_link') ? ' is-invalid' : '' }}" placeholder="{{ __('Button Link') }}" value="{{ old('video_sec_btn_link', $homeSection->video_sec_btn_link) }}">
                            @include('alerts.feedback', ['field' => 'video_sec_btn_link'])
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-6 {{ $errors->has('file') ? ' has-danger' : '' }}">
                            <label>{{ __('Banner') }}</label>
                            <input type="file" name="file" class="form-control mb-0{{ $errors->has('file') ? ' is-invalid' : '' }}">
                            <small class="form-text text-muted">
                                Minimum Dimensions 1320X324
                            </small>
                            @include('alerts.feedback', ['field' => 'file'])
                            @isset($homeSection->video_sec_banner)
                            <a href="{{ Storage::url($homeSection->video_sec_banner) }}" target="_blank"><img src="{{ Storage::url($homeSection->video_sec_banner) }}" class="mt-3" alt="Banner" width="100" /></a>
                            @endisset
                        </div>
                    </div>
                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-fill btn-primary">{{ __('Update') }}</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection