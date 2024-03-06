import $ from 'jquery'
import '../../css/slug/slug.css'
export default class extends window.Controller {
    connect() {
        class Slug
        {
            /**
             * Символ на который заменяется не известный символ
             * @type {string}
             * @private
             */
            _undefinedSymbol = '-';

            _converter = {
                'а': 'a', 'б': 'b', 'в': 'v', 'г': 'g', 'д': 'd', 'е': 'e', 'ё': 'e', 'ж': 'zh', 'з': 'z', 'и': 'i', 'й': 'y', 'к': 'k', 'л': 'l', 'м': 'm', 'н': 'n', 'о': 'o', 'п': 'p', 'р': 'r', 'с': 's', 'т': 't', 'у': 'u', 'ф': 'f', 'х': 'h', 'ц': 'c', 'ч': 'ch', 'ш': 'sh', 'щ': 'sch', 'ь': '', 'ы': 'y', 'ъ': '', 'э': 'e', 'ю': 'yu', 'я': 'ya',
                'А': 'a', 'Б': 'b', 'В': 'v', 'Г': 'g', 'Д': 'd', 'Е': 'e', 'Ё': 'e', 'Ж': 'zh', 'З': 'z', 'И': 'i', 'Й': 'y', 'К': 'k', 'Л': 'l', 'М': 'm', 'Н': 'n', 'О': 'o', 'П': 'p', 'Р': 'r', 'С': 's', 'Т': 't', 'У': 'u', 'Ф': 'f', 'Х': 'h', 'Ц': 'c', 'Ч': 'ch', 'Ш': 'sh', 'Щ': 'sch', 'Ь': '', 'Ы': 'y', 'Ъ': '', 'Э': 'e', 'Ю': 'yu', 'Я': 'ya',
                'A': 'a', 'B': 'b', 'C': 'c', 'D': 'd', 'E': 'e', 'F': 'f', 'G': 'g', 'H': 'h', 'I': 'i', 'J': 'j', 'K': 'k', 'L': 'l', 'M': 'm', 'N': 'n', 'O': 'o', 'P': 'p', 'Q': 'q', 'R': 'r', 'S': 's', 'T': 't', 'U': 'u','V': 'v', 'W': 'w', 'X': 'x', 'Y': 'y', 'Z': 'z'
            }

            /**
             * Переменная с полем где вводится значение
             * @type {null}
             */
            fieldValue = null

            /**
             * Переменная с полем куда вставить slug
             * @type {null}
             */
            fieldSlug = null

            /**
             * Переменная означающее включение состояния синхронизации полей
             * @type {boolean}
             */
            useSlugTranslate = false

            /**
             * Переменная означающая что slug поле меняли ручками
             * @type {boolean}
             */
            slugChanged = false;

            /**
             * Элемент иконки отражающий статус включения sluggable режима
             * @type {boolean}
             */
            switcher = null

            constructor(fieldValue, fieldSlug, undefinedSymbol) {
                this.fieldSlug = fieldSlug;
                this.fieldValue = fieldValue;
                this._undefinedSymbol = undefinedSymbol;
            }

            init() {
                if (!this.fieldValue.parent('.sluggable').length) {
                    this.fieldValue.wrap('<div class="sluggable-wrap">');
                    this.fieldValue.after('<div class="slug_icon slug_icon--not_slugged">');
                }

                this.switcher = this.fieldValue.next();
                this.initEvent();
            }

            initEvent() {
                if (this.switcher) {
                    this.switcher.on('click', this.switched.bind(this));
                    this.fieldValue.on('keyup', this.typing.bind(this));
                    this.fieldSlug.on('keyup', this.changeSlugField.bind(this));
                }
            }

            switched(event) {
                event.preventDefault();

                if (this.useSlugTranslate) {
                    this.switcher.removeClass('slug_icon--slugged').addClass('slug_icon--not_slugged');
                    this.slugChanged = false;
                } else {
                    this.switcher.removeClass('slug_icon--not_slugged').addClass('slug_icon--slugged');
                }

                this.useSlugTranslate = !this.useSlugTranslate;
                this.typing();
            }

            typing() {
                if (this.useSlugTranslate && !this.slugChanged) {
                    let value = this.fieldValue.val();
                    this.fieldSlug.val(this.translit(value));
                }
            }

            translit(word) {
                let answer = '';

                for (let i = 0; i < word.length; ++i) {
                    if (this._converter[word[i]] == undefined) {
                        answer += /[^\w]/.test(word[i]) ? this._undefinedSymbol : word[i];
                    } else {
                        answer += this._converter[word[i]];
                    }
                }

                return answer;
            }

            changeSlugField() {
                this.slugChanged = this.fieldSlug.val().length > 0;
            }
        }

        /** Если есть data-slug (поле откуда брать) */
        if (this.element.querySelector('input').dataset.slug.length > 0) {
            let slugNameField = this.element.querySelector('input').dataset.slug;
            /** Если есть поле куда подставлять slug */
            if (document.querySelectorAll('input[name="' + slugNameField + '"]').length) {
                if (
                    this.element.querySelector('input').disabled === false &&
                    document.querySelector('input[name="' + slugNameField + '"]').disabled === false
                ) {
                    new Slug(
                        $(this.element.querySelector('input')),
                        $('input[name="' + slugNameField + '"]'),
                        this.data.get('undefinedsymbol')
                    ).init();
                }
            }
        }
    }
}
