<x-layout title="Cupones - crear" :vite="['js/flowbite.min.js', 'js/coupons/create-coupons.js']" react notifications>

  <x-main.admin>
    <x-title title="Cupones - Crear" />

    {{-- tabla de datos --}}
    <section class="w-full">
      <div id="main" class="relative p-4 w-full h-auto max-h-full m-auto"></div>
    </section>
  </x-main.admin>

  <script>
    const coupon = @js($coupon);
  </script>
</x-layout>
