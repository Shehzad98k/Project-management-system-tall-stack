<div class="col-span-12 space-y-4">
    <x-admin.components.card heading="Basic Information">
        <div class="grid grid-cols-2 gap-4">
            <x-admin.components.input.group label="{{ __('inputs.name') }}" for="name" :error="$errors->first('team.name')">
                <x-admin.components.input.text wire:model.defer="team.name" name="name" id="name"
                    :error="$errors->first('team.name')" />
            </x-admin.components.input.group>
        </div>
    </x-admin.components.card>

    <div class="px-4 py-3 text-right rounded shadow bg-gray-50 sm:px-6">
        <button type="submit"
            class="inline-flex justify-center px-4 py-2 text-sm font-medium text-white bg-indigo-600 border border-transparent rounded-md shadow-sm hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
            {{ __($team->id ? 'teams.form.update_btn' : 'teams.form.create_btn') }}
        </button>
    </div>

    @if ($team->id)
        <div class="bg-white border border-red-300 rounded shadow">
            <header class="px-6 py-4 text-red-700 bg-white border-b border-red-300 rounded-t">
                {{ __('inputs.danger_zone.title') }}
            </header>
            <div class="p-6 space-y-4 text-sm">
                <div class="grid grid-cols-12 gap-4">
                    <div class="col-span-12 md:col-span-6">
                        <strong>{{ __('teams.form.danger_zone.label') }}</strong>
                        <p class="text-xs text-gray-600">{{ __('teams.form.danger_zone.instructions') }}</p>
                    </div>
                    <div class="col-span-9 lg:col-span-4">
                        <x-admin.components.input.text type="text" wire:model="deleteConfirm" />
                    </div>
                    <div class="col-span-3 text-right lg:col-span-2">
                        <x-admin.components.button theme="danger" :disabled="!$this->canDelete" wire:click="delete" type="button">
                            {{ __('global.delete') }}</x-admin.components.button>
                    </div>
                </div>
            </div>
        </div>

        <div class="bg-white border rounded shadow">
            <header class="px-6 py-4 bg-white border-b border-gray-300 rounded-t">
                {{ __('inputs.invitation_link.title') }}
            </header>
            <div class="p-6 space-y-4 text-sm">
                <div class="grid grid-cols-12 gap-4">
                    <div class="col-span-12 md:col-span-6">
                        <strong>{{ __('teams.form.invitation_link.label') }}</strong>
                        <p class="text-xs text-gray-600">{{ __('teams.form.invitation_link.instructions') }}</p>
                    </div>
                    <div class="col-span-9 lg:col-span-4">
                        <x-admin.components.input.group label="" for="inviteEmail" :error="$errors->first('inviteEmail')">
                            <x-admin.components.input.email wire:model.defer="inviteEmail" name="inviteEmail"
                                id="inviteEmail" :error="$errors->first('inviteEmail')" />
                        </x-admin.components.input.group>
                    </div>
                    <div class="col-span-3 text-right lg:col-span-2">
                        <x-admin.components.button wire:click="sendInvitationEmail" wire:loading.attr="disabled" type="button">
                            {{ __('global.send') }}</x-admin.components.button>
                    </div>
                </div>
            </div>
        </div>
    @endif
</div>
