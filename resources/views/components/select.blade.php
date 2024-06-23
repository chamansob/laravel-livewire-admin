@props(['id', 'name', 'options', 'optionget', 'placeholder' => null, 'class' => ''])
@if($optionget!=0)
<div wire:ignore>
    <select id="{{ $id }}" name="{{ $name }}"
        {{ $attributes->merge(['class' => 'form-control ' . $class]) }}>
        @if ($placeholder)
            <option value="">{{ $placeholder }}</option>
        @endif
        @foreach ($options as $value => $label)
            <option value="{{ $label->id }}">{{ $label->$optionget }}</option>
        @endforeach
    </select>
</div>
@else
<div wire:ignore>
    <select id="{{ $id }}" name="{{ $name }}"
        {{ $attributes->merge(['class' => 'form-control ' . $class]) }}>
        @if ($placeholder)
            <option value="">{{ $placeholder }}</option>
        @endif
        @foreach ($options as $value => $label)
            <option value="{{ $value }}">{{ $label }}</option>
        @endforeach
    </select>
</div>
@endif
@section('script')
    <script>
        $(document).ready(function() {
            if ($(".taggings").length) {
                $(".taggings").select2({
                    placeholder: $(this).data('placeholder'),
                    closeOnSelect: true,
                    tags: true,
                    allowClear: true,
                });
                $(".taggings").on("change", function() {
                    let data = $(this).val();
                    //console.log(data);
                    @this.set('post_tags_ids', data)
                });

            }
        });
    </script>
@stop
