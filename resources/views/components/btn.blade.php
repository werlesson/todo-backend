@if (!empty($href))
    <a href="{{$href ?? null}}" class="{{empty($class) ? 'btn btn-primary' : $class}}">
        {{$text ?? null}}
    </a>
@else
    <button type="{{$type ?? null}}" class="{{empty($class) ? 'btn btn-primary' : $class}}">
        {{$text ?? null}}
    </button>
@endif
