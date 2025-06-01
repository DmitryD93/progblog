<div>
    <!-- Flash сообщения -->
    @if (session()->has('success'))
        <div class="alert alert-success mb-4">
            {{ session('success') }}
        </div>
    @endif

    @if (session()->has('error'))
        <div class="alert alert-danger mb-4">
            {{ session('error') }}
        </div>
    @endif

    <form wire:submit.prevent="userLogin">
        <!-- Поле email -->
        <div class="mb-4">
            <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
            <input
                type="email"
                wire:model="email"
                id="email"
                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500"
                placeholder="Ваш email"
                autofocus
            >
            @error('email')
            <span class="mt-2 text-sm text-red-600">{{ $message }}</span>
            @enderror
        </div>

        <!-- Поле пароля -->
        <div class="mb-4">
            <label for="password" class="block text-sm font-medium text-gray-700">Пароль</label>
            <input
                type="password"
                wire:model="password"
                id="password"
                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500"
                placeholder="Ваш пароль"
            >
            @error('password')
            <span class="mt-2 text-sm text-red-600">{{ $message }}</span>
            @enderror
        </div>

        <!-- Чекбокс "Запомнить меня" -->
        <div class="mb-4 flex items-center">
            <input
                type="checkbox"
                wire:model="remember"
                id="remember"
                class="h-4 w-4 rounded border-gray-300 text-indigo-600 focus:ring-indigo-500"
            >
            <label for="remember" class="ml-2 block text-sm text-gray-900">Запомнить меня</label>
        </div>

        <!-- Кнопка отправки -->
        <button
            type="submit"
            class="w-full flex justify-center py-2 px-4 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
            wire:loading.attr="disabled"
        >
            <span wire:loading.remove>Войти</span>
            <span wire:loading>
                <svg class="animate-spin -ml-1 mr-3 h-5 w-5 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                    <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                    <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                </svg>
                Обработка...
            </span>
        </button>
    </form>
</div>
