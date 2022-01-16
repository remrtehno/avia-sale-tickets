@php
    $isRequiredProp = isSet($required) && trim($required) !== '';
    $hintTextProp = isSet($hint) && trim($hint) !== '' ? $hint : '';
    $placeholderTextProp = isSet($placeholder) && trim($placeholder) !== '' ? $placeholder : '';
    $maskProp = isSet($mask) && trim($mask) !== '' ? $mask : '';
    $aliasProp = isSet($alias) && trim($alias) !== '' ? $alias : '';
    $typeProp = isSet($type) && trim($type) !== '' ? $type : 'text';

@endphp

<div class="input2_wrapper my-15 overflow-hidden">
    <label class="col-md-5" style="padding-left:0;padding-top:12px;">
        @if (isSet($title))
            {{ $title }}
            @if ($isRequiredProp) 
                <span red>*</span> 
            @endif
        @endif
    </label>


    <div class="col-md-7 px-0">
        <input 
            @if ($typeProp !== 'email')
                type="{{ $typeProp }}" 
            @endif
            class="form-control @error($name) is-invalid @enderror" 
            placeholder="{{ $placeholderTextProp }}" 
            name="{{ $name }}" 
            value="{{ old($name) }}" 
            @if ($isRequiredProp) 
                required 
            @endif
            spellcheck="false"
            @if ($maskProp)
                data-inputmask="'mask': '{{ $maskProp }}'"
            @endif

            @if ($aliasProp)
                data-inputmask="'alias': '{{ $aliasProp }}'"
            @endif
        >

        @if ($hintTextProp)
        <small class="text-muted" style="line-height: 10px; display: block;">
            {{ $hintTextProp }} 
        </small> 
        @endif
            
        @error($name)
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
</div>
<div class="clearfix"></div>