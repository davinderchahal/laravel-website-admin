@extends('layouts.app',['page' => __('Banner')])

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card card-tasks h-auto">
            <div class="card-header">
                <h4 class="title d-inline">Banner</h4>
            </div>
            <form method="post" action="{{ route('banners.update', $banner) }}" enctype="multipart/form-data" autocomplete="off">
                <div class="card-body">
                    @csrf
                    @method('put')

                    <div class="row">
                        <div class="col-12{{ $errors->has('title') ? ' has-danger' : '' }}">
                            <label>{{ __('Banner Title') }}</label>
                            <input type="text" name="title" class="form-control{{ $errors->has('title') ? ' is-invalid' : '' }}" placeholder="{{ __('Banner Title') }}" value="{{ old('title',  $banner->title) }}">
                            @include('alerts.feedback', ['field' => 'title'])
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12{{ $errors->has('description') ? ' has-danger' : '' }}">
                            <label>{{ __('Banner Description') }}</label>
                            <textarea name="description" class="form-control{{ $errors->has('description') ? ' is-invalid' : '' }}" placeholder="{{ __('Banner Description') }}">{{ old('description',  $banner->description) }}</textarea>
                            @include('alerts.feedback', ['field' => 'description'])
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-4{{ $errors->has('btn_text') ? ' has-danger' : '' }}">
                            <label>{{ __('Button Text') }}</label>
                            <input type="text" name="btn_text" class="form-control{{ $errors->has('btn_text') ? ' is-invalid' : '' }}" placeholder="{{ __('Button Text') }}" value="{{ old('btn_text', $banner->btn_text) }}">
                            @include('alerts.feedback', ['field' => 'btn_text'])
                        </div>
                        <div class="col-4{{ $errors->has('btn_link') ? ' has-danger' : '' }}">
                            <label>{{ __('Button Link') }}</label>
                            <input type="text" name="btn_link" class="form-control{{ $errors->has('btn_link') ? ' is-invalid' : '' }}" placeholder="{{ __('Button Link') }}" value="{{ old('btn_link', $banner->btn_link) }}">
                            @include('alerts.feedback', ['field' => 'btn_link'])
                        </div>
                        <div class="form-check col-4">
                            <label class="form-check-label" style="top:33%">
                                <input class="form-check-input" type="checkbox" name="show_btn" value="1" {{ ($banner->show_btn == 1) ?  'checked': '' }}>
                                <span class="form-check-sign"></span>
                                {{ __('Show Button') }}
                            </label>
                            @include('alerts.feedback', ['field' => 'show_btn'])
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-4 {{ $errors->has('file') ? ' has-danger' : '' }}">
                            <label>{{ __('Banner') }}</label>
                            <input type="file" name="file" class="form-control mb-0{{ $errors->has('file') ? ' is-invalid' : '' }}">
                            <small class="form-text text-muted">
                                Minimum Dimensions 869X570
                            </small>
                            @include('alerts.feedback', ['field' => 'file'])
                            @isset($banner->image)
                            <a href="{{ Storage::url($banner->image) }}" target="_blank"><img src="{{ Storage::url($banner->image) }}" class="mt-3" alt="Banner" width="100" /></a>
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