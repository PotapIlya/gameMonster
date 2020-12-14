<!-- field_type_name -->
@include('crud::fields.inc.wrapper_start')
<label class="d-block">{!! $field['label'] !!}</label>

@php

    $field['default'] = '{"USD": 100,"RUB": 100, "EUR": 100}';

@endphp


<div class="wrapperCustomItemsCurrent">
    <input style="background: grey;"
            class="mainInput form-control"
            type="text"
            name="{{ $field['name'] }}"
            value="{{ old($field['name']) ? old($field['name']) : (isset($field['value']) ? $field['value'] : (isset($field['default']) ? $field['default'] : '' )) }}"
            @include('crud::fields.inc.attributes')
    >
    <div class="row align-items-center justify-content-between">
        <label for="" class="col-md-4">
            <span>Dollar</span>
            <input class="form-control inputDollar" type="number">
        </label>
        <label for="" class="col-md-4">
            <span>Ruble</span>
            <input class="form-control inputRuble" type="number">
        </label>
        <label for="" class="col-md-4">
            <span>Euro</span>
            <input class="form-control inputEuro" type="number">
        </label>

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
        <!-- no styles -->
    @endpush

    {{-- FIELD EXTRA JS --}}
    {{-- push things in the after_scripts section --}}
    @push('crud_fields_scripts')
        <script>
            if (document.querySelectorAll('.wrapperCustomItemsCurrent'))
            {
                const wrappers = document.querySelectorAll('.wrapperCustomItemsCurrent');

                wrappers.forEach(wrapper =>
                {
                    const mainInput = wrapper.querySelector('.mainInput');
                    const dollar = wrapper.querySelector('.inputDollar');
                    const ruble = wrapper.querySelector('.inputRuble');
                    const euro = wrapper.querySelector('.inputEuro');

                    if (mainInput.value)
                    {
                        let parse = JSON.parse(mainInput.value);

                        dollar.value = parse.USD;
                        ruble.value = parse.RUB;
                        euro.value = parse.EUR;

                        const resInput = (current, currentInput) =>
                        {
                            let parse = JSON.parse(mainInput.value);
                            parse[current] = currentInput.value;
                            mainInput.value = JSON.stringify(parse)
                        }

                        dollar.addEventListener('input', () => resInput('USD', dollar));
                        ruble.addEventListener('input', () => resInput('RUB', ruble));
                        euro.addEventListener('input', () => resInput('EUR', euro));
                    }
                })
            }
        </script>
    @endpush
@endif