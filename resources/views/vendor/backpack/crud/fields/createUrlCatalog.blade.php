<!-- field_type_name -->
@include('crud::fields.inc.wrapper_start')
<label class="d-block">{!! $field['label'] !!}</label>


<div class="changeUrl">
    <input
            class="mainTitle form-control"
            type="text"
            name="{{ $field['name'] }}"
            value="{{ old($field['name']) ? old($field['name']) : (isset($field['value']) ? $field['value'] : (isset($field['default']) ? $field['default'] : '' )) }}"
            @include('crud::fields.inc.attributes')
    >

</div>



{{-- HINT --}}
@if (isset($field['hint']))
    <p class="help-block">{!! $field['hint'] !!}</p>
@endif
@include('crud::fields.inc.wrapper_end')

@if ($crud->fieldTypeNotLoaded($field))
    @php
        $crud->markFieldTypeAsLoaded($field);
    @endphp

    {{-- FIELD EXTRA CSS  --}}
    {{-- push things in the after_styles section --}}
    @push('crud_fields_styles')
        <!-- no styles -->
    @endpush

    {{-- FIELD EXTRA JS --}}
    {{-- push things in the after_scripts section --}}
    @push('crud_fields_scripts')
        <script>
            if (document.querySelector('.changeUrl'))
            {
                const wrapper = document.querySelector('.changeUrl');

                const inputUrl = document.querySelector('#createUrlCatalogHidden');

                const inputTitle = document.querySelector('.mainTitle');
                inputTitle.addEventListener('input', (e) =>
                {
                    inputUrl.value = inputTitle.value.toLowerCase().split(' ').join('_');
                });

            }
        </script>
    @endpush
@endif