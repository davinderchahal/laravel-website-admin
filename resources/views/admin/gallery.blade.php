@extends('layouts.app',['page' => __('Gallery')])

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card card-tasks h-auto">
            <div class="card-header">
                <h4 class="title d-inline">Gallery</h4>
            </div>
            <form method="post" action="{{ route('image.store') }}" enctype="multipart/form-data" autocomplete="off">
                <div class="card-body">
                    @csrf
                    <div class="row">
                        <div class="col-4{{ $errors->has('course_banner') ? ' has-danger' : '' }}">
                            <label>{{ __('Images') }}</label>
                            <input type="file" name="image[]" class="form-control mb-0{{ $errors->has('image.*') ? ' is-invalid' : '' }}" multiple>
                            <small class="form-text text-muted">
                                Minimum Dimensions 416X533
                            </small>
                            @include('alerts.feedback', ['field' => 'image.*'])
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
@if($images->isNotEmpty())
<div class="row">
    <div class="col-md-12">
        <div class="card card-tasks h-auto">
            <div class="card-body">
                <div class="row">
                    @foreach($images as $img)
                    <div class="col-3 mb-3">
                        <a href="{{ Storage::url($img->image) }}" target="_blank"><img src="{{ Storage::url($img->image) }}" alt="Image" width="200" height="200" /></a>
                        <form method="POST" action="{{ route('image.destroy', $img) }}" class="float-left ml-1" style="position: absolute; top: 0; right: 31px;">
                            @csrf
                            @method('delete')
                            <a href="{{ route('image.destroy', $img) }}" class="btn btn-sm btn-danger btn-round btn-icon dsc-delete-btn" title="Delete" data-toggle="tooltip">
                                <i class="tim-icons icon-simple-remove"></i>
                            </a>
                        </form>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endif
@endsection