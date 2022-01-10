@php
    $isRequired = isSet($required) && trim($required) !== '';
    $isFileRequired = isSet($fileRequired) && trim($fileRequired) !== '';
    $hintText = isSet($hint) && trim($hint) !== '' ? $hint : '' ;
    $fileName = isSet($file) && trim($file) !== '';
    $placeholderText = isSet($placeholder) && trim($placeholder) !== '' ? $placeholder : '' ;
    $typeField = isSet($type) && trim($type) !== '' ? $type : 'text' ;
@endphp


<div class="input2_wrapper my-15">
    <label class="col-md-5" style="padding-left:0;padding-top:12px;">
        {{ $title }}
        @if ($isRequired) 
            <span red>*</span> 
        @endif
    </label>

    <div class="{{ $fileName ? "col-md-4" : "col-md-7" }} px-0">
        <input 
            type="{{ $typeField }}" 
            class="form-control @error($name) is-invalid @enderror" 
            placeholder="{{ $placeholderText }}" 
            name="{{ $name }}" 
            value="{{ old($name) }}" 
            @if ($isRequired) 
                required 
            @endif
            spellcheck="false"
        >

        @if ($hintText)
        <small class="text-muted" style="line-height: 10px; display: block;">
            {{ $hintText }} 
        </small> 
        @endif
            
        @error($name)
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
    @if ($fileName)
        <div class="col-md-3">
            <input 
                id="{{ $fileName }}" 
                type="file" 
                class="form-control @error($fileName) is-invalid @enderror" 
                name="inn-file" 
                value="{{ old($fileName) }}" 
                required
            >

            @error($fileName)
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
    @endif
</div>
<div class="clearfix"></div>