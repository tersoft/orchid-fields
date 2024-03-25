export default class extends window.Controller {
    connect() {

        const zoom = this.data.get('zoom');
        const markerColor = this.data.get('markercolor');
        const zoomButton = this.data.get('zoombutton');
        const point = JSON.parse(this.data.get('point'));
        const value = this.data.get('value') ? JSON.parse(this.data.get('value')) : false;
        const inputCoord = this.element.querySelector('input');

        async function initMap() {
            await ymaps3.ready;

            const selector = '#YaMapOrchidFields';
            const {YMap, YMapDefaultSchemeLayer, YMapDefaultFeaturesLayer, YMapControls, YMapCollection, YMapListener} = ymaps3;

            const {YMapZoomControl} = await ymaps3.import('@yandex/ymaps3-controls@0.0.1');
            const {YMapDefaultMarker} = await ymaps3.import('@yandex/ymaps3-markers@0.0.1');


            const map = new YMap(
                document.querySelector(selector),
                {
                    location: {
                        center: value ? value : point,
                        zoom: zoom
                    },
                    showScaleInCopyrights: true
                },
                [
                    new YMapDefaultSchemeLayer({}),
                    new YMapDefaultFeaturesLayer({})
                ]
            );
            map.addChild(new YMapDefaultSchemeLayer());

            /** Если нужны кнопки приближения/отдаления */
            if (zoomButton) {
                map.addChild(
                    new YMapControls({position: 'right'}).addChild(new YMapZoomControl({}))
                );
            }

            /**
             * Добавление маркера на карту
             *  - удаляем все маркеры с карты
             *  - создаем маркер
             *  - создаем новую коллекцию и добавляем в нее маркер
             *  - добавляем новую коллекцию на карту
             */
            let markers = new YMapCollection();
            const addMarker = (value) => {
                map.removeChild(markers);
                const marker = new YMapDefaultMarker({
                    coordinates: value,
                    color: markerColor
                });
                markers = new YMapCollection().addChild(marker);
                map.addChild(markers);
            };

            /** Если есть установленное значение, ставим marker */
            if (value) {
                addMarker(value);
            }

            /** Обработка нажатия на карту */
            const clickCallback = (object, event) => {
                inputCoord.value = event.coordinates;
                addMarker(event.coordinates);
            };

            /** Обработчики событий */
            map.addChild(
                new YMapListener({
                    layer: 'any',
                    onClick: clickCallback,
                })
            );

            /** При клике на button внутри карты отменяем действия, тк это приводит к submit формы */
            document.querySelectorAll(selector + ' button').forEach(
                function (list) {
                    list.addEventListener('click', function (e) {
                        e.preventDefault();
                    });
                }
            );
        }

        initMap();
    }
}






