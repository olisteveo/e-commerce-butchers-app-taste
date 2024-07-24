<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ $title }}
        </h2>
    </x-slot>
    <x-slot name="slot">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg mb-2 mt-2">
            <div class="p-6 text-gray-900 rounded border-gray-300 shadow-sm focus:ring-indigo-500">
                {!! Form::open(['action'=>['App\Http\Controllers\Dashboard\Admin\UsersController@update', $user->id], 'method'=>'POST' , 'class' => 'edit-user-form']) !!}
                <div style="display: flex; justify-content: center;">
                    <div class = "block mt-1 w-50%">
                        {{Form::label('name', 'Name')}}
                        <div class="form-group">
                            {{Form::Hidden("users_id", $user->id)}}
                            {{Form::text('name', $user->name, ['class'=>'form-control', 'required'=>'required'])}}
                            @if ($errors->has('name'))
                                <span class="text-danger">{{ $errors->first('name') }}</span>
                            @endif
                        </div>
                    </div>
                </div>
                <div style="display: flex; justify-content: center;">
                    <div class = "block mt-1 w-50%">
                        {{Form::label('email', 'Email')}}
                        <div class="form-group">
                            {{Form::text('email', $user->email, ['class'=>'form-control', 'required'=>'required'])}}
                            @if ($errors->has('email'))
                                <span class="text-danger">{{ $errors->first('email') }}</span>
                            @endif
                        </div>
                    </div>
                </div>
                <div style="display: flex; justify-content: center;">
                    <div class = "block mt-1 w-50%">
                        <div class="form-group">
                            {{Form::submit('Submit', ['class'=>'user-edit-btn', 'style'=>'display: inline-block; padding: 6px 18px; background-color: rgba(154, 230, 171, 0.253); border-radius: 10px; box-shadow: 0px 2px 5px rgba(0, 0, 0, 0.3); color: rgb(7, 161, 97); text-decoration: none; cursor: pointer;'])}}
                        </div>
                    </div>
                </div>
                {!! Form::close()!!}
            </div>
        </div>
        <script type="text/javascript">
            $(document).ready(function() {
                $(".user-edit-btn").on("click", function(e) {
                    e.preventDefault();
                    form = $(this).closest(".edit-user-form");
                    form.trigger("submit");
                });
            });
        </script>
    </x-slot>
</x-app-layout>
