<?php

use App\Livewire\Forms\AdminLoginForm;
use Illuminate\Support\Facades\Session;
use Livewire\Attributes\Layout;
use Livewire\Volt\Component;

new #[Layout('layouts.guestadmin')] class extends Component {
    public AdminLoginForm $form;

    /**
     * Handle an incoming authentication request.
     */

    public function login(): void
    {
        $this->validate();

        $this->form->authenticate();

        Session::regenerate();

        $this->redirectIntended(default: route('admin.dashboard', absolute: false), navigate: true);
    }
}; ?>



<div class="page-wrapper full-page">
    <div class="page-content d-flex align-items-center justify-content-center">
        <div class="row w-100 mx-0 auth-page">
            <div class="col-md-8 col-xl-6 mx-auto">
                <div class="card">
                    <div class="row">
                        <div class="col-md-4 pe-md-0">
                            <div class="auth-side-wrapper">

                            </div>
                        </div>

                        <div class="col-md-8 ps-md-0">
                            <div class="auth-form-wrapper px-4 py-5">

                                <h5 class="text-muted fw-normal mb-4">Welcome back! Log in to your account.</h5>

                                <x-auth-session-status class="mb-4" :status="session('status')" />

                                <form wire:submit="login" id="loginform">
                                    <div class="mb-3">
                                        <x-input-label for="login" :value="__('Username')" />
                                        <x-text-input id="login" wire:model.live="form.username"
                                            class=" {{ $errors->get('form.username') ? 'is-invalid' : '' }}"
                                            type="text" name="login" :value="old('form.username')" autofocus />
                                        <x-input-error :messages="$errors->get('form.username')"  />
                                    </div>
                                    <div class="mb-3">
                                        <x-input-label for="password" :value="__('Password')" />

                                        <x-text-input id="password" wire:model="form.password" id="password"
                                        class=" {{ $errors->get('form.password') ? 'is-invalid' : '' }}"
                                        type="password"
                                            name="password" autocomplete="current-password" />
                                        <x-input-error :messages="$errors->get('form.password')"  />
                                    </div>
                                    <div class="d-sm-flex justify-content-between">
                                        <div class="form-check form-switch mb-2">
                                            <input type="checkbox" class="form-check-input" id="formSwitch1">
                                            <label class="form-check-label" for="formSwitch1">Show Password</label>
                                        </div>
                                        <div class="form-check mb-3">
                                            <input type="checkbox" class="form-check-input" id="authCheck">
                                            <input id="remember_me"  wire:model="form.remember" type="checkbox" class="form-check-input"
                                                name="remember">
                                            <x-input-label class="form-check-label" for="authCheck" :value="__('Remember me')" />

                                        </div>
                                    </div>

                                    <div>
                                        <x-primary-button class="btn btn-outline-primary btn-icon-text mb-2 mb-md-0">
                                            {{ __('Log in') }}
                                        </x-primary-button>
                                    </div>
                                    <a href="{{ route('password.request') }}" class="d-block mt-3 text-muted">Forgot
                                        your password?</a>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>
