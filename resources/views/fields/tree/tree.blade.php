@component($typeForm, get_defined_vars())
    {{ csrf_token() }}
    @if($showSearch)
        <input
            type="text"
            id="jstree_search"
            value=""
            class="form-control form-group"
            placeholder="{{ $searchPlaceholder }}"
        >
    @endif

    <div data-controller="tree">
        @include('platform-fields::fields.tree.partial.ul', ['values' => $value])
    </div>
@endcomponent
