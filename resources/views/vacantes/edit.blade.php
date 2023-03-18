<x-app-layout>

    @if ($vacante->user_id != auth()->user()->id)
        <x-slot name="header">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                {{ __('No tiene Acceso a esta Ventana') }}
            </h2>
        </x-slot>
    @else
        <x-slot name="header">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                {{ __('Editar Vacante') }}
            </h2>
        </x-slot>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900 dark:text-gray-100">
                        <h1 class="text-3xl font-bold text-center my-10">
                            Editar Vacante : {{ $vacante->titulo }}
                        </h1>
                        <div class="md:flex md:justify-center p-5">
                            @livewire('editar-vacante', ['vacante' => $vacante])
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endif
</x-app-layout>