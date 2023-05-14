<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Социальные сети') }}
        </h2>
        <x-dropdown-link class="mt-3 mr-3 text-gray-800 dark:text-gray-200 leading-tight" :href="route('social.create')">
            {{ __('Добавить') }}</x-dropdown-link>
    </x-slot>

    <div class="max-w-2xl mx-auto p-4 sm:p-6 lg:p-8">
        <div class="mt-6 bg-white shadow-sm rounded-lg divide-y">
            @foreach ($social as $s)
                <div class="p-6 flex space-x-2">
                    <div class="flex-1">
                        <div class="flex justify-between items-center">
                            <div>
                                <span class="text-gray-800">{{ $s->name }}</span>
                            </div>
                            <x-dropdown>
                                <x-slot name="trigger">
                                    <button>
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-gray-400"
                                            viewBox="0 0 20 20" fill="currentColor">
                                            <path
                                                d="M6 10a2 2 0 11-4 0 2 2 0 014 0zM12 10a2 2 0 11-4 0 2 2 0 014 0zM16 12a2 2 0 100-4 2 2 0 000 4z" />
                                        </svg>
                                    </button>
                                </x-slot>
                                <x-slot name="content">
                                    <x-dropdown-link :href="route('social.edit', $s->id)">
                                        {{ __('Изменить') }}
                                    </x-dropdown-link>
                                    <form method="POST" action="{{ route('social.destroy', $s->id) }}">
                                        @csrf
                                        @method('delete')
                                        <x-dropdown-link :href="route('social.index')"
                                            onclick="event.preventDefault(); this.closest('form').submit();">
                                            {{ __('Удалить') }}
                                        </x-dropdown-link>
                                    </form>
                                </x-slot>
                            </x-dropdown>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</x-app-layout>
