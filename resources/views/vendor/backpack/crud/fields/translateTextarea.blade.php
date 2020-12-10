<!-- field_type_name -->
@include('crud::fields.inc.wrapper_start')
<label class="d-block">{!! $field['label'] !!}</label>


@php

    $field['default'] = '{"en":"Test","ru":"Test"}';

@endphp


<input
        id="translateTextarea"
        type="text"
        name="{{ $field['name'] }}"
                value="{{ old($field['name']) ? old($field['name']) : (isset($field['value']) ? $field['value'] : (isset($field['default']) ? $field['default'] : '' )) }}"
        @include('crud::fields.inc.attributes')
>
<div class="wrapperTextarea row align-items-center justify-content-between">
    <div class="col-md-6">
        <span>EN</span>
        <textarea class="form-control" id="translateTextareaEn"></textarea>
    </div>

    <div class="col-md-6">
        <span>RU</span>
        <textarea class="form-control" id="translateTextareaRu"></textarea>
    </div>
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
        <style>
            .wrapperTextarea textarea{
                resize: none;
                min-height: 200px;
            }
            .wrapperTextarea span{
                font-weight: bold;
            }
        </style>
    @endpush

    {{-- FIELD EXTRA JS --}}
    {{-- push things in the after_scripts section --}}
    @push('crud_fields_scripts')
        <script>
            if (document.getElementById('translateTextarea'))
            {
                const mainInput = document.getElementById('translateTextarea');
                const enInput = document.querySelector('#translateTextareaEn');
                const ruInput = document.querySelector('#translateTextareaRu');

                if (mainInput.value)
                {
                    let parse = JSON.parse(mainInput.value);
                    enInput.value = parse.en;
                    ruInput.value = parse.ru;

                    // console.log(parse)

                    const resInput = (lang, langInput) =>
                    {
                        let parse = JSON.parse(mainInput.value);
                        parse[lang] = langInput.value;
                        mainInput.value = JSON.stringify(parse)
                    }

                    enInput.addEventListener('input', () => resInput('en', enInput));
                    ruInput.addEventListener('input', () => resInput('ru', ruInput));
                }
            }

        </script>
    @endpush
@endif