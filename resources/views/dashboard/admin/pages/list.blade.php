<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ $title }}
        </h2>
        @if(session("message"))
        <div class="bg-green overflow-hidden shadow-sm sm:rounded-lg mt-4 alert alert-success">
            <div class="p-6 text-gray-900">
                {!! session("message") !!}
            </div>
        </div>
        @endif
    </x-slot>
    <x-slot name="slot">
        <div class="py-2">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                @foreach ($pages as $page)
                    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg mb-2 mt-2">
                        <div class="p-6 text-gray-900">
                            <h3>{{ $page->title }}</h3>
                            <br />
                            <a href="{{route("dashboard.admin.pages.edit", $page->id)}}" style="display: inline-block; padding: 6px 18px; background-color: #4d4d4d; border-radius: 10px; box-shadow: 0px 2px 5px rgba(0, 0, 0, 0.3); color: white; text-decoration: none; cursor: pointer;">Edit</a>                            <br>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </x-slot>
</x-app-layout>
