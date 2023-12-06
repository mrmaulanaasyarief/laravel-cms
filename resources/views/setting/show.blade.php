<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Settings') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
                <div class="max-w-xl">
                    <section>
                        <header>
                            <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
                                {{ __('Settings') }}
                            </h2>

                            <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
                                {{ __("Show the setting.") }}
                            </p>
                        </header>

                        <form id="send-verification" method="post" action="{{ route('verification.send') }}">
                            @csrf
                        </form>

                        <form method="post" action="#" class="mt-6 space-y-6">
                            @csrf
                            @method('patch')

                            <div>
                                <x-input-label for="key" :value="__('Key')" />
                                <x-text-input id="key" name="key" type="text" class="mt-1 block w-full" :value="old('key')"
                                    value="{{ $setting->key }}" disabled/>
                                <x-input-error class="mt-2" :messages="$errors->get('key')" />
                            </div>

                            <div>
                                <x-input-label for="value" :value="__('Value')" />
                                <x-text-input id="value" name="value" type="text" class="mt-1 block w-full" :value="old('value')"
                                    value="{{ $setting->value }}" disabled/>
                                <x-input-error class="mt-2" :messages="$errors->get('value')" />
                            </div>

                            <div>
                                <x-input-label for="description" :value="__('Description')" />
                                <x-text-area-input id="description" name="description" type="text" class="mt-1 block w-full" :value="old('description')"
                                    value="{{ $setting->description }}" disabled/>
                                <x-input-error class="mt-2" :messages="$errors->get('description')" />
                            </div>
                            <div class="flex items-center gap-4">
                                <x-primary-button-link href="{{ route('settings.edit', $setting->id) }}">{{ __('Edit') }}</x-primary-button-link>
                            </div>
                        </form>
                    </section>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
