import "@melloware/coloris/dist/coloris.css";
import Coloris from "@melloware/coloris";
export default class extends window.Controller {
    connect() {

        let options = {
            el: '#' + this.element.querySelector('input').id,
            themeMode: this.data.get('theme_mode'),
            format: this.data.get('format'),
            theme: this.data.get('theme'),
        };

        if (this.data.get('close_button')) {
            options.closeButton = true;
            options.closeLabel = this.data.get('close_label');
        }

        if (this.data.get('show_swatches')) {
            options.swatches = JSON.parse(this.data.get('swatches'));
        }

        Coloris.init();
        Coloris(options);
    }
}
