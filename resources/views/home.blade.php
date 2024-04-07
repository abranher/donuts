<x-layout title="Home" :vite="['js/flowbite.min.js', 'js/maps/Geolocation.js']" react notifications>

  <x-main.user>
    <div class="w-full flex flex-col justify-center items-center">
      <div class="w-11/12 flex flex-col justify-center items-center">

        <x-card_link :href="route('shop')" :img="asset('img/Donacentral.jpg')">
          <x-slot name="title">
            Ir al Market
          </x-slot>
          <x-slot name="subtitle">
            Ingresa al Market. Aquí encontrarás todo lo que lo que buscas en donas.
          </x-slot>
        </x-card_link>

        <x-card_link :href="route('recipes.index')" :img="asset('img/logo.jpeg')">
          <x-slot name="title">
            Ir al Diseñador
          </x-slot>
          <x-slot name="subtitle">
            Ingresa al Diseñador. Aquí podrás crear y personalizar tus donas.
          </x-slot>
        </x-card_link>

        <x-card_link :href="route('user-deliveries.index')" :img="asset('img/donut1.jpg')">
          <x-slot name="title">
            Ir al Delivery
          </x-slot>
          <x-slot name="subtitle">
            Ingresa al Delivery. Aquí podras solicitar tu servicio de entrega.
          </x-slot>
        </x-card_link>

      </div>
    </div>
  </x-main.user>

</x-layout>
