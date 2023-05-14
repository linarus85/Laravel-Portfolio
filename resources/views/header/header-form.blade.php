<section>
    <header>
        <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
            {{ __('Добавь данные в шапку сайта') }}
        </h2>
    </header>

    <form id="send-verification" method="post" action="{{ route('verification.send') }}">
        @csrf
    </form>

    <form method="post" action="{{ route('header.store') }}" class="mt-6 space-y-6" enctype="multipart/form-data">
        @csrf
        @method('post')

        <div>
            <x-input-label for="image" />
            <label class="block mt-2">
                <span class="sr-only">Выбать изоброжение</span>
                <input type="file" id="image" name="image" />
            </label>
            <x-input-error class="mt-2" :messages="$errors->get('image')" />
        </div>
        <div>
            <x-input-label for="title" :value="__('Текс')" />
            <textarea name="title" placeholder="Добавь текст"
                class="block w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm">
            {{ old('title') }}
             </textarea>
            <x-input-error class="mt-2" :messages="$errors->get('title')" />
        </div>
        <div>
            <x-input-label for="icon" :value="__('Ссылка на иконку')" />
            <x-text-input id="icon" name="icon" type="text" class="mt-1 block w-full" :value="old('icon')" />
            <x-input-error class="mt-2" :messages="$errors->get('icon')" />
        </div>

        <div class="flex items-center gap-4">
            <x-primary-button :href="route('header.index')">{{ __('Сохранить') }}</x-primary-button>
        </div>
    </form>
</section>
