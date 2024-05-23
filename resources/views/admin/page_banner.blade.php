@extends('layouts.app',['page' => __('Page Banner')])

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card card-tasks h-auto">
            <div class="card-header">
                <h4 class="title d-inline">Page Banner</h4>
            </div>
            <form method="post" action="{{ (isset($page_banner)) ? route('page-banner.update', $page_banner) : route('page-banner.store') }}" enctype="multipart/form-data" autocomplete="off">
                <div class="card-body">
                    @csrf
                    @isset($page_banner)
                    @method('put')
                    @endisset
                    <div class="row">
                        <div class="col-3{{ $errors->has('about_banner') ? ' has-danger' : '' }}">
                            <label>{{ __('About Banner') }}</label>
                            <input type="file" name="about_banner" class="form-control mb-0{{ $errors->has('about_banner') ? ' is-invalid' : '' }}">
                            <small class="form-text text-muted">
                                Minimum Dimensions 1920X800
                            </small>
                            @include('alerts.feedback', ['field' => 'about_banner'])
                            @isset($page_banner->about_banner)
                            <a href="{{ Storage::url($page_banner->about_banner) }}" target="_blank"><img src="{{ Storage::url($page_banner->about_banner) }}" class="mt-3" alt="About Banner" width="100" /></a>
                            @endisset
                        </div>
                        <div class="col-3{{ $errors->has('contact_banner') ? ' has-danger' : '' }}">
                            <label>{{ __('Contact Banner') }}</label>
                            <input type="file" name="contact_banner" class="form-control mb-0{{ $errors->has('contact_banner') ? ' is-invalid' : '' }}">
                            <small class="form-text text-muted">
                                Minimum Dimensions 1920X800
                            </small>
                            @include('alerts.feedback', ['field' => 'contact_banner'])
                            @isset($page_banner->contact_banner)
                            <a href="{{ Storage::url($page_banner->contact_banner) }}" target="_blank"><img src="{{ Storage::url($page_banner->contact_banner) }}" class="mt-3" alt="Contact Banner" width="100" /></a>
                            @endisset
                        </div>
                        <div class="col-3{{ $errors->has('faqs_banner') ? ' has-danger' : '' }}">
                            <label>{{ __('FAQs Banner') }}</label>
                            <input type="file" name="faqs_banner" class="form-control mb-0{{ $errors->has('faqs_banner') ? ' is-invalid' : '' }}">
                            <small class="form-text text-muted">
                                Minimum Dimensions 1920X800
                            </small>
                            @include('alerts.feedback', ['field' => 'faqs_banner'])
                            @isset($page_banner->faqs_banner)
                            <a href="{{ Storage::url($page_banner->faqs_banner) }}" target="_blank"><img src="{{ Storage::url($page_banner->faqs_banner) }}" class="mt-3" alt="Contact Banner" width="100" /></a>
                            @endisset
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