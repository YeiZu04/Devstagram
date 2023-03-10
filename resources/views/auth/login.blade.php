@extends('layouts.app')

@section('titulo', 'Iniciar sesión en DevStagram')

@section('contenido')

    <div class=" md:flex md:justify-center md:gap-10 md:items-center">
        <div class="md:w-6/12 p-5">
            <img src="{{ asset('img/login.jpg') }}" alt="Imagen inicio de sesion de usuarios">
        </div>

        <div class="md:w-4/12 bg-white p-6 rounded-lg shadow-xl">
            <form  method="POST" action="{{ route('login')}}" novalidate>
                @csrf

                @if (session('mensaje'))

                <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-2 text-center">
                    {{ session('mensaje') }}
                </p>
                    
                @endif
        
                <div class="mb-5">
                    <label for="email" class="mb-2 block uppercase text-gray-500 font-bold">
                        Email
                    </label>
                    <input 
                        type="text"
                        name="email"
                        id="email"
                        placeholder="Tu email de registro"
                        class="border p-3 w-full rounded-lg @error('name') border-red-500 @enderror"
                        value="{{old('email')}}"
                        >
                        @error('email')
                        <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-2 text-center">
                            {{$message}}
                        </p>
                        @enderror
                </div>
                <div class="mb-5">
                    <label for="password" class="mb-2 block uppercase text-gray-500 font-bold">
                        Password
                    </label>
                    <input 
                        type="password"
                        name="password"
                        id="password"
                        placeholder="Tu password de registro"
                        class="border p-3 w-full rounded-lg @error('name') border-red-500 @enderror"
                        >
                        @error('password')
                        <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-2 text-center">
                            {{$message}}
                        </p>
                        @enderror
                </div>


                <div class="mb-5">
                    <input type="checkbox" name="remember"> 
                    <label class="  text-gray-500  text-sm"  for="">Manter mi sesión iniciada</label> 
                </div>


                <input
                     type="submit"
                     value="Iniciar sesión"
                     class="bg-sky-600 hover:bg-sky-700 transition-colors 
                     cursor-pointer w-full p-3 text-white font-bold uppercase text-sm px-4 py-3 rounded-lg"
                    >

            </form>
        
        </div>
    
    </div>

@endsection