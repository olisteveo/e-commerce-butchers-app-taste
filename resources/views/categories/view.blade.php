<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ $title }}
        </h2>
        <div class="bg-white text-gray-900 overflow-hidden shadow-sm sm:rounded-lg mt-4">
            <div class="pb-4 ml-5">
                <p>
                    {{ nl2br($category->description) }}
                </p>
                <p>
                    {{ __("There are ") }}{{ $category->recipes->count() }}{{ __(" recipes in the ")}}{{ $category->name }}{{ __(" category. ")}}
                </p>
            </div>
            <div class="hidden space-x-8 sm:-my-px sm:flex">
                @foreach ($categories as $c)
                <x-nav-link :href="url('/categories', $c->name)">
                    {{ $c->name }}
                </x-nav-link>
                <div :class="{'block': open, 'hidden': ! open}" class="hidden sm:hidden">
                    <div class="pt-2 pb-3 space-y-1">
                        <x-responsive-nav-link :href="url('/categories', $c->name)">
                            {{ $c->name }}
                        </x-responsive-nav-link>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
        @if(session("message"))
        <div class="bg-green overflow-hidden shadow-sm sm:rounded-lg mt-4 alert alert-success">
            <div class="p-6 text-gray-900">
                {{ session("message") }}
            </div>
        </div>
        @endif
    </x-slot>
    <x-slot name="slot">
        <div class="py-2">
            <div style="display: flex; justify-content: center;">
                <div class = "block mt-1 w-100%">
                    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                        @foreach ($category->recipes as $recipe)
                                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg mb-2 mt-2">
                                    <div class="p-6 text-gray-900">
                                        <h3><strong>Recipe</strong></h3>
                                        <h3>{{ $recipe->title }}</h3>
                                        <p>{{ nl2br($recipe->description) }}</p>
                                        <p><strong>Cooking Method</strong></p>
                                        <p>{{ nl2br($recipe->cooking_method) }}</p>
                                        <p><strong>Preparation Time</strong></p>
                                        <p>{{ nl2br($recipe->prep_time) }}</p>
                                        <p><strong>Serves Amount</strong></p>
                                        <p>{{ nl2br($recipe->serves) }}</p>
                                        <br />
                                        <p><a href="{{route("recipe.view", $recipe->id)}}" style="display: inline-block; padding: 6px 18px; background-color: #4d4d4d; border-radius: 10px; box-shadow: 0px 2px 5px rgba(0, 0, 0, 0.3); color: white; text-decoration: none; cursor: pointer;">View Recipe</a></p>
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
