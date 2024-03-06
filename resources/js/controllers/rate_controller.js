import 'rater-js';
export default class extends window.Controller {
    connect() {
        let thisElement = this.element;
        let inputField = this.element.querySelector('input');

        let opt = {
            element: thisElement.querySelector('div'),
            starSize: this.data.get('size'),
            step: Number(this.data.get('step')),
            max: Number(this.data.get('count')),
            rating: Number(this.data.get('value')),
            readOnly: this.data.get('readonly'),

            rateCallback:function rateCallback(rating, done) {
                this.setRating(rating);
                done();
            },
            onHover: function(currentIndex, currentRating) {
                /** Округляем до 1 символа после запятой */
                inputField.value = currentIndex.toFixed(1);
            },
            onLeave: function(currentIndex, currentRating) {
                /** Округляем до 1 символа после запятой */
                inputField.value = currentRating.toFixed(1);
            }
        };

        var rater = require("rater-js");
        var myRater = rater(opt);

        if (this.data.get('readonly')) {
            /** Если только для чтения, то поле input делаем disabled */
            inputField.disabled = true;
        } else {
            /** Событие ввода рейтинга в поле input */
            inputField.addEventListener("input", () => {
                let inputVal = parseFloat(Number(inputField.value).toFixed(1));

                if (inputVal > opt.max) {
                    inputVal = opt.max;
                    inputField.value = String(opt.max);
                } else if (inputVal < 0 || isNaN(inputVal)) {
                    inputVal = 0;
                    inputField.value = String(0);
                }

                myRater.setRating(parseFloat(inputVal));
            });
        }
    }
}
