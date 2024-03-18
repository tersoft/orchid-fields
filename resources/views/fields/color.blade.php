@component($typeForm, get_defined_vars())
    <div
        data-controller="color"
        data-color-theme="{{$theme}}"
        data-color-theme_mode="{{$themeMode}}"
        data-color-format="{{$format}}"
        data-color-close_button="{{$closeButton}}"
        data-color-close_label="{{$closeLabel}}"
        data-color-show_swatches="{{$showSwatches}}"
        data-color-swatches="{{json_encode($swatches)}}"
    >
        <input class="form-control" value="{{$value}}" {{$attributes}}>
    </div>
@endcomponent
