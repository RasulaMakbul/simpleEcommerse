@props(['name'=> '', 'checklist' => [], 'checkedItems' => [], 'label' => null, 'id'=> null])

@if($label)
<label class="form-check-label h5">{{ $label }}</label>
@endif

@foreach($checklist as $key=>$value)
<div class="mb-3 form-check">

    <input name="{{ $name }}" type="checkbox" id="{{ $key.$id }}Input" value="{{ $key }}" @if(in_array($key, $checkedItems)) checked @endif {{ $attributes->merge(['class' => 'form-check-input']) }}>

    <label class="form-check-label" for="{{ $key.$id }}Input">{{ $value }}</label>

</div>
@endforeach

{{-- @if(in_array($key, $checkedItems))  --}}