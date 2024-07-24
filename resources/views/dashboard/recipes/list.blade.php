<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ $author->author_name }} {{ $title }}
        </h2>
        @if(session("message"))
        <div class="bg-green overflow-hidden shadow-sm sm:rounded-lg mt-4 alert alert-success">
            <div class="p-6 text-gray-900">
                {!! session("message") !!}
            </div>
        </div>
        @endif
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg mt-4">
            <div class="p-6 text-gray-900">
                {{ __("You have ") }}{{ $author->recipes->count() }}{{ __(" saved recipes. ")}}

            </div>
        </div>
    </x-slot>
    <x-slot name="slot">
        <div class="py-2">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                @foreach ($author->recipes as $recipe)
                    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg mb-2 mt-2">
                        <div class="p-6 text-gray-900">
                            <h3>{{ $recipe->title }}</h3>
                            <br />
                            <a href="{{route("dashboard.my_recipes.edit", $recipe->id)}}" style="display: inline-block; padding: 6px 18px; background-color: #4d4d4d; border-radius: 10px; box-shadow: 0px 2px 5px rgba(0, 0, 0, 0.3); color: white; text-decoration: none; cursor: pointer;">Edit</a>                            <br>
                            {!!Form::open(['action' => ['\App\Http\Controllers\Dashboard\RecipeController@destroy', $recipe->id], 'method'=>'POST', 'class' => 'delete-form' ]) !!}
                                {!!Form::hidden('_method', 'DELETE' )!!}
                                <br>
                                <a href="#" data-recipe_id="{{$recipe->id}}" class="recipe-delete-btn" style="display: inline-block; padding: 6px 18px; background-color: rgb(247, 174, 174); border-radius: 10px; box-shadow: 0px 2px 5px rgba(0, 0, 0, 0.3); color: rgb(247, 33, 33); text-decoration: none; cursor: pointer;">Delete</a>                            <br>
                            {!!Form::close() !!}
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </x-slot>
</x-app-layout>

<script>
    function ConfirmDeleteDialog(title, message, form) {
    $('<div></div>').appendTo('body')
        .html('<div><h6>' + message + '?</h6></div>')
        .dialog({
        modal: true,
        title: title,
        zIndex: 10000,
        autoOpen: true,
        width: 'auto',
        resizable: false,
        buttons: {
            Yes: function() {
            form.trigger("submit");

            $(this).dialog("close");
            },
            No: function() {

            $(this).dialog("close");
            }
        },
        close: function(event, ui) {
            $(this).remove();
        }
        });
    };
    $(document).ready(function() {
        $(".recipe-delete-btn").on("click", function(e) {
            form = $(this).closest(".delete-form");
            ConfirmDeleteDialog('Confirm Delete', 'Are you sure you wish to delete this recipe', form);
        });
    });
</script>
