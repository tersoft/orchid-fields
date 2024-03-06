@component($typeForm, get_defined_vars())
    <div
        data-controller="rate"
        data-rate-count="{{$count}}"
        data-rate-step="{{$step}}"
        data-rate-readonly="{{$readOnly}}"
        data-rate-value="{{$value}}"
        data-rate-size="{{$starSize}}"
    >
        <div data-rate-value="{{$attributes['value']}}"></div>
        <input type="{{$inputType}}" class="form-control form-group" {{$attributes}}>
    </div>
@endcomponent
