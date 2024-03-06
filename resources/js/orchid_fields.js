import TreeController from './controllers/tree_controller';
import RateController from './controllers/rate_controller';
import SlugController from './controllers/slug_controller';

application.register('tree', TreeController)
application.register('rate', RateController)
application.register('slug', SlugController)

