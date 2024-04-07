<x-layout :title="__('429 Too Many Requests')">

  <x-page-errors code="429" :message_title="__('429 Too Many Requests')" :message_subtitle="__('429 Sorry, You have sent too many request to the server in a short period of time. Please try again later.')" />

</x-layout>
