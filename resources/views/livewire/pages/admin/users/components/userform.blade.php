<div>
    <form wire:submit.prevent="save">
        <div class="row">
            <div class="col-sm-{{ ($photo_main) ? 10 : 12 }}">
                <div class="mb-3">
                    <x-input-label for="photo" :value="__('Post Image')" />

                    <x-text-input id="photo" wire:model="photo"
                        class=" {{ $errors->get('photo') ? 'is-invalid' : '' }}" type="file" name="photo" autofocus />


                    @if ($photo)
                        <div class="mt-3">
                            <img src="{{ $photo->temporaryUrl() }}" class="img-responsive border border-1"
                                style="width:100px;height:100px;">
                        </div>
                    @endif

                </div>
            </div>
            @if ($photo_main)
                <div class="mt-3 col-sm-2"><img src="{{ asset('storage/' . $photo_main) }}"
                        class="img-thumbnail img-fluid img-responsive w-10"></div>
            @endif
        </div>
        <div class="row">
            <div class="col-sm-12">
                <div class="mb-3">

                    <x-input-label for="username" :value="__('UserName')" />

                    <x-text-input id="username" wire:model="username"
                        class="{{ $errors->get('username') ? 'is-invalid' : '' }}" type="text" name="username"
                        placeholder="UserName" />
                    <x-input-error :messages="$errors->get('username')" />

                </div>
            </div>

        </div>

        <div class="row">
            <div class="col-sm-4">
                <div class="mb-3">
                    <x-input-label for="name" :value="__('Full Name')" />
                    <x-text-input id="name" wire:model="name"
                        class="{{ $errors->get('name') ? 'is-invalid' : '' }}" type="text" name="name"
                        placeholder="Full Name" />
                    <x-input-error :messages="$errors->get('name')" />
                </div>
            </div><!-- Col -->
            <div class="col-sm-4">
                <div class="mb-3">
                    <x-input-label for="email" :value="__('Email')" />
                    <x-text-input id="email" wire:model="email"
                        class="{{ $errors->get('email') ? 'is-invalid' : '' }}" type="text" name="email"
                        placeholder="Email" />
                    <x-input-error :messages="$errors->get('email')" />
                </div>
            </div><!-- Col -->
            <div class="col-sm-4">
                <div class="mb-3">
                    <x-input-label for="phone" :value="__('Phone')" />
                    <x-text-input id="phone" wire:model="phone"
                        class="{{ $errors->get('phone') ? 'is-invalid' : '' }}" type="text" name="phone"
                        placeholder="Phone" />
                    <x-input-error :messages="$errors->get('phone')" />
                </div>
            </div><!-- Col -->
        </div>

        <div class="row">
            <div class="col-sm-12">
                <div class="mb-3">
                    <x-input-label for="about" :value="__('About')" />
                    <x-text-input id="about" wire:model="about" type="text" name="about" placeholder="About" />

                </div>
            </div><!-- Col -->

        </div>
        <div class="row">
            <div class="col-sm-12">
                <div class="mb-3">
                    <x-input-label for="password" :value="__('Password')" />
                    <x-text-input wire:model="password" id="password" name="password" type="password"
                        placeholder="Password" />
                    <x-input-error :messages="$errors->get('password')" />
                </div>
            </div><!-- Col -->

        </div>
        <div class="row">
            <div class="col-sm-12">
                <div class="mb-3">
                    <x-input-label for="roles" :value="__('Role name')" />
                    <x-select id="roles" :options="$roles" :optionget="'name'" wire:model.live="roles_id"
                        class="{{ $errors->get('blogcat') ? 'is-invalid' : '' }}" name="roles"
                        placeholder="Select Role" />

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
