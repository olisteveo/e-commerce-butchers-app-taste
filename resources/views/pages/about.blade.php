<x-guest-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ $page->title }}
        </h2>
    </x-slot>
    <x-slot name="slot">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-4 sm:p-8 bg-white text-white-500 shadow sm:rounded-lg mb-3">
                <div class="p-6 text-gray-900">
                    {!! $page->content !!}
                </div>
            </div>
        </div>
    </x-slot>
</x-guest-layout>

