{{-- wire:submit.prevents = nomnbre de la clase, esto para validar --}}
<form class="md:w-1/2 space-y-5" wire:submit.prevent='editarVacante'>
    <div>
        <x-input-label for="titulo" :value="__('Titulo de la Vacante')" />
        <x-text-input id="titulo" class="block mt-1 w-full" type="text" wire:model="titulo" :value="old('titulo')" placeholder="Titulo Vacante" autocomplete="username" />
        @error('titulo')
            @livewire('mostrar-alerta', ['mensaje' => $message])
        @enderror
    </div>

    <div>
        <x-input-label for="salario" :value="__('Salario Mensual')" />
        <select id="salario" 
            class="border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm w-full"
            type="select"
            wire:model="salario">
                <option value="">Seleccione un Salario</option>
                @foreach ($salarios as $salario)
                    <option value="{{ $salario->id }}">{{ $salario->salario }}</option>
                @endforeach
        </select>
        @error('salario')
            @livewire('mostrar-alerta', ['mensaje' => $message])
        @enderror
    </div>

    <div>
        <x-input-label for="categoria" :value="__('Categoria')" />
        <select id="categoria" 
            class="border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm w-full"
            type="select"
            wire:model="categoria">
                <option value="">Seleccione una Categoria</option>
                @foreach ($categorias as $categoria)
                    <option value="{{ $categoria->id }}">{{ $categoria->categoria }}</option>
                @endforeach
        </select>
        @error('categoria')
            @livewire('mostrar-alerta', ['mensaje' => $message])
        @enderror
    </div>

    <div>
        <x-input-label for="empresa" :value="__('Empresa')" />
        <x-text-input id="empresa" class="block mt-1 w-full" type="text" wire:model="empresa" :value="old('empresa')" placeholder="Netflix,etc" autocomplete="empresa" />
        @error('empresa')
            @livewire('mostrar-alerta', ['mensaje' => $message])
        @enderror
    </div>
    
    <div>
        <x-input-label for="ultimo_dia" :value="__('Ultimo dia de Postulacion')" />
        <x-text-input id="ultimo_dia" class="block mt-1 w-full" type="date" wire:model="ultimo_dia" :value="old('ultimo_dia')" autocomplete="empresa" />
        @error('ultimo_dia')
            @livewire('mostrar-alerta', ['mensaje' => $message])
        @enderror
    </div>

    <div>
        <x-input-label for="descripcion" :value="__('Descripcion del Puesto')" />
        <textarea wire:model="descripcion" placeholder="Descripcion General del Puesto" class="border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm w-full h-72 resize-none" id="descripcion" cols="30" rows="10"></textarea>
        @error('descripcion')
            @livewire('mostrar-alerta', ['mensaje' => $message])
        @enderror
    </div>

    <div>
        <x-input-label for="imagen" :value="__('Imagen')" />
        <x-text-input id="imagen" class="block mt-1 w-full" type="file" wire:model="imagen_nueva"  autocomplete="username" accept="image/*"/>
        
        {{-- Mostrar una Preview de la Imagen --}}
        <div class="my-5">
            @if($imagen_nueva)
                Imagen:
                <img src="{{ $imagen_nueva->temporaryUrl() }}" alt="">
            @else
                <div class="my-5 w-80">
                    <x-input-label for="imagen" :value="__('Imagen Actual')" />
                    <img src="{{ asset('storage/vacantes/' . $imagen) }}" alt="{{ 'Imagen Vacante :' . $titulo }}">
                </div>
            @endif
        </div>
        
        @error('imagen_nueva')
            @livewire('mostrar-alerta', ['mensaje' => $message])
        @enderror
    </div>

    <x-primary-button class="w-full">
        {{ __('Guardar Cambios') }}
    </x-primary-button>
</form>