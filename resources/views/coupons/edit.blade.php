<x-layout title="Cupones - Editar" :vite="['js/flowbite.min.js', 'js/coupons/edit-coupons.js']" react notifications>

  <x-main.admin>
    <x-title title="Cupones - Editar" />

    {{-- tabla de datos --}}
    <section class="w-full">
      <div id="main" class="relative p-4 w-full h-auto max-h-full m-auto"></div>
    </section>
  </x-main.admin>

  <script>
    const coupon = @json($coupon);
  </script>
</x-layout>
