<div class="input2_wrapper overflow-hidden">
    
<div class="col-md-5 px-0">
    <label for="{{ $name }}" 
        class="col-form-label text-md-right" 
        style="padding-left:0;padding-top:12px;">{{ $title }} 
        @if ($required)
            <span red>*</span>
        @endif
    </label>
    @if (isSet($hint) ?? $hint)
        <small class="text-muted" style="line-height: 10px; display: block;">
            {{ $hint }}
        </small> 
    @endif
</div>


    <div class="col-md-7 px-0 parent-plus-btn">
        <input type="file" class="my-15 
        @error('$name') is-invalid @enderror" 
        name="{{ $name }}[]">
        @error($name)
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
        <button type="button" class="plus-btn">+</button>
    </div>
</div>
<div class="clearfix"></div>  