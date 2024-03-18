@component($typeForm, get_defined_vars())
    <div
        data-controller="slug"
        data-slug-undefinedsymbol="{{$undefinedSymbol}}"
    >
        <input class="form-control" value="{{$value}}" {{$attributes}}>
    </div>
@endcomponent
