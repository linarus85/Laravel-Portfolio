<section>
    <header>
        <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
            {{ __('Социальные сети') }}
        </h2>
    </header>

    <form id="send-verification" method="post" action="{{ route('verification.send') }}">
        @csrf
    </form>

    <form method="post" action="{{ route('social.update',$social->id) }}" class="mt-6 space-y-6" enctype="multipart/form-data">
        @csrf
        @method('patch')
        <div>
            <x-input-label for="name" :value="__('Заголовок')" />
            <textarea name="name" placeholder="Добавь текст"
                class="block w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm">
            {{ old('name', $social->name) }}
             </textarea>
            <x-input-error class="mt-2" :messages="$errors->get('name')" />
        </div>
        <div>
            <x-input-label for="link" :value="__('link')" />
            <x-text-input id="link" name="link" type="text" class="mt-1 block w-full" :value="old('link',$social->link)" />
            <x-input-error class="mt-2" :messages="$errors->get('link')" />
        </div>
        <div class="flex items-center gap-4">
            <x-primary-button :href="route('social.index')">{{ __('Сохранить') }}</x-primary-button>
        </div>
    </form>
</section>
