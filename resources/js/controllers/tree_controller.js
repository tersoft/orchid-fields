import $ from 'jquery'
import 'jstree'
import '../../css/jstree/themes/default/style.min.css'
import '../../css/jstree/themes/default/style_laravel.css'
export default class extends window.Controller {
    connect() {
        function customMenu(node) {
            let data = JSON.parse(node.li_attr['data-jstree']);
            let items = {};
            let iteration = 1;

            if (data.actions) {
                for (const [key, value] of Object.entries(data.actions)) {
                    for (const [method, url] of Object.entries(value)) {
                        if (method === 'get') {
                            items[iteration] = {
                                label: key,
                                action: function () {
                                    location.href = url;
                                }
                            }
                        } else if (method === 'post') {
                            items[iteration] = {
                                label: key,
                                action: function () {
                                    var form = $(
                                        '<form action="' + url + '" method="post">' +
                                            '<input type="hidden" name="_token" value="' + document.head.querySelector("[name='csrf_token'][content]").content + '" />' +
                                        '</form>'
                                        );
                                    $('body').append(form);
                                    $(form).submit();
                                }
                            }
                        }
                    }

                    iteration += 1;
                }
            }

            return items;
        }

        let element = this.element;

        $(this.element).jstree({
            // Увеличенный размер
            "core" : {
                "themes" : {
                    "variant" : "large"
                }
            },

            "plugins" : [
                'wholerow',
                'search', // Поиск
                'contextmenu' // Выпадающее меню
            ],
            'contextmenu': {items: customMenu}
        });

        // Поиск (нужно поле в view)
        var to = false;
        let searchField = $('#jstree_search');
        searchField.keyup(function () {
            if (to) {
                clearTimeout(to);
            }
            to = setTimeout(
                function () {
                    $(element).jstree("search", searchField.val());
                },
                250
            );
        });
    }
}
