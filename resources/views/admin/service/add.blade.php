@extends('layouts.app',['page' => __('Services')])

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card card-tasks h-auto">
            <div class="card-header">
                <h4 class="title d-inline">{{ (isset($service)) ? 'Edit' : 'Create' }} Course</h4>
            </div>
            <form method="post" action="{{ (isset($service)) ? route('service.update' , $service) :  route('service.store')}}" enctype="multipart/form-data" autocomplete="off">
                <div class="card-body">
                    @csrf
                    @isset($service)
                    @method('put')
                    @endisset
                    <div class="row">
                        <div class="col-8{{ $errors->has('title') ? ' has-danger' : '' }}">
                            <label>{{ __('Title') }}</label>
                            <input type="text" name="title" class="form-control{{ $errors->has('title') ? ' is-invalid' : '' }}" placeholder="{{ __('Title') }}" value="{{ old('title', (isset($service->title)) ? $service->title :'') }}">
                            @include('alerts.feedback', ['field' => 'title'])
                        </div>
                        <div class="col-4{{ $errors->has('icon') ? ' has-danger' : '' }}">
                            <label>{{ __('Icon') }}</label>
                            <input type="text" name="icon" class="form-control{{ $errors->has('icon') ? ' is-invalid' : '' }}" placeholder="{{ __('Icon') }}" value="{{ old('icon', (isset($service->icon)) ? $service->icon :'') }}">
                            @include('alerts.feedback', ['field' => 'icon'])
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12{{ $errors->has('description') ? ' has-danger' : '' }}">
                            <label>{{ __('Description') }}</label>
                            <textarea name="description" class="form-control{{ $errors->has('description') ? ' is-invalid' : '' }}" placeholder="{{ __('Description') }}">{{ old('description', (isset($service->description)) ? $service->description :'') }}</textarea>
                            @include('alerts.feedback', ['field' => 'description'])
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-4{{ $errors->has('image') ? ' has-danger' : '' }}">
                            <label>{{ __('Image') }}<br>
                                <span>Minimum Dimensions 1024X700</span>
                            </label>
                            <input type="file" name="image" class="form-control{{ $errors->has('image') ? ' is-invalid' : '' }}">
                            @include('alerts.feedback', ['field' => 'image'])
                            @isset($service->image)
                            <a href="{{ Storage::url($service->image) }}" target="_blank"><img src="{{ Storage::url($service->image) }}" alt="Image" width="100" /></a>
                            @endisset
                        </div>
                    </div>
                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-fill btn-primary">{{ (isset($service)) ? 'Update' : 'Save' }}</button>
                    <a href="{{ route('service.index') }}" class="btn btn-fill btn-danger">{{ __('Cancel') }}</a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection