<div class="w-full">
    <div>
        <h1 class="mb-4 text-xl font-semibold text-gray-700 dark:text-gray-200">
            Reset Password
        </h1>
        @if ($invalid)
            <x-alert level="danger">
                {{ __('auth.reset-password.invalid') }}
            </x-alert>
            <div class="mt-2 text-sm ">
                <a href="{{ route('admin.login') }}" class="font-medium text-indigo-600 hover:text-indigo-500">
                    {{ __('auth.reset-password.back_link') }}
                </a>
            </div>
        @else
            <form class="space-y-6" method="POST" wire:submit.prevent="process">
                @csrf
                <div class="space-y-4">
                    @if (!$token)
                        <x-admin.components.input.group :label="__('global.email')" for="email" :error="$errors->first('email')">
                            <x-admin.components.input.text type="email" autocomplete="email" wire:model="email" :error="$errors->first('email')" />
                        </x-admin.components.input.group>
                    @endif

                    @if ($token)
                        <x-admin.components.input.group :label="__('global.new_password')" for="password" :error="$errors->first('password')">
                            <x-admin.components.input.text type="password" wire:model="password" :error="$errors->first('password')" />
                        </x-admin.components.input.group>

                        <x-admin.components.input.group :label="__('global.confirm_password')" for="password_confirmation" :error="$errors->first('password_confirmation')">
                            <x-admin.components.input.text type="password" wire:model="password_confirmation" :error="$errors->first('password_confirmation')" />
                        </x-admin.components.input.group>
                    @endif
                </div>

                <div class="text-sm">
                    <a href="{{ route('admin.login') }}" class="font-medium text-indigo-600 hover:text-indigo-500">
                        {{ __('auth.reset-password.back_link') }}
                    </a>
                </div>
                <div>
                    <button type="submit" 
                    wire:loading.attr="disabled"
                    class="flex justify-center w-full px-4 py-2 text-sm font-medium text-white bg-purple-600 border border-transparent rounded-md shadow-sm active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:outline-none focus:shadow-outline-purple">
                        <div wire:loading wire:target="process">
                            <div>
                                <svg class="w-5 h-5 mr-3 -ml-1 text-white animate-spin" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                                    <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                                    <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                                </svg>
                            </div>
                        </div>
                        <div wire:loading.remove wire:target="process">
                            <span>{{ __('auth.reset-password.' . ($token ? 'update_btn' : 'send_btn')) }}</span>
                        </div>
                    </button>
                </div>
            </form>
        @endif

    </div>
</div>
