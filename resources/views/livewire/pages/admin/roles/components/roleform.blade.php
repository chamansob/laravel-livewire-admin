<form wire:submit.prevent="save">
        <div class="row">
            <div class="col-sm-12">
                <div class="mb-3">
                    <x-input-label for="name" :value="__('Role Name')" />
                    <x-text-input id="name" wire:model="name"
                        class="{{ $errors->get('name') ? 'is-invalid' : '' }}" type="text" name="name"
                        placeholder="Role Name" />
                    <x-input-error :messages="$errors->get('name')" />
                </div>
            </div><!-- Col -->

        </div>

        <div>
            <x-primary-button class="btn btn-outline-primary btn-icon-text mb-2 mb-md-0">
                {{ __('Submit') }}
            </x-primary-button>
        </div>
    </form>
