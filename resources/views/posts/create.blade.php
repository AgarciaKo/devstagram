@extends('layouts.app')

@section('titulo')
    Crear nueva Publicación
@endsection

@section('contenido')
    <div class="md:flex md:items-center">
        <div class="md:w-1/2 px-10">
            imagen
        </div>

        <div class="md:w-1/2 px-10">
            <div class="bg-white p-6 rounded-lg shadow-xl mt-10 md:mt-0">
                <form action="{{ route('register') }}" method="POST" novalidate>
                    @csrf
                    <div class="mb-5">
                        <label for="titulo" class="mb-2 block uppercase text-gray-500 font-bold">
                            Título
                        </label>
                        <input
                            id="titulo"
                            name="titulo"
                            type="text"
                            placeholder="Título de la publicación"
                            class="border p-3 w-full rounded-lg @error('titulo') border-red-500 @enderror"
                            value="{{ old('titulo') }}"
                        />
    
                        @error('titulo')
                            <p class="bg-red-500 text-white my-1 rounded-md text-sm p-2 text-center">
                                {{ $message }}
                            </p>
                        @enderror
    
                    </div>   

                    <div class="mb-5">
                        <label for="descripcion" class="mb-2 block uppercase text-gray-500 font-bold">
                            Descripción
                        </label>
                        <textarea
                            id="descripcion"
                            name="descripcion"
                            type="text"
                            placeholder="Descripción de la publicación"
                            class="border p-3 w-full rounded-lg @error('descripcion') border-red-500 @enderror"
                        >{{ old('descripcion') }}</textarea>
    
                        @error('descripcion')
                            <p class="bg-red-500 text-white my-1 rounded-md text-sm p-2 text-center">
                                {{ $message }}
                            </p>
                        @enderror
    
                    </div>   

                    <input
                        type="submit"
                        value="Publicar"
                        class="bg-sky-600 hover:bg-sky-700 transition-colors cursor-pointer uppercase font-bold w-full p-3 text-white rounded-lg"
                    />
                </form>
            </div>
        </div>
    </div>
@endsection