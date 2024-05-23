@extends('layouts.app',['page' => __('FAQs')])

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card card-tasks h-auto">
            <div class="card-header">
                <h4 class="title d-inline">{{ (isset($faq)) ? 'Edit' : 'Create' }} FAQ</h4>
            </div>
            <form method="post" action="{{ (isset($faq)) ? route('faq.update' , $faq) :  route('faq.store')}}" enctype="multipart/form-data" autocomplete="off">
                <div class="card-body">
                    @csrf
                    @isset($faq)
                    @method('put')
                    @endisset

                    <div class="row">
                        <div class="col-12{{ $errors->has('question') ? ' has-danger' : '' }}">
                            <label>{{ __('Question') }}</label>
                            <input type="text" name="question" class="form-control{{ $errors->has('question') ? ' is-invalid' : '' }}" placeholder="{{ __('Title') }}" value="{{ old('question', (isset($faq->question)) ? $faq->question :'') }}">
                            @include('alerts.feedback', ['field' => 'question'])
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12{{ $errors->has('answer') ? ' has-danger' : '' }}">
                            <label>{{ __('Answer') }}</label>
                            <textarea name="answer" class="form-control{{ $errors->has('answer') ? ' is-invalid' : '' }}" placeholder="{{ __('Answer') }}">{{ old('answer', (isset($faq->answer)) ? $faq->answer :'') }}</textarea>
                            @include('alerts.feedback', ['field' => 'answer'])
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-check col-12 pl-3">
                            <label class="form-check-label" style="top:33%">
                                <input class="form-check-input" type="checkbox" name="is_show" value="1" {{ (isset($faq)) ? (($faq->is_show == 1) ?  'checked': '') :'checked' }} />
                                <span class="form-check-sign"></span>
                                {{ __('Is Show') }}
                            </label>
                            @include('alerts.feedback', ['field' => 'is_show'])
                        </div>
                    </div>
                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-fill btn-primary">{{ (isset($faq)) ? 'Update' : 'Save' }}</button>
                    <a href="{{ route('faq.index') }}" class="btn btn-fill btn-danger">{{ __('Cancel') }}</a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection