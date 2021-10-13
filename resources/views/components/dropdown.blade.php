@props(['$all_selection'])

<select class="form-control" onchange="selectCategory()" id="categories_select">
    {{ $all_selection }}

    {{ $slot }}
</select>
