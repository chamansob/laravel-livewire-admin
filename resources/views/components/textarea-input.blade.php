@props(['disabled' => false,'value' => ''])
<div wire:ignore>
<textarea {{ $disabled ? 'disabled' : '' }} {!! $attributes->merge(['class' => 'form-control']) !!}>{{ $value }}</textarea>
</div>
