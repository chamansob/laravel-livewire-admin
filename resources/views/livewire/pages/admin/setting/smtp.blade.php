<?php

use Illuminate\Support\Facades\Session;
use Livewire\Attributes\Layout;
use Livewire\Volt\Component;
use Livewire\Attributes\Validate;
use App\Models\SmtpSetting;
use App\Livewire\Forms\SmtpSettingForm;

new #[Layout('layouts.dashboard')] class extends Component {
    public SmtpSettingForm $form;

    /**
     * Handle an incoming authentication request.
     */
    public function mount()
    {
        $smtp = SmtpSetting::first();
        $this->form->setPost($smtp);
    }
    public function updatesmtp()
    {
        $this->validate();
        session()->flash('message', 'SmtpSetting Updated  Successfully');
        session()->flash('alert-type', 'success');
        $this->form->updatesmtpsettings();

        $this->redirectIntended(default: route('smtp.setting', absolute: false), navigate: true);
    }
}; ?>
@section('title', breadcrumb())
<div>

    <div class="page-content">

        <livewire:dashboard.components.breadcrumbs />

        <div class="row">
            <div class="col-md-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h6 class="card-title">Update Site Setting </h6>
                        <form wire:submit.prevent="updatesmtp">


                            <div class="row">
                                <div class="col-sm-4">
                                    <div class="mb-3">
                                        <x-input-label for="mailer" :value="__('Mailer')" />
                                        <x-text-input id="mailer" wire:model.live="form.mailer"
                                            class="{{ $errors->get('form.mailer') ? 'is-invalid' : '' }}" type="text"
                                            name="mailer" placeholder="Mailer" />
                                        <x-input-error :messages="$errors->get('form.mailer')" />
                                    </div>
                                </div><!-- Col -->

                                <div class="col-sm-4">
                                    <div class="mb-3">
                                        <x-input-label for="host" :value="__('Host')" />
                                        <x-text-input id="host" wire:model.live="form.host"
                                            class="{{ $errors->get('form.host') ? 'is-invalid' : '' }}" type="text"
                                            name="host" placeholder="Host" />
                                        <x-input-error :messages="$errors->get('form.host')" />
                                    </div>
                                </div><!-- Col -->

                                <div class="col-sm-4">
                                    <div class="mb-3">
                                        <x-input-label for="port" :value="__('Port')" />
                                        <x-text-input id="port" wire:model.live="form.port"
                                            class="{{ $errors->get('form.port') ? 'is-invalid' : '' }}" type="text"
                                            name="port" placeholder="Port" />
                                        <x-input-error :messages="$errors->get('form.port')" />
                                    </div>
                                </div><!-- Col -->
                                <div class="row">
                                    <div class="col-sm-4">
                                        <div class="mb-3">
                                            <x-input-label for="username" :value="__('Username')" />
                                            <x-text-input id="username" wire:model.live="form.username"
                                                class="{{ $errors->get('form.username') ? 'is-invalid' : '' }}"
                                                type="text" name="username" placeholder="Username" />
                                            <x-input-error :messages="$errors->get('form.username')" />
                                        </div>
                                    </div><!-- Col -->

                                    <div class="col-sm-4">
                                        <div class="mb-3">
                                            <x-input-label for="password" :value="__('Password')" />
                                            <x-text-input id="password" wire:model.live="form.password"
                                                class="{{ $errors->get('form.password') ? 'is-invalid' : '' }}"
                                                type="text" name="password" placeholder="Password" />
                                            <x-input-error :messages="$errors->get('form.password')" />
                                        </div>
                                    </div><!-- Col -->

                                    <div class="col-sm-4">
                                        <div class="mb-3">
                                            @php
                                                $data = ['ssl' => 'SSL', 'tls' => 'TLS'];
                                            @endphp
                                            <x-input-label for="encryption" :value="__('Encryption')" />
                                            <x-select id="encryption" wire:model.live="form.encryption"
                                                class="{{ $errors->get('form.encryption') ? 'is-invalid' : '' }}"
                                                name="encryption" :options="$data" placeholder="Select Encryption" />
                                            <x-input-error :messages="$errors->get('form.encryption')" />
                                        </div>
                                    </div><!-- Col -->
                                </div>
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="mb-3">
                                            <x-input-label for="from_name" :value="__('From Name')" />
                                            <x-text-input id="from_name" wire:model.live="form.from_name"
                                                class="{{ $errors->get('form.from_name') ? 'is-invalid' : '' }}"
                                                type="text" name="from_name" placeholder="From Name" />
                                            <x-input-error :messages="$errors->get('form.from_name')" />
                                        </div>
                                    </div><!-- Col -->

                                    <div class="col-sm-6">
                                        <div class="mb-3">
                                            <x-input-label for="from_address" :value="__('From Address')" />
                                            <x-text-input id="from_address" wire:model.live="form.from_address"
                                                class="{{ $errors->get('form.from_address') ? 'is-invalid' : '' }}"
                                                type="text" name="from_address" placeholder="From Address" />
                                            <x-input-error :messages="$errors->get('form.from_address')" />
                                        </div>
                                    </div><!-- Col -->
                                </div>


                                <div>
                                    <x-primary-button class="btn btn-outline-primary btn-icon-text mb-2 mb-md-0">
                                        {{ __('Update') }}
                                    </x-primary-button>
                                </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>

    </div>

</div>
