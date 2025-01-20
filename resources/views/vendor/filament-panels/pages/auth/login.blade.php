<x-filament-panels::page.simple>
    <form wire:submit.prevent="authenticate" class="space-y-4">
        <!-- Поле для email -->
        <div>
            <label for="email" class="block text-sm font-medium text-gray-700">
                {{ __('Email') }}
            </label>
            <input
                type="email"
                id="email"
                wire:model.defer="email"
                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                required
            />
        </div>

        <!-- Поле для password -->
        <div>
            <label for="password" class="block text-sm font-medium text-gray-700">
                {{ __('Password') }}
            </label>
            <input
                type="password"
                id="password"
                wire:model.defer="password"
                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                required
            />
        </div>

        <!-- Кнопка входа -->
        <div>
            <button
                type="submit"
                class="w-full flex justify-center py-2 px-4 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
            >
                {{ __('Login') }}
            </button>
        </div>
    </form>
</x-filament-panels::page.simple>