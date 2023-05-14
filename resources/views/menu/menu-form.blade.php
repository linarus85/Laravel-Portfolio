<section>
    <header>
        <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
            {{ __('Добавь меню') }}
        </h2>

        <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
            {{ __("Поле <место на сайте> Должен содержать из перечисленных вариантов:
                                                hero,about,services,portfolio,footer") }}
        </p>
    </header>

    <form id="send-verification" method="post" action="{{ route('verification.send') }}">
        @csrf
    </form>

    <form method="post" action="{{ route('menu.store') }}" class="mt-6 space-y-6">
        @csrf
        @method('post')

        <div>
            <x-input-label for="scroll" :value="__('Место на сайте')" />
            <x-text-input id="scroll" name="scroll" type="text" class="mt-1 block w-full" :value="old('scroll')" />
            <x-input-error class="mt-2" :messages="$errors->get('srooll')" />
        </div>

        <div>
            <x-input-label for="title" :value="__('Заголовок')" />
            <x-text-input id="title" name="title" type="text" class="mt-1 block w-full" :value="old('title')" />
            <x-input-error class="mt-2" :messages="$errors->get('title')" />
        </div>

        <div class="flex items-center gap-4">
            <x-primary-button>{{ __('Добавить') }}</x-primary-button>
        </div>
    </form>
</section>
