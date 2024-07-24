<x-app-layout>
    <x-slot name="header" style="margin-bottom: 100px;">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ $title }}
        </h2>
    </x-slot>
    <x-slot name="slot">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-4 sm:p-8 bg-white text-white-500 shadow sm:rounded-lg mb-3 mt-3">
                <div class="p-6 text-gray-900">
                    <h2 class="text-lg text-center font-medium text-gray-900">
                    {{ __("Upload Your Recipes Here") }}
                    </h2>
                </div>
           </div>
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg mb-2 mt-2">
            <div class="p-6 text-gray-900 rounded border-gray-300 shadow-sm focus:ring-indigo-500">
                {!! Form::open(['action'=>'App\Http\Controllers\Dashboard\RecipeController@store', 'method'=>'POST' ,'enctype' => 'multipart/form-data', 'class' => 'create-recipe-form']) !!}
                <div style="display: flex; justify-content: center;">
                    <div class = "block mt-3 w-100%">
                        {{Form::label('title', 'Title')}}
                        <div class="form-group">
                            {{Form::text('title', '', ['class'=>'form-control','placeholder'=>'', 'required'=>'required'])}}
                            @if ($errors->has('title'))
                                <span class="text-danger">{{ $errors->first('title') }}</span>
                            @endif
                        </div>
                    </div>
                </div>
                <div style="display: flex; justify-content: center;">
                    <div class = "block mt-1 w-100%">
                        {{Form::label('desc', 'Description')}}
                        <div class="form-group">
                            {{Form::textarea('desc', '', ['class'=>'form-control','placeholder'=>'', 'required'=>'required'])}}
                            <br />
                            <span class="text muted">* Supports plain text only</span>
                            @if ($errors->has('desc'))
                                <span class="text-danger">{{ $errors->first('desc') }}</span>
                            @endif
                        </div>
                    </div>
                </div>
                <div style="display: flex; justify-content: center;">
                    <div class = "block mt-1 w-100%">
                        {{Form::label('category_id', 'Category')}}
                        <div class="form-group">
                            {{Form::select('category_id', $categories->pluck("name", "id"), ['class'=>'form-control'])}}
                        </div>
                    </div>
                </div>
                    <fieldset id="ingredients-list" class="border border-solid border-gray-300 p-3" style="display: flex; justify-content: center; flex-direction:column">
                        <legend class="text-m pl-3 pr-4">Ingredients</legend>
                        <div style='display: flex; justify-content: center;'>
                            <div class = "block mt-1 w-50%">
                                <label for="ingredients[0][name]">Name</label>
                                <div class="form-group">
                                    <input type="text" id="ingredients[0][name]" name="ingredients[0][name]" class="form-control" value="" placeholder="eg. Carrots" />
                                </div>
                            </div>
                            <div class = "block mt-1 w-50%">
                                <label for="ingredients[0][quantity]">Quantity</label>
                                <div class="form-group">
                                    <input type="text" id="ingredients[0][quantity]" name="ingredients[0][quantity]" class="form-control"  value="" placeholder="eg. 8" />
                                </div>
                            </div>
                        </div>
                    </fieldset>
                <div style="display: flex; justify-content: center; margin-top:15px">
                    <a id="add-ingredient-input-btn" class="recipe-add-ingredient-btn" style="display: inline-block; padding: 6px 18px; background-color: rgba(154, 230, 171, 0.253); border-radius: 10px; box-shadow: 0px 2px 5px rgba(0, 0, 0, 0.3); color: rgb(7, 161, 97); text-decoration: none; cursor: pointer;">Add More Ingredients</a>
                </div>
                <div style="display: flex; justify-content: center;">
                    <div class = "block mt-1 w-100%">
                        {{Form::label('cookmeth', 'Cooking Method')}}
                        <div class="form-group">
                            {{Form::text('cookmeth', '', ['class'=>'form-control','placeholder'=>'', 'required'=>'required'])}}
                            @if ($errors->has('cookmeth'))
                                <span class="text-danger">{{ $errors->first('cookmeth') }}</span>
                            @endif
                        </div>
                    </div>
                </div>
                <div style="display: flex; justify-content: center;">
                    <div class = "block mt-1 w-100%">
                        {{Form::label('prep', 'Prep Time')}}
                        <div class="form-group">
                            {{Form::text('prep', '', ['class'=>'form-control','placeholder'=>'eg. 20 Minutes', 'required'=>'required'])}}
                            @if ($errors->has('prep'))
                                <span class="text-danger">{{ $errors->first('prep') }}</span>
                            @endif
                        </div>
                    </div>
                </div>
                <div style="display: flex; justify-content: center;">
                    <div class = "block mt-1 w-100%">
                        {{Form::label('serves', 'Serves')}}
                        <div class="form-group">
                            {{Form::text('serves', '', ['class'=>'form-control','placeholder'=>'eg. 4', 'required'=>'required'])}}
                            @if ($errors->has('serves'))
                                <span class="text-danger">{{ $errors->first('serves') }}</span>
                            @endif
                        </div>
                    </div>
                </div>
                <div style="display: flex; justify-content: center;">
                    <div class = "block mt-1 w-100%">
                        <h3>Upload Recipe Image</h3>
                        <div class="form-group">
                            {{Form::file('image')}}
                        </div>
                    </div>
                </div>
                <div style="display: flex; justify-content: center; margin-top:15px">
                    <div class = "block mt-1 w-100%">
                        <a class="recipe-create-btn" style="display: inline-block; padding: 6px 18px; background-color: rgba(154, 230, 171, 0.253); border-radius: 10px; box-shadow: 0px 2px 5px rgba(0, 0, 0, 0.3); color: rgb(7, 161, 97); text-decoration: none; cursor: pointer;">Submit</a>
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
            var idx = 1,
                _html = newSection(idx);

            // Log the HTML of the first section to the console
            console.log($(_html));

            // Wait for the document to be ready, then add a new ingredient section when the "Add Ingredient" button is clicked
            $(document).ready(function() {
                $("#add-ingredient-input-btn").on("click", function(e) {
                    e.preventDefault();
                    // cap max rows at 10
                    if(idx > 10) { return; }
                    // Add new ingredient section to the form increment the index variable
                    $("#ingredients-list").append(newSection(idx++));
                });
                $(".recipe-create-btn").on("click", function(e) {
                    e.preventDefault();
                    form = $(this).closest(".create-recipe-form");
                    form.trigger("submit");
                });
            });
        </script>
    </x-slot>
</x-app-layout>
