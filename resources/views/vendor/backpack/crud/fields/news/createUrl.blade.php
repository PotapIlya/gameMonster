<!-- field_type_name -->
@include('crud::fields.inc.wrapper_start')
<label class="d-block">{!! $field['label'] !!}</label>


@php

    $field['default'] = '{"en":"Test","ru":"Test"}';

@endphp


<div class="wrapperCustomItems">
    <input style="background: grey;"
           class="translateText form-control"
           type="text"
           name="{{ $field['name'] }}"
           value="{{ old($field['name']) ? old($field['name']) : (isset($field['value']) ? $field['value'] : (isset($field['default']) ? $field['default'] : '' )) }}"
            @include('crud::fields.inc.attributes')
    >
    <div class="row align-items-center justify-content-between">
        <label for="" class="col-md-6">
            <span>EN</span>
            <input class="form-control translateTextEn" type="text">
        </label>

        <label for="" class="col-md-6">
            <span>RU</span>
            <input class="form-control translateTextRu" type="text">
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
            if (document.querySelectorAll('.wrapperCustomItems'))
            {
                const wrappers = document.querySelectorAll('.wrapperCustomItems')

                wrappers.forEach(wrapper =>
                {
                    const mainInput = wrapper.querySelector('.translateText');
                    const enInput = wrapper.querySelector('.translateTextEn');
                    const ruInput = wrapper.querySelector('.translateTextRu');

                    // URL
                    const getUrl = document.querySelector('#getUrl');


                    if (mainInput.value)
                    {
                        let parse = JSON.parse(mainInput.value);
                        enInput.value = parse.en;
                        ruInput.value = parse.ru;

                        const resInput = (lang, langInput) =>
                        {
                            let parse = JSON.parse(mainInput.value);
                            parse[lang] = langInput.value;
                            mainInput.value = JSON.stringify(parse)

                            if (lang === 'en')
                            {
                                getUrl.value = langInput.value.toLowerCase().split(' ').join('_');
                            }
                        }

                        enInput.addEventListener('input', () => resInput('en', enInput));
                        ruInput.addEventListener('input', () => resInput('ru', ruInput));
                    }
                })
            }
            // if (document.querySelector('.changeUrl'))
            // {
            //     // const wrapper = document.querySelector('#getUrl');
            //
            //     const inputUrl = document.querySelector('#createUrlCatalogHidden');
            //
            //
            //     const inputTitle = document.querySelector('#getUrl');
            //
            //     inputTitle.addEventListener('input', (e) =>
            //     {
            //         console.log(12)
            //         inputUrl.value = inputTitle.value.toLowerCase().split(' ').join('_');
            //     });
            //
            // }
        </script>
    @endpush
@endif