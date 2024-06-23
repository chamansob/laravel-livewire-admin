<div>
    <form wire:submit.prevent="save">
        <div class="row">
            <div class="col-sm-12">
                <div class="mb-3">
                    <x-input-label for="category_name" :value="__('Category Name')" />
                    <x-text-input id="category_name" wire:model="category_name"
                        class="{{ $errors->get('category_name') ? 'is-invalid' : '' }}" type="text" name="category_name"
                        placeholder="Category Name" />
                    <x-input-error :messages="$errors->get('category_name')" />
                </div>
            </div><!-- Col -->

        </div>

        <div>
            <x-primary-button class="btn btn-outline-primary btn-icon-text mb-2 mb-md-0">
                {{ __('Submit') }}
            </x-primary-button>
        </div>
    </form>

</div>
