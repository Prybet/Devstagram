@extends('layouts.app')

@section('title')
    Regístrate en Devstagram!!
@endsection


@section('content')
    <div class="md:flex md:justify-center md:gap-10 md:items-center">
        <div class="md:w-6/12 p-5">
            <img src="{{ asset("img/register.jpg") }}" alt="singin image">
        </div>

        <div class="md:w-4/12 bg-white p-6 rounded-lg shadow-xl">
            <form action="/create-account" method="POST" >
                @csrf
                <div class="mb-5">
                    <label class="mb-2 block uppercase text-gray-500 font-bold" for="name">
                        Nombre
                    </label>
                    <input id="name" name="name" type="text" placeholder="Tu Nombre"
                        class="border p-3 w-full rounded-lg">
                </div>
                <div class="mb-5">
                    <label class="mb-2 block uppercase text-gray-500 font-bold" for="username">
                        Nombre de Usuario
                    </label>
                    <input id="username" name="username" type="text" placeholder="Tu Nombre de Usuario"
                        class="border p-3 w-full rounded-lg">
                </div>
                <div class="mb-5">
                    <label class="mb-2 block uppercase text-gray-500  font-bold" for="email">
                        Email
                    </label>
                    <input id="email" name="email" type="email" placeholder="Tu Email de Registro"
                        class="border p-3 w-full rounded-lg">
                </div>
                <div class="mb-5">
                    <label class="mb-2 block uppercase text-gray-500 font-bold" for="password">
                        Contraseña
                    </label>
                    <input id="password" name="password" type="password" placeholder="Contraseña de Registro"
                        class="border p-3 w-full rounded-lg">
                </div>
                <div class="mb-5">
                    <label class="mb-2 block uppercase text-gray-500 font-bold" for="password_confirmation">
                        Repetir Contraseña
                    </label>
                    <input id="password_confirmation" name="password_confirmation" type="password"
                        placeholder="Repite tu Contraseña" class="border p-3 w-full rounded-lg">
                </div>

                <input type="submit" value="Crear Cuenta"
                    class="bg-sky-600 hover:bg-sky-700 transition-colors
                uppercase font-bold w-full p-3 text-white rounded-lg">
            </form>
        </div>
    </div>
@endsection
