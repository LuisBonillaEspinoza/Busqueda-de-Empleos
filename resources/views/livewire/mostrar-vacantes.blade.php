<div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
    @if (count($vacantes) > 0)
        @foreach ($vacantes as $vacante)
        <div class="p-6 text-gray-900 dark:text-gray-100 md:flex md:justify-between md:items-center">
            <div class="space-y-2">
                <a href="" class="text-xl font-bold">{{ $vacante->titulo }}</a>
                <p class="text-sm text-gray-600 font-bold">{{ $vacante->empresa }}</p>
                {{-- Modificar para obtener un formato de fecha --}}
                <p class="text-sm text-gray-500">Ultimo dia : {{ Carbon\Carbon::parse( $vacante->ultimo_dia)->format('d/m/Y') }}</p>
            </div>
        
            <div class="flex flex-col md:flex-row gap-3 items-strech mt-5 md:mt-0">
                <a href="" class="bg-green-200 py-2 px-4 rounded-lg text-red-400 text-xs font-bold uppercase text-center">
                    Candidatos
                </a>
                <a href="{{ route('vacantes.edit',$vacante) }}" class="bg-blue-300 py-2 px-4 rounded-lg text-red-400 text-xs font-bold uppercase text-center">
                    Editar
                </a>
                <a href="" class="bg-red-400 py-2 px-4 rounded-lg text-white text-xs font-bold uppercase text-center">
                    Eliminar
                </a>
            </div>

        </div>
        @endforeach

    @else
        <p class="p-3 text-center text-sm text-gray-600">No existen Vacantes</p>
    @endif
</div>

<div class=" mt-10">
    {{ $vacantes->links() }}
</div>