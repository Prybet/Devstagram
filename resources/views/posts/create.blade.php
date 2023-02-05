@extends('layouts.app')

@section('title')
    Nuevo Post
@endsection

@push('styles')
    <link rel="stylesheet" href="https://unpkg.com/dropzone@5/dist/min/dropzone.min.css" type="text/css" />
@endpush


@section('content')
    <div class="md:flex md:items-center">
        <div class="md:w-1/2 px-10">

            <form id="dropzone" action="{{ route('images.store') }}" method="POST" enctype="multipart/form-data"
                class="dropzone border-dashed border-2 w-full h-96 rounded flex flex-col justify-center items-center">
                @csrf
            </form>

        </div>

        <div class="md:w-1/2 p-10 bg-white rounded-lg shadow-xl mt-10 md:mt-0">

            <form action="{{ route('posts.store') }}" method="POST" novalidate>
                @csrf
                <div class="mb-5">
                    <label class="mb-2 block uppercase text-gray-500 font-bold" for="title">
                        Titulo
                    </label>
                    <input id="title" name="title" type="text" placeholder="Titulo de la Publicación"
                        class="border p-3 w-full rounded-lg @error('titile') border-red-500 @enderror"
                        value="{{ @old('title') }}">
                    @error('title')
                        <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-2 text-center">
                            {{ $message }}
                        </p>
                    @enderror
                </div>

                <div class="mb-5">
                    <label class="mb-2 block uppercase text-gray-500 font-bold" for="description">
                        Descripción
                    </label>
                    <textarea id="description" name="description" type="text" placeholder="Descripción de la Publicación"
                        class="border p-3 w-full rounded-lg @error('description') border-red-500 @enderror">{{ @old('description') }}</textarea>
                    @error('description')
                        <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-2 text-center">
                            {{ $message }}
                        </p>
                    @enderror
                </div>
                <div class="mb-5">
                    <input name="image" type="hidden" value="{{@old('image')}}">
                    @error('image')
                        <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-2 text-center">
                            {{ $message }}
                        </p>
                    @enderror
                </div>
                <input type="submit" value="Crear Publicación"
                    class="bg-sky-600 hover:bg-sky-700 transition-colors
                uppercase font-bold w-full p-3 text-white rounded-lg">

            </form>

        </div>
    </div>
@endsection
