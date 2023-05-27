@php
    $class ??= null;
    $name ??= '';
    $value ??= '';
    $label ??= ucfirst($name);
@endphp

<div @class(["form-group", $class])>
    <label for="{{$name}}">{{$label}}</label>

    <select name="{{$name}}[]" id="{{$name}}" multiple>
        @foreach($options as $k => $v)
            @php
                $isSelected = $value->contains($k);
            @endphp
            <option value="{{ $k }}" @if($isSelected) selected @endif>{{$v}}</option>
        @endforeach
    </select>

    @error($name)
    <div class="invalid-feedback">
        {{$message}}
    </div>
    @enderror
</div>
