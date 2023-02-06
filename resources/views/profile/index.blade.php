@extends('layouts.app')

@section('title')
    Editar Perfil {{ auth()->user()->username }}
@endsection

@section('content')
    <div class="md:flex md:justify-center">
        <div class="md:w-1/2 bg-white shadow p-6">
            @if (session('message'))
                <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-2 text-center">
                    {{ session('message') }}
                </p>
            @endif
            <form action="{{ route('profile.store') }}" method="POST" enctype="multipart/form-data" class="mt-10 md:mt-0">
                @csrf
                <div class="mb-5">
                    <label class="mb-2 block uppercase text-gray-500 font-bold" for="name">
                        Username
                    </label>
                    <input id="username" name="username" type="text" placeholder="Tu Nombre de Usuario"
                        class="border p-3 w-full rounded-lg @error('username') border-red-500 @enderror"
                        value="{{ auth()->user()->username }}">
                    @error('username')
                        <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-2 text-center">
                            {{ $message }}
                        </p>
                    @enderror


                </div>
                <div class="mb-5">
                    <label class="mb-2 block uppercase text-gray-500 font-bold" for="name">
                        Email
                    </label>
                    <input id="email" name="email" type="text" placeholder="Tu Email"
                        class="border p-3 w-full rounded-lg @error('email') border-red-500 @enderror"
                        value="{{ auth()->user()->email }}">
                    @error('email')
                        <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-2 text-center">
                            {{ $message }}
                        </p>
                    @enderror

                </div>
                <div class="mb-5">
                    <label class="mb-2 block uppercase text-gray-500 font-bold" for="image">
                        Imagen Perfil
                    </label>
                    <input id="image" name="image" type="file" class="border p-3 w-full rounded-lg" value=""
                        accept=".jpg, .jpeg, .png, .gif" />
                </div>
                <div class="mb-5">
                    <label class="mb-2 block uppercase text-gray-500 font-bold" for="new_password">
                        Nueva contraseña
                    </label>
                    <input id="new_password" name="new_password" type="password" placeholder="Nueva Contraseña"
                        class="border p-3 w-full rounded-lg @error('new_password') border-red-500 @enderror">
                    @error('new_password')
                        <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-2 text-center">
                            {{ $message }}
                        </p>
                    @enderror
                </div>
                <div class="mb-5">
                    <label class="mb-2 block uppercase text-gray-500 font-bold" for="password">
                        Contraseña antigua
                    </label>
                    <input id="password" name="password" type="password" placeholder="Contraseña de Registro"
                        class="border p-3 w-full rounded-lg @error('password') border-red-500 @enderror">
                    @error('password')
                        <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-2 text-center">
                            {{ $message }}
                        </p>
                    @enderror
                </div>
                <input type="submit" value="Enviar Cambios"
                    class="bg-sky-600 hover:bg-sky-700 transition-colors
                uppercase font-bold w-full p-3 text-white rounded-lg">
            </form>
        </div>
    </div>
@endsection
