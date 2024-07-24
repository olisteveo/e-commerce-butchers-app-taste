<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ $title }}
        </h2>
    </x-slot>
    <x-slot name="slot">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg mb-2 mt-2">
            <div class="p-6 text-gray-900 rounded border-gray-300 shadow-sm focus:ring-indigo-500">
                {!! Form::open(['action'=>['App\Http\Controllers\Dashboard\Admin\PagesController@update', $page->id], 'method'=>'POST' , 'class' => 'edit-page-form']) !!}
                <div style="display: flex; justify-content: center;">
                    <div class = "block mt-1 w-50%">
                        {{Form::label('name', 'Name')}}
                        <div class="form-group">
                            {{Form::Hidden("page_id", $page->id)}}
                            {{Form::text('title', $page->title, ['class'=>'form-control','placeholder'=>'Name', 'required'=>'required'])}}
                            @if ($errors->has('title'))
                                <span class="text-danger">{{ $errors->first('title') }}</span>
                            @endif
                        </div>
                    </div>
                </div>
                <div style="display: flex; justify-content: center;">
                    <div class = "block mt-1 w-50%">
                        {{Form::label('content', 'Content')}}
                        <div class="form-group">
                            {{Form::textarea('content', $page->content, ['id' => 'page-content', 'class'=>'form-control','placeholder'=>'Content', 'required'=>'required'])}}
                            @if ($errors->has('content'))
                                <span class="text-danger">{{ $errors->first('content') }}</span>
                            @endif
                        </div>
                    </div>
                </div>
                <div style="display: flex; justify-content: center;">
                    <div class = "block mt-1 w-50%">
                        <div class="form-group">
                            {{Form::submit('Update', ['class'=>'page-edit-btn', 'style'=>'display: inline-block; padding: 6px 18px; background-color: rgba(154, 230, 171, 0.253); border-radius: 10px; box-shadow: 0px 2px 5px rgba(0, 0, 0, 0.3); color: rgb(7, 161, 97); text-decoration: none; cursor: pointer;'])}}
                        </div>
                    </div>
                </div>
                {!! Form::close()!!}
            </div>
        </div>
        <script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>
        <script src="https://cdn.jsdelivr.net/npm/@tinymce/tinymce-jquery@1/dist/tinymce-jquery.min.js"></script>
        <script type="text/javascript">
            $(document).ready(function() {
                $('textarea#page-content').tinymce({
                    height: 500,
                    menubar: false,
                    plugins: [
                    'a11ychecker','advlist','advcode','advtable','autolink','checklist','export',
                    'lists','link','image','charmap','preview','anchor','searchreplace','visualblocks',
                    'powerpaste','fullscreen','formatpainter','insertdatetime','media','table','help','wordcount'
                    ],
                    toolbar: 'undo redo | a11ycheck casechange blocks | bold italic backcolor | alignleft aligncenter alignright alignjustify | bullist numlist checklist outdent indent | removeformat | code table help'
                });
                $(".page-edit-btn").on("click", function(e) {
                    e.preventDefault();
                    form = $(this).closest(".edit-page-form");
                    form.trigger("submit");
                });
            });
        </script>
    </x-slot>
</x-app-layout>
