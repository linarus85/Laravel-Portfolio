<section>
    <header>
        <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
            {{ __('Добавь данные в шапку сайта') }}
        </h2>
    </header>

    <form id="send-verification" method="post" action="{{ route('verification.send') }}">
        @csrf
    </form>

    <form method="post" action="{{ route('about.store') }}" class="mt-6 space-y-6" enctype="multipart/form-data">
        @csrf
        @method('post')

        <div>
            <x-input-label for="image" :value="__('Выбать изоброжение')"/>
                   <input class="mt-3" type="file" id="image" name="image" />
            <x-input-error class="mt-2" :messages="$errors->get('image')" />
        </div>
        <div>
            <x-input-label for="bigtitle" :value="__('Большой загловок')" />
            <textarea name="bigtitle" placeholder="Добавь текст"
                class="block w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm">
            {{ old('bigtitle') }}
             </textarea>
            <x-input-error class="mt-2" :messages="$errors->get('bigtitle')" />
        </div>
        <div>
            <x-input-label for="title" :value="__('Заголовок')" />
            <x-text-input id="title" name="title" type="text" class="mt-1 block w-full" :value="old('title')" />
            <x-input-error class="mt-2" :messages="$errors->get('title')" />
        </div>
        <div>
            <x-input-label for="content" :value="__('Текст')" />
            <textarea name="content" placeholder="Добавь текст"
                class="block w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm">
            {{ old('content') }}
             </textarea>
            <x-input-error class="mt-2" :messages="$errors->get('bigtitle')" />
        </div>
        <div class="flex items-center gap-4">
            <x-primary-button :href="route('about.index')">{{ __('Сохранить') }}</x-primary-button>
        </div>
    </form>
</section>
