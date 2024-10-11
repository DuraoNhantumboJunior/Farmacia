<section>
    <header>
        <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
            {{ __('Informações do Fornecedor') }}
        </h2>
        
    </header>

    <form id="send-verification" method="post" action="{{ route('verification.send') }}">
        @csrf
    </form>

    <form method="post" action="{{ route('profile.update') }}" class="mt-6 space-y-6">
        @csrf
        @method('put')

        <div class="flex flex-wrap -mx-3">
            <div class="w-full sm:w-1/2 px-3 py-3">
                <x-input-label for="name" :value="__('Nome:')" />
                <x-text-input id="name" name="name" type="text" class="mt-1 block w-full" :value="old('name')" required autofocus autocomplete="name" />
                <x-input-error class="mt-2" :messages="$errors->get('name')" />
            </div>

            <div class="w-full sm:w-1/2 px-3 py-3">
                <x-input-label for="email" :value="__('Email:')" />
                <x-text-input id="email" name="email" type="email" class="mt-1 block w-full" :value="old('email')" required autocomplete="username" disabled="true"/>
                <x-input-error class="mt-2" :messages="$errors->get('email')" />
            </div>

            <div class="w-full sm:w-1/2 px-3 py-3">
                <x-input-label for="cell" :value="__('Contacto:')" />
                <x-text-input id="cell" name="cell" type="text" class="mt-1 block w-full read-only:true" :value="old('cell')" required autofocus autocomplete="cell" disabled="true" />
                <x-input-error class="mt-2" :messages="$errors->get('cell')" />
            </div>

            <div class="w-full sm:w-1/2 px-3 py-3">
                <x-input-label for="nuit" :value="__('NUIT')" />
                <x-text-input id="nuit" name="nuit" type="text" class="mt-1 block w-full" :value="old('nuit')" required autofocus autocomplete="nuit" disabled="true"/>
                <x-input-error class="mt-2" :messages="$errors->get('nuit')" />
            </div>

            <div class="w-full sm:w-1/2 px-3 py-3">
                <x-input-label for="nuit" :value="__('Endereço:')" />
                <x-text-input id="nuit" name="nuit" type="text" class="mt-1 block w-full" :value="old('endereco')" required autofocus autocomplete="nuit" disabled="true"/>
                <x-input-error class="mt-2" :messages="$errors->get('endereco')" />
            </div>
        </div>

    </form>
    
</section>

