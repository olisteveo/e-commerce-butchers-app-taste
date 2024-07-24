<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ $author->author_name }} {{ $title }}
        </h2>
        @if(session("message"))
        <div class="bg-green overflow-hidden shadow-sm sm:rounded-lg mt-4 alert alert-success">
            <div class="p-6 text-gray-900">
                {{ session("message") }}
            </div>
        </div>
        @endif
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg mt-4">
            <div class="p-6 text-gray-900">
                {{ __("This is recipe ") }}{{ $author->recipes->count() }}{{ __(" of ")}}{{ $author->recipes->count() }}{{ __(" recipes. ")}}

            </div>
        </div>
    </x-slot>
    <x-slot name="slot">
        <div class="py-2">
            <div style="display: flex; justify-content: center;">
                <div class = "block mt-1 w-100%">
                    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                        @foreach ($author->recipes as $recipe)
                                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg mb-2 mt-2">
                                    <div class="p-6 text-gray-900">
                                        <h3><strong>Recipe</strong></h3>
                                        <h3>{{ $recipe->title }}</h3>
                                        <div class="card">
                                            <img class="recipe_result_pic" src="{{ asset("/storage/image_uploads/" . $recipe->image) }}" alt="{{ $recipe->description }} Image" />
                                        </div>
                                        <p><strong>Description</strong></p>
                                        <p>{{ nl2br($recipe->description) }}</p>
                                        <p><strong>Cooking Method</strong></p>
                                        <p>{{ nl2br($recipe->cooking_method) }}</p>
                                        <p><strong>Preparation Time</strong></p>
                                        <p>{{ nl2br($recipe->prep_time) }}</p>
                                        <p><strong>Serves Amount</strong></p>
                                        <p>{{ nl2br($recipe->serves) }}</p>
                                        <p><strong>Ingredients</strong></p>
                                        <ul>
                                        @foreach ($recipe->ingredients as $ingredient)
                                        <li class="pl-10"><strong>{{$ingredient->name}}</strong> - &times; <em>{{$ingredient->quantity}}</em></li>
                                        @endforeach
                                        </ul>
                                    </div>
                                </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </x-slot>
</x-app-layout>
