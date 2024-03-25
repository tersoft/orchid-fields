@component($typeForm, get_defined_vars())
    @if ($apiKey)
        <script>(g=>{var h,a,k,p="The Google Maps JavaScript API",c="google",l="importLibrary",q="__ib__",m=document,b=window;b=b[c]||(b[c]={});var d=b.maps||(b.maps={}),r=new Set,e=new URLSearchParams,u=()=>h||(h=new Promise(async(f,n)=>{await (a=m.createElement("script"));e.set("libraries",[...r]+"");for(k in g)e.set(k.replace(/[A-Z]/g,t=>"_"+t[0].toLowerCase()),g[k]);e.set("callback",c+".maps."+q);a.src=`https://maps.${c}apis.com/maps/api/js?`+e;d[q]=f;a.onerror=()=>h=n(Error(p+" could not load."));a.nonce=m.querySelector("script[nonce]")?.nonce||"";m.head.append(a)}));d[l]?console.warn(p+" only loads once. Ignoring:",g):d[l]=(f,...n)=>r.add(f)&&u().then(()=>d[l](f,...n))})
            ({key: "{{$apiKey}}", v: "beta"});</script>
        <div
            data-controller="google_map"
            data-google_map-zoom="{{$zoom}}"
            data-google_map-point="{{json_encode(explode(',', $point))}}"
            data-google_map-value="{{$value ? json_encode(explode(',', $value)) : ''}}"
            data-google_map-mapid="{{$mapId}}"
        >
            <input class="form-control mb-3" value="{{$value}}" {{$attributes}}>
            <div id="GoogleMapOrchidFields" style="width: 100%; height: 400px"></div>
        </div>
    @endif
@endcomponent
