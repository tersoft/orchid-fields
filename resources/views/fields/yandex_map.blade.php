@component($typeForm, get_defined_vars())
    @if ($apiKey)
        <script src="https://api-maps.yandex.ru/v3/?apikey={{$apiKey}}&lang={{$language}}"></script>

        <div
            data-controller="yandex_map"
            data-yandex_map-zoom="{{$zoom}}"
            data-yandex_map-zoomButton="{{$zoomButton}}"
            data-yandex_map-markerColor="{{$markerColor}}"
            data-yandex_map-point="{{json_encode(explode(',', $point))}}"
            data-yandex_map-value="{{$value ? json_encode(explode(',', $value)) : ''}}"
        >
            <input class="form-control mb-3" value="{{$value}}" {{$attributes}}>
            <div id="YaMapOrchidFields" style="width: 100%; height: 400px"></div>
        </div>
    @endif
@endcomponent
