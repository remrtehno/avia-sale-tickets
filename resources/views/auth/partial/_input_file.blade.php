<div class="input2_wrapper overflow-hidden">
    <label for="{{ $name }}" 
    class="col-md-5 col-form-label text-md-right" 
    style="padding-left:0;padding-top:12px;">{{ $title }} 
    @if ($required)
        <span red>*</span>
    @endif
</label>


    <div class="col-md-7 px-0">
        <input type="file" class="my-15 
        @error('$name') is-invalid @enderror" 
        name="{{ $name }}" value="{{ old($name) }}" >
        @error($name)
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
</div>
<div class="clearfix"></div>  