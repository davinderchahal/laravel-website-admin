@extends('layouts.app',['page' => __('About Us')])

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card card-tasks h-auto">
            <div class="card-header">
                <h4 class="title d-inline">About</h4>
            </div>
            <form method="post" action="{{ route('about.update', $about) }}" enctype="multipart/form-data" autocomplete="off">
                <div class="card-body">
                    @csrf
                    @method('put')

                    <div class="row">
                        <div class="col-12{{ $errors->has('tagline') ? ' has-danger' : '' }}">
                            <label>{{ __('Tagline') }}</label>
                            <input type="text" name="tagline" class="form-control{{ $errors->has('tagline') ? ' is-invalid' : '' }}" placeholder="{{ __('Tagline') }}" value="{{ old('tagline',  $about->tagline) }}">
                            @include('alerts.feedback', ['field' => 'tagline'])
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12{{ $errors->has('title') ? ' has-danger' : '' }}">
                            <label>{{ __('Title') }}</label>
                            <input type="text" name="title" class="form-control{{ $errors->has('title') ? ' is-invalid' : '' }}" placeholder="{{ __('Title') }}" value="{{ old('title',  $about->title) }}">
                            @include('alerts.feedback', ['field' => 'title'])
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12{{ $errors->has('description') ? ' has-danger' : '' }}">
                            <label>{{ __('Description') }}</label>
                            <textarea name="description" class="form-control{{ $errors->has('description') ? ' is-invalid' : '' }}" placeholder="{{ __('Description') }}">{{ old('description',  $about->description) }}</textarea>
                            @include('alerts.feedback', ['field' => 'description'])
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12{{ $errors->has('box_title') ? ' has-danger' : '' }}">
                            <label>{{ __('Box Title') }}</label>
                            <input type="text" name="box_title" class="form-control{{ $errors->has('box_title') ? ' is-invalid' : '' }}" placeholder="{{ __('Box Title') }}" value="{{ old('box_title',  $about->box_title) }}">
                            @include('alerts.feedback', ['field' => 'box_title'])
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12{{ $errors->has('box_description') ? ' has-danger' : '' }}">
                            <label>{{ __('Box Description') }}</label>
                            <textarea name="box_description" class="form-control{{ $errors->has('box_description') ? ' is-invalid' : '' }}" placeholder="{{ __('Box Description') }}">{{ old('box_description',  $about->box_description) }}</textarea>
                            @include('alerts.feedback', ['field' => 'box_description'])
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12{{ $errors->has('service_list.title1') ? ' has-danger' : '' }}">
                            <label>{{ __('Sub Title 1') }}</label>
                            <input type="text" name="service_list[title1]" class="form-control{{ $errors->has('service_list.title1') ? ' is-invalid' : '' }}" placeholder="{{ __('Sub Title 1') }}" value="{{ old('service_list.title1',  (isset($about->service_list['title1'])) ? $about->service_list['title1'] :'') }}">
                            @include('alerts.feedback', ['field' => 'service_list.title1'])
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12{{ $errors->has('service_list.description1') ? ' has-danger' : '' }}">
                            <label>{{ __('Sub Description 1') }}</label>
                            <textarea name="service_list[description1]" class="form-control{{ $errors->has('service_list.description1') ? ' is-invalid' : '' }}" placeholder="{{ __('Sub Description 1') }}">{{ old('service_list.description1',  (isset($about->service_list['description1'])) ? $about->service_list['description1'] : '' ) }}</textarea>
                            @include('alerts.feedback', ['field' => 'service_list.description1'])
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12{{ $errors->has('service_list.title2') ? ' has-danger' : '' }}">
                            <label>{{ __('Sub Title 2') }}</label>
                            <input type="text" name="service_list[title2]" class="form-control{{ $errors->has('service_list.title2') ? ' is-invalid' : '' }}" placeholder="{{ __('Sub Title 2') }}" value="{{ old('service_list.title2',  (isset($about->service_list['title2'])) ? $about->service_list['title2'] :'') }}">
                            @include('alerts.feedback', ['field' => 'service_list.title2'])
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12{{ $errors->has('service_list.description2') ? ' has-danger' : '' }}">
                            <label>{{ __('Sub Description 2') }}</label>
                            <textarea name="service_list[description2]" class="form-control{{ $errors->has('service_list.description2') ? ' is-invalid' : '' }}" placeholder="{{ __('Sub Description 2') }}">{{ old('service_list.description2',  (isset($about->service_list['description2'])) ? $about->service_list['description2'] : '' ) }}</textarea>
                            @include('alerts.feedback', ['field' => 'service_list.description2'])
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12{{ $errors->has('service_list.title3') ? ' has-danger' : '' }}">
                            <label>{{ __('Sub Title 3') }}</label>
                            <input type="text" name="service_list[title3]" class="form-control{{ $errors->has('service_list.title3') ? ' is-invalid' : '' }}" placeholder="{{ __('Sub Title 3') }}" value="{{ old('service_list.title3',  (isset($about->service_list['title3'])) ? $about->service_list['title3'] :'') }}">
                            @include('alerts.feedback', ['field' => 'service_list.title3'])
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12{{ $errors->has('service_list.description3') ? ' has-danger' : '' }}">
                            <label>{{ __('Sub Description 3') }}</label>
                            <textarea name="service_list[description3]" class="form-control{{ $errors->has('service_list.description3') ? ' is-invalid' : '' }}" placeholder="{{ __('Sub Description 3') }}">{{ old('service_list.description3',  (isset($about->service_list['description3'])) ? $about->service_list['description3'] : '' ) }}</textarea>
                            @include('alerts.feedback', ['field' => 'service_list.description3'])
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-4{{ $errors->has('thumb_one') ? ' has-danger' : '' }}">
                            <label>{{ __('Image One') }}</label>
                            <input type="file" name="thumb_one" class="form-control mb-0{{ $errors->has('thumb_one') ? ' is-invalid' : '' }}">
                            <small class="form-text text-muted">
                                Minimum Dimensions 451X652
                            </small>
                            @include('alerts.feedback', ['field' => 'thumb_one'])
                            @isset($about->thumb_one)
                            <a href="{{ Storage::url($about->thumb_one) }}" target="_blank">
                                <img src="{{ Storage::url($about->thumb_one) }}" class="mt-3" alt="Image One" width="100" />
                            </a>
                            @endisset
                        </div>
                        <div class="col-4{{ $errors->has('thumb_two') ? ' has-danger' : '' }}">
                            <label>{{ __('Image Two') }}</label>
                            <input type="file" name="thumb_two" class="form-control mb-0{{ $errors->has('thumb_two') ? ' is-invalid' : '' }}">
                            <small class="form-text text-muted">
                                Minimum Dimensions 305X441
                            </small>
                            @include('alerts.feedback', ['field' => 'thumb_two'])
                            @isset($about->thumb_two)
                            <a href="{{ Storage::url($about->thumb_two) }}" target="_blank">
                                <img src="{{ Storage::url($about->thumb_two) }}" class="mt-3" alt="Image Two" width="100" />
                            </a>
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