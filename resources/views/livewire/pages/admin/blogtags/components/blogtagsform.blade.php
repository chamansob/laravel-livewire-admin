
    <form wire:submit.prevent="save">
        <div class="row">
            <div class="col-sm-12">
                <div class="mb-3">
                    <x-input-label for="tag_name" :value="__('Tag Name')" />
                    <x-text-input id="tag_name" wire:model="tag_name"
                        class="{{ $errors->get('tag_name') ? 'is-invalid' : '' }}" type="text" name="tag_name"
                        placeholder="Tag Name" />
                    <x-input-error :messages="$errors->get('tag_name')" />
                </div>
            </div><!-- Col -->

        </div>

        <div>
            <x-primary-button class="btn btn-outline-primary btn-icon-text mb-2 mb-md-0">
                {{ __('Submit') }}
            </x-primary-button>
        </div>
    </form>

