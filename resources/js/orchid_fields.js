import TreeController from './controllers/tree_controller';
import RateController from './controllers/rate_controller';
import SlugController from './controllers/slug_controller';
import ColorController from './controllers/color_controller';
import YandexMapController from './controllers/yandex_map_controller';
import GoogleMapController from './controllers/google_map_controller';

application.register('tree', TreeController)
application.register('rate', RateController)
application.register('slug', SlugController)
application.register('color', ColorController)
application.register('yandex_map', YandexMapController)
application.register('google_map', GoogleMapController)

