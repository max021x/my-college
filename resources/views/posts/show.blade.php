<x-layout>
    <div class="max-w-4xl mx-auto px-4 py-8">
        <x-postCard :post="$post" :full="true"/>
    </div>

    <livewire:comments :model="$post"/>

</x-layout>