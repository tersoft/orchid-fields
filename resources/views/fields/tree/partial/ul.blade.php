<ul>
    @foreach($values as ${get_defined_vars()['slug']})
        {{-- Доступны для добавлнеия в data-jstree --}}
        {{-- "icon":"//jstree.com/tree.png" --}}

        @php
            $res = get_defined_vars();
            foreach($res['actions'] as $actionName => $action)
            {
                $props = [];
                foreach ($action[2] as $key => $item) {
                    $props[$key] = $res[$res['slug']]->{$item};
                }

                $route = route($action[1], $props);
                if (isset($action[3])) {
                    $route .= $action[3];
                }

                $mass[$actionName] = [$action[0] => $route];
            }
        @endphp

        <li
            data-jstree='{{json_encode(array_merge(['opened' => false], ['actions' => $mass]))}}'
        >
            {{ ${$res['slug']}->title }}
            @if (isset(${$res['slug']}->children))
                @include('platform-fields::fields.tree.partial.ul', ['values' => ${$res['slug']}->children])
            @endif
        </li>

    @endforeach
</ul>
