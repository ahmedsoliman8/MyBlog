<x-dropdown>
    <x-slot name="trigger">
        <button
            class="py-2 pl-3 pr-9 text-sm font-semibold w-full lg:w-32 text-left flex lg:inline-flex">
            {{isset($currentCategory) ? ucwords($currentCategory->name):'Categories'}}

            <x-icon name="down-arrow" class="absolute pointer-events-none" style="right: 12px;"/>

        </button>
    </x-slot>
    <x-dropdown-item href="/?{{http_build_query(request()->except('category','page'))}}" :active="Request::getRequestUri()==='/'">All</x-dropdown-item>

    @foreach($categories as $category)
        @php
            $active= isset(\Request::query()['category'])&& \Request::query()['category']===$category->slug ? true:false;
        @endphp
        <x-dropdown-item href="/?category={{$category->slug}}&{{http_build_query(request()->except('category','page'))}}"
                         :active='$active'>{{ucwords($category->name)}} </x-dropdown-item>
    @endforeach

</x-dropdown>
