<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ $title }}
        </h2>
    </x-slot>
    <x-slot name="slot">
        <div class="p-4 sm:p-8 bg-white text-white-500 shadow sm:rounded-lg mb-3 mt-3">
            <div class="p-6 text-gray-900">
                <h2 class="text-lg text-center font-medium text-gray-900 dark:text-gray-100">
                    {{ __("Edit Your Recipes Here") }}
                </h2>
            </div>
        </div>
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg mb-2 mt-2">
            <div class="p-6 text-gray-900 rounded border-gray-300 shadow-sm focus:ring-indigo-500">
                {!! Form::open(['action'=>'App\Http\Controllers\Dashboard\RecipeController@update', 'method'=>'POST' ,'enctype' => 'multipart/form-data', 'class' => 'edit-recipe-form']) !!}
                <div style="display: flex; justify-content: center;">
                    <div class = "block mt-1 w-50%">
                        {{Form::label('title', 'Title')}}
                        <div class="form-group">
                            {{Form::Hidden("recipe_id", $recipe->id)}}
                            {{Form::Hidden("recipe_author", $recipe->author_id)}}
                            {{Form::text('title', $recipe->title, ['class'=>'form-control','placeholder'=>'', 'required'=>'required'])}}
                            @if ($errors->has('title'))
                                <span class="text-danger">{{ $errors->first('title') }}</span>
                            @endif
                        </div>
                    </div>
                </div>
                <div style="display: flex; justify-content: center;">
                    <div class = "block mt-1 w-50%">
                        {{Form::label('desc', 'Description')}}
                        <div class="form-group">
                            {{Form::text('desc', $recipe->description, ['class'=>'form-control','placeholder'=>'', 'required'=>'required'])}}
                            @if ($errors->has('desc'))
                                <span class="text-danger">{{ $errors->first('desc') }}</span>
                            @endif
                        </div>
                    </div>
                </div>
                <div>
                </div>
                <div style="display: flex; justify-content: center;">
                    <h3>Ingredients</h3>
                </div>
                <fieldset id="ingredients-list" class="border border-solid border-gray-300 p-3" style="display: flex; justify-content: center; flex-direction:column">
                    <legend class="text-m pl-3 pr-4">Ingredients</legend>
                @foreach ($recipe->ingredients as $idx => $ingredient)
                    <div style='display: flex; justify-content: center;'>
                        <div class = "block mt-1 w-50%">
                            <label for="ingredients[{{$idx}}][name]">Name</label>
                            <div class="form-group">
                                <input type="text" id="ingredients[{{$idx}}][name]" name="ingredients[{{$idx}}][name]" class="form-control" value="{{$ingredient->name}}" />
                            </div>
                        </div>
                        <div class = "block mt-1 w-50%">
                            <label for="ingredients[{{$idx}}][quantity]">Quantity</label>
                            <div class="form-group">
                                <input type="text" id="ingredients[{{$idx}}][quantity]" name="ingredients[{{$idx}}][quantity]" class="form-control"  value="{{$ingredient->quantity}}" />
                            </div>
                        </div>
                    </div>
                @endforeach
                </fieldset>
                <div style="display: flex; justify-content: center;">
                    <a id="add-ingredient-input-btn" class="recipe-add-ingredient-btn" style="display: inline-block; padding: 6px 18px; background-color: rgba(154, 230, 171, 0.253); border-radius: 10px; box-shadow: 0px 2px 5px rgba(0, 0, 0, 0.3); color: rgb(7, 161, 97); text-decoration: none; cursor: pointer;">Add More Ingredients</a>
                    <button></button>
                </div>
                <div style="display: flex; justify-content: center;">
                    <div class = "block mt-1 w-50%">
                        {{Form::label('category_id', 'Category')}}
                        <div class="form-group">
                            {{Form::select('category_id', $categories->pluck("name", "id"), $recipe->category[0]->id, ['class'=>'form-control'])}}
                        </div>
                    </div>
                </div>
                <div style="display: flex; justify-content: center;">
                    <div class = "block mt-1 w-50%">
                        {{Form::label('cookmeth', 'Cooking Method')}}
                        <div class="form-group">
                            {{Form::text('cookmeth', $recipe->cooking_method, ['class'=>'form-control','placeholder'=>'', 'required'=>'required'])}}
                            @if ($errors->has('cookmeth'))
                                <span class="text-danger">{{ $errors->first('cookmeth') }}</span>
                            @endif
                        </div>
                    </div>
                </div>
                <div style="display: flex; justify-content: center;">
                    <div class = "block mt-1 w-50%">
                        {{Form::label('prep', 'Prep Time')}}
                        <div class="form-group">
                            {{Form::text('prep', $recipe->prep_time, ['class'=>'form-control','placeholder'=>'', 'required'=>'required'])}}
                            @if ($errors->has('prep'))
                                <span class="text-danger">{{ $errors->first('prep') }}</span>
                            @endif
                        </div>
                    </div>
                </div>
                <div style="display: flex; justify-content: center;">
                    <div class = "block mt-1 w-50%">
                        {{Form::label('serves', 'Serves')}}
                        <div class="form-group">
                            {{Form::text('serves', $recipe->serves, ['class'=>'form-control','placeholder'=>'', 'required'=>'required'])}}
                            @if ($errors->has('serves'))
                                <span class="text-danger">{{ $errors->first('serves') }}</span>
                            @endif
                        </div>
                    </div>
                </div>
                <div style="display: flex; justify-content: center;">
                    <div class = "block mt-1 w-50%">
                        <div class="card form-group">
                            {{Form::hidden('image', $recipe->image)}}
                            {{Form::file('image-new')}}
                            <img src="{{ asset("/storage/image_uploads/" . $recipe->image) }}" alt="{{ $recipe->description }} Image" class="recipe-image-edit-view" />
                        </div>
                    </div>
                </div>
                <div style="display: flex; justify-content: center;">
                    <div class = "block mt-1 w-50%">
                        <div class="form-group">
                            <a class="recipe-edit-btn" style="display: inline-block; padding: 6px 18px; background-color: rgba(154, 230, 171, 0.253); border-radius: 10px; box-shadow: 0px 2px 5px rgba(0, 0, 0, 0.3); color: rgb(7, 161, 97); text-decoration: none; cursor: pointer;">Submit</a>
                        </div>
                    </div>
                </div>
                {!! Form::close()!!}
            </div>
        </div>
        <script type="text/javascript">
            // using jquery to create shadow dom new element
            // This function creates a new row in the form for adding ingredients
            function newSection(idx) {
                // CSS styles for centering the content
                var new_section = $("<div style='display: flex; justify-content: center;'></div>"),
                    // Create a new div element with class "block mt-1 w-50%" to contain the input fields
                    sub_section = $("<div class = 'block mt-1 w-50%'></div>"),
                    // Create a new label element for the ingredient name input field
                    label_name = $("<label for='ingredients[" + idx + "][name]'>Name</label>");
                    // Create a new div class "form-group" to contain the fields
                    input_group = $("<div class='form-group'></div>");
                    // Create a new input field for the ingredient name
                    input_name = $("<input type='text' id='ingredients[" + idx + "][name]' name='ingredients[" + idx + "][name]' class='form-control' value='' />");
                    // Create a new label for ingredient quantity input
                    label_qty = $("<label for='ingredients[" + idx + "][quantity]'>Quantity</label>");
                    // Create new input field for the ingredient quantity
                    input_qty = $("<input type='text' id='ingredients[" + idx + "][quantity]' name='ingredients[" + idx + "][quantity]' class='form-control'  value='' />");
                // Add the name input field to the subsection
                // append the quantity input field to its input group, and append the input group to the quantity sub-section
                // append both sub-sections to the new section and return it
                return new_section.append(sub_section.clone().append(label_name)
                    .append(input_group.clone().append(input_name)))
                    .append(sub_section.clone().append(label_qty)
                    .append(input_group.clone().append(input_qty)));
            }

            // Initialize the index variable and create the first section of the form
            var idx = {{$recipe->ingredients->count()}};
            $(document).ready(function() {
                $(".recipe-edit-btn").on("click", function(e) {
                    e.preventDefault();
                    form = $(this).closest(".edit-recipe-form");
                    form.trigger("submit");
                });
                $("#add-ingredient-input-btn").on("click", function(e) {
                    // cap max amount of added rows at 10
                    e.preventDefault();
                    if(idx > 10) { return; }
                    // Add new ingredient section to the form increment the index variable
                    $("#ingredients-list").append(newSection(idx++));
                });
            });
        </script>
    </x-slot>
</x-app-layout>
