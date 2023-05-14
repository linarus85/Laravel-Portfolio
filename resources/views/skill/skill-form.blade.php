<section>
    <header>
        <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
            {{ __('Добавь данные о скиллах') }}
        </h2>
    </header>

    <form id="send-verification" method="post" action="{{ route('verification.send') }}">
        @csrf
    </form>

    <form method="post" action="{{ route('skill.store') }}" class="mt-6 space-y-6" enctype="multipart/form-data">
        @csrf
        @method('post')

        <div>
            <x-input-label for="bigtitle" :value="__('Большой загловок')" />
            <textarea name="bigtitle" placeholder="Добавь текст"
                class="block w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm">
            {{ old('bigtitle') }}
             </textarea>
            <x-input-error class="mt-2" :messages="$errors->get('bigtitle')" />
        </div>
        <div>
            <x-input-label for="skilltitle" :value="__('Заголовок скилла')" />
            <x-text-input id="skilltitle" name="skilltitle" type="text" class="mt-1 block w-full" :value="old('skilltitle')" />
            <x-input-error class="mt-2" :messages="$errors->get('skilltitle')" />
        </div>
        <div>
            <x-input-label for="content" :value="__('Текст')" />
            <textarea name="content" placeholder="Добавь текст"
                class="block w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm">
            {{ old('content') }}
             </textarea>
            <x-input-error class="mt-2" :messages="$errors->get('content')" />
        </div>
        <div>
            <x-input-label for="text" :value="__('Текст скилла')" />
            <textarea name="text" placeholder="Добавь текст"
                class="block w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm">
            {{ old('text') }}
             </textarea>
            <x-input-error class="mt-2" :messages="$errors->get('text')" />
        </div>
        <div class="flex items-center gap-4">
            <x-primary-button :href="route('skill.index')">{{ __('Сохранить') }}</x-primary-button>
        </div>
    </form>
</section>
