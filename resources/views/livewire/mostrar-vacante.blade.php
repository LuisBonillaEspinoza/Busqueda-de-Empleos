<div class="p-3">
    <div class="mb-5">
        <h3 class="font-bold text-3xl text-white my-3">
            {{ $vacante->titulo }}
        </h3>

        <div class="md:grid md:grid-cols-2 bg-green-50 p-4 my-10 rounded-md">
            <div>
                <p class="font-bold text-sm uppercase text-gray-500 my-3">Empresa :
                    <span class="normal-case font-normal">{{ $vacante->empresa }}</span>
                </p>
            </div>
    
            <div>
                <p class="font-bold text-sm uppercase text-gray-500 my-3">Ultimo Dia :
                    <span class="normal-case font-normal">{{ Carbon\Carbon::parse( $vacante->ultimo_dia)->formatLocalized('%d, %B %Y') }}</span>
                </p>
            </div>
    
            <div>
                <p class="font-bold text-sm uppercase text-gray-500 my-3">Categoria :
                    <span class="normal-case font-normal">{{ $vacante->categoria->categoria }}</span>
                </p>
            </div>
    
            <div>
                <p class="font-bold text-sm uppercase text-gray-500 my-3">Categoria :
                    <span class="normal-case font-normal">{{ $vacante->salario->salario }}</span>
                </p>
            </div>
        </div>
    </div>

    <div class="md:grid md:grid-cols-6 bg-green-50 p-4 my-10 rounded-md gap-4">
        <div class="md:col-span-2">
            <img src="{{ asset('storage/vacantes/' . $vacante->imagen) }}" alt="{{ $vacante->titulo }}" class="rounded-md">
        </div>

        <div class="md:col-span-4">
            <h2 class="text-2xl font-bold mb-5">Descripcion del Puesto</h2>
            <p>{{ $vacante->descripcion }}</p>
        </div>
    </div>
</div>
