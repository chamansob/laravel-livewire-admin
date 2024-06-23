<form wire:submit.prevent="save">
    <div class="row">
        <div class="col-sm-12">
            <div class="mb-3">
                <x-input-label for="name" :value="__('Name')" />
                <x-text-input id="name" wire:model="name" class="{{ $errors->get('name') ? 'is-invalid' : '' }}"
                    type="text" name="name" placeholder="Name" />
                <x-input-error :messages="$errors->get('name')" />
            </div>
        </div><!-- Col -->

    </div>
    <div class="row">
        <div class="col-sm-12">
            <div class="mb-3">
                <x-input-label for="group_name" :value="__('Group name')" />
                <x-select id="group_names" :options="$group_names" :optionget="0" wire:model.live="group_name_id"
                    class="{{ $errors->get('group_name_id') ? 'is-invalid' : '' }}" name="group_name_id"
                    placeholder="Select Group" />
                <x-input-error :messages="$errors->get('group_name_id')" />
            </div>
        </div><!-- Col -->

    </div>
    <div>
        <x-primary-button class="btn btn-outline-primary btn-icon-text mb-2 mb-md-0">
            {{ __('Submit') }}
        </x-primary-button>
    </div>
</form>
