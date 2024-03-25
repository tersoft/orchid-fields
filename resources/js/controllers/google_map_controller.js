export default class extends window.Controller {
    connect() {
        const zoom = parseInt(this.data.get('zoom'));
        const point = JSON.parse(this.data.get('point'));
        const value = this.data.get('value') ? JSON.parse(this.data.get('value')) : false;
        const inputCoord = this.element.querySelector('input');
        const mapId = this.data.get('mapid');

        let center = {};
        if (value) {
            center.lat = parseFloat(value[1]);
            center.lng = parseFloat(value[0]);
        } else {
            center.lat = parseFloat(point[1]);
            center.lng = parseFloat(point[0]);
        }

        let map;
        let markers = [];

        async function initMap() {
            const { Map } = await google.maps.importLibrary("maps");
            const { AdvancedMarkerView } = await google.maps.importLibrary("marker");

            map = new Map(document.getElementById("GoogleMapOrchidFields"), {
                center: center,
                zoom: zoom,
                mapId: mapId,
            });

            /** Событие нажатия на карту */
            map.addListener("click", (event) => {
                addMarker(event.latLng);
            });

            /** Если есть установленное значение, ставим marker */
            if (value) {
                addMarker(new google.maps.LatLng(parseFloat(value[1]), parseFloat(value[0])));
            }


            /**
             * Добавление маркера на карту
             *  - записываем координаты в поле
             *  - удаляем установленные маркеры
             *  - создаем новый маркер
             *  - добавляем новую коллекцию на карту
             */
            function addMarker(position) {
                inputCoord.value = position.lng() + ',' + position.lat()
                for (let i = 0; i < markers.length; i++) {
                    markers[i].setMap(null);
                }
                markers = [];

                const marker = new AdvancedMarkerView({
                    map: map,
                    position: position
                });

                markers.push(marker);
            }
        }

        /** Инициализация карты */
        initMap();
    }
}
