<x-audience.master>
    <x-slot:title>
        {{__('Laravel Crud | Home')}}
    </x-slot:title>


    <x-audience.partials.carosel />
    <x-audience.partials.categoryProductBody :categories="$categories" :products="$products" />



</x-audience.master>