@if(isset($errorBag))
@if ($errors->$errorBag->has($field))
<span class="invalid-feedback" role="alert">{{ $errors->$errorBag->first($field) }}</span>
@endif
@else
@if ($errors->has($field))
<span class="invalid-feedback" role="alert">{{ $errors->first($field) }}</span>
@endif
@endif