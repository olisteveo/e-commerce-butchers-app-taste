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
                    {{ __("Catagory create") }}
                </h2>
            </div>
        </div>
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg mb-2 mt-2">
            <div class="p-6 text-gray-900 rounded border-gray-300 shadow-sm focus:ring-indigo-500">
                {!! Form::open(['action'=>'App\Http\Controllers\Dashboard\Admin\CategoryController@store', 'method'=>'POST' , 'class' => 'create-catagory-form']) !!}
                <div style="display: flex; justify-content: center;">
                    <div class = "block mt-1 w-50%">
                        {{Form::label('name', 'Name')}}
                        <div class="form-group">
                            {{Form::text('name', '', ['class'=>'form-control','placeholder'=>'', 'required'=>'required'])}}
                            @if ($errors->has('name'))
                                <span class="text-danger">{{ $errors->first('name') }}</span>
                            @endif
                        </div>
                    </div>
                </div>
                <div style="display: flex; justify-content: center;">
                    <div class = "block mt-1 w-50%">
                        {{Form::label('desc', 'Description')}}
                        <div class="form-group">
                            {{Form::text('desc', '', ['class'=>'form-control','placeholder'=>'', 'required'=>'required'])}}
                            @if ($errors->has('desc'))
                                <span class="text-danger">{{ $errors->first('desc') }}</span>
                            @endif
                        </div>
                    </div>
                </div>
                <div style="display: flex; justify-content: center;">
                    <div class = "block mt-1 w-50%">
                        <div class="form-group">
                            <a class="catagory-create-btn" style="display: inline-block; padding: 6px 18px; background-color: rgba(154, 230, 171, 0.253); border-radius: 10px; box-shadow: 0px 2px 5px rgba(0, 0, 0, 0.3); color: rgb(7, 161, 97); text-decoration: none; cursor: pointer;">Submit</a>
                        </div>
                    </div>
                </div>
                {!! Form::close()!!}
            </div>
        </div>
        <script type="text/javascript">
            $(document).ready(function() {
                $(".catagory-create-btn").on("click", function(e) {
                    e.preventDefault();
                    form = $(this).closest(".create-catagory-form");
                    form.trigger("submit");
                });
            });
        </script>
    </x-slot>
</x-app-layout>
