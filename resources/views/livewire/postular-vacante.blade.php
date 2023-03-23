<div class="bg-white p-5 mt-10 flex flex-col justify-center items-center rounded-md">
    <h3 class="text-center text-2xl font-bold my-4">Postularme a esta vacante</h3>

    <form action="" class="w-96 mt-5">
        <div class="mb-4">
            <x-input-label for="cv" :value="__('Curriculum u Hoja de Vida')"/>
            <x-text-input for="cv" type="file" accept=".pdf" class="block mt-1 w-full" />
        </div>

        <x-primary-button class="my-5">
            {{ __('Postular') }}
        </x-primary-button>
    </form>
</div>
