<section>
    <header>
        <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
            {{ __('Изменить данные о работе') }}
        </h2>
    </header>

    <form id="send-verification" method="post" action="{{ route('verification.send') }}">
        @csrf
    </form>

    <form method="post" action="{{ route('work.update', $work->id) }}" class="mt-6 space-y-6" enctype="multipart/form-data">
        @csrf
        @method('patch')

        <div>
            <x-input-label for="image" />
            <label class="block mt-2">
                <span class="sr-only">Выбать изоброжение</span>
                <input type="file" id="image" name="image" />
            </label>
            <x-input-error class="mt-2" :messages="$errors->get('image')" />
        </div>
        <div>
            <x-input-label for="bigtitle" :value="__('Большой заголовок')" />
            <textarea name="bigtitle" placeholder="Добавь текст"
                class="block w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm">
            {{ old('bigtitle', $work->bigtitle) }}
             </textarea>
            <x-input-error class="mt-2" :messages="$errors->get('bigtitle')" />
        </div>
        <div>
            <x-input-label for="title" :value="__('Заголовок')" />
            <textarea name="title" placeholder="Добавь текст"
                class="block w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm">
            {{ old('title', $work->title) }}
             </textarea>
            <x-input-error class="mt-2" :messages="$errors->get('title')" />
        </div>
        <div>
            <x-input-label for="description" :value="__('Описание')" />
            <textarea name="description" placeholder="Добавь текст"
                class="block w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm">
            {{ old('description', $work->description) }}
             </textarea>
            <x-input-error class="mt-2" :messages="$errors->get('description')" />
        </div>
        <div>
            <x-input-label for="program" :value="__('Программа')" />
            <x-text-input id="program" name="program" type="text" class="mt-1 block w-full" :value="old('program', $work->program)" />
            <x-input-error class="mt-2" :messages="$errors->get('program')" />
        </div>
        <div>
            <x-input-label for="link" :value="__('Ссылка')" />
            <x-text-input id="link" name="link" type="text" class="mt-1 block w-full" :value="old('link', $work->link)" />
            <x-input-error class="mt-2" :messages="$errors->get('link')" />
        </div>

        <div class="flex items-center gap-4">
            <x-primary-button :href="route('work.index')">{{ __('Сохранить') }}</x-primary-button>
        </div>
    </form>
</section>
