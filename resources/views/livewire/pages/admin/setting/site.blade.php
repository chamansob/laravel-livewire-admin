<?php

use App\Livewire\Forms\SiteSettingForm;
use Illuminate\Support\Facades\Session;
use Livewire\Attributes\Layout;
use Livewire\Volt\Component;
use App\Models\SiteSetting;
use Livewire\Attributes\Validate;
use Livewire\WithFileUploads;

new #[Layout('layouts.dashboard')] class extends Component {
    #[Validate('file|mimes:ico,svg,png,jpg,jpeg,gif|max:512')]
    public $favicon = '';
    #[Validate('image|max:1024')]
    public $logo = '';
    #[Validate('required|max:20')]
    public $site_title = '';

    #[Validate('required|max:20')]
    public $app_name = '';
    public $path = 'uploads/template/thumbnail';

    use WithFileUploads;
    /**
     * Handle an incoming authentication request.
     */

    public $meta_description;
    public $meta_keywords;
    public $about;
    public $phone;
    public $company_address;
    public $logoimg = '';
    public $faviconimg = '';
    public $email;
    public $facebook;
    public $twitter;
    public $pinterest;
    public $instagram;
    public $youtube;
    public $paginate;

    public function mount()
    {
        $site = SiteSetting::first();

        $this->site_title = $site->site_title;
        $this->meta_description = $site->meta_description;
        $this->meta_keywords = $site->meta_keywords;
        $this->about = $site->about;
        $this->phone = $site->phone;
        $this->company_address = $site->company_address;
        $this->app_name = $site->app_name;
        $this->email = $site->email;
        $this->facebook = $site->facebook;
        $this->twitter = $site->twitter;
        $this->pinterest = $site->pinterest;
        $this->instagram = $site->instagram;
        $this->youtube = $site->youtube;
        $this->paginate = $site->paginate;
        $this->logoimg = $site->logo;
        $this->faviconimg = $site->favicon;
    }
    public function updatesetting()
    {
        $this->validate();
        $site = SiteSetting::first();

        if ($this->logo && $this->logo != $site->logo) {
            $save_url = $this->logo->store($this->path, 'public');
        } else {
            $save_url = $site->logo;
        }
        if ($this->favicon && $this->favicon != $site->favicon) {
            $save_url2 = $this->favicon->store($this->path, 'public');
        } else {
            $save_url2 = $site->favicon;
        }
        $site->update([
            'site_title' => $this->site_title,
            'meta_description' => $this->meta_description,
            'meta_keywords' => $this->meta_keywords,
            'about' => $this->about,
            'phone' => $this->phone,
            'company_address' => $this->company_address,
            'app_name' => $this->app_name,
            'email' => $this->email,
            'facebook' => $this->facebook,
            'twitter' => $this->twitter,
            'pinterest' => $this->pinterest,
            'instagram' => $this->instagram,
            'youtube' => $this->youtube,
            'paginate' => $this->paginate,
            'logo' => $save_url,
            'favicon' => $save_url2,
        ]);

        $notification = [
            'message' => 'SiteSetting Updated  Successfully',
            'alert-type' => 'success',
        ];
        session()->flash('message', 'SiteSetting Updated  Successfully');
        session()->flash('alert-type', 'success');
        $this->reset('logo');
        $this->redirect(route('site.setting'));
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
                        <form wire:submit.prevent="updatesetting">
                            <div class="row">
                                <div class="col-sm-10">
                                    <div class="mb-3">

                                        <x-input-label for="favicon" :value="__('favicon')" />

                                        <x-text-input id="favicon" wire:model="favicon"
                                            class=" {{ $errors->get('favicon') ? 'is-invalid' : '' }}" type="file"
                                            name="favicon"  autofocus />

                                        <x-input-error :messages="$errors->get('favicon')" />
                                             @if ($favicon)
                                        <div class="mt-3">
                                            <img src="{{ $favicon->temporaryUrl() }}" class="img-responsive border border-1" style="width:100px;height:100px;">
                                        </div>
                                        @endif

                                    </div>
                                </div>

                                <div class="mt-3 col-sm-2"><img src="{{ asset('storage/' . $faviconimg) }}"
                                        class="img-thumbnail img-fluid img-responsive w-10"></div>

                            </div>
                            <div class="row">
                                <div class="col-sm-10">
                                    <div class="mb-3">

                                        <x-input-label for="logo" :value="__('Logo')" />

                                        <x-text-input id="logo" wire:model="logo"
                                            class=" {{ $errors->get('logo') ? 'is-invalid' : '' }}" type="file"
                                            name="logo" onchange="mainThamUrl(this)" autofocus />

                                        <x-input-error :messages="$errors->get('logo')" />
                                            @if ($logo)
                                        <div class="mt-3">
                                            <img src="{{ $logo->temporaryUrl() }}" class="img-responsive border border-1"  style="width:100px;height:100px;">
                                        </div>
                                        @endif
                                    </div>
                                </div>

                                <div class="mt-3 col-sm-2"><img src="{{ asset('storage/' . $logoimg) }}"
                                        class="img-thumbnail img-fluid img-responsive w-10"></div>

                            </div>
                            <div class="mb-3">

                                <x-input-label for="paginate" :value="__('Paginate')" />

                                <x-text-input id="paginate" wire:model.live="paginate"
                                    class=" {{ $errors->get('paginate') ? 'is-invalid' : '' }}" type="number"
                                    name="paginate" />
                                <x-input-error :messages="$errors->get('paginate')" />
                            </div>
                            <div class="mb-3">

                                <x-input-label for="app_name" :value="__('App Name')" />

                                <x-text-input id="app_name" wire:model.live="app_name"
                                    class=" {{ $errors->get('app_name') ? 'is-invalid' : '' }}" type="text"
                                    name="app_name" />
                                <x-input-error :messages="$errors->get('app_name')" />
                            </div>
                            <div class="mb-3">

                                <x-input-label for="site_title" :value="__('Site Title')" />

                                <x-text-input id="site_title" wire:model.live="site_title"
                                    class=" {{ $errors->get('site_title') ? 'is-invalid' : '' }}" type="text"
                                    name="site_title" />
                                <x-input-error :messages="$errors->get('site_title')" />
                            </div>
                            <div class="mb-3">

                                <x-input-label for="meta_description" :value="__('Meta Description')" />

                                <x-textarea-input id="meta_description" rows="5" cols="30"
                                    wire:model.live="meta_description"
                                    class=" {{ $errors->get('meta_description') ? 'is-invalid' : '' }}"
                                    name="meta_description" />

                            </div>
                            <div class="mb-3">

                                <x-input-label for="meta_keywords" :value="__('Meta Keywords')" />

                                <x-textarea-input id="meta_keywords" rows="5" cols="30"
                                    wire:model.live="meta_keywords"
                                    class=" {{ $errors->get('meta_keywords') ? 'is-invalid' : '' }}"
                                    name="meta_keywords" />

                            </div>
                            <div class="row">
                                <div class="col-sm-4">
                                    <div class="mb-3">
                                        <x-input-label for="company_address" :value="__('Company Address')" />
                                        <x-text-input id="company_address" wire:model.live="company_address"
                                            class=" {{ $errors->get('company_address') ? 'is-invalid' : '' }}"
                                            type="text" name="company_address" />
                                        <x-input-error :messages="$errors->get('company_address')" />

                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="mb-3">

                                        <x-input-label for="email" :value="__('Email')" />
                                        <x-text-input id="email" wire:model.live="email" type="email" />
                                        <x-input-error :messages="$errors->get('email')" />
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="mb-3">
                                        <x-input-label for="phone" :value="__('Phone')" />
                                        <x-text-input id="phone" wire:model.live="phone"
                                            class=" {{ $errors->get('phone') ? 'is-invalid' : '' }}" type="text"
                                            name="phone" />
                                        <x-input-error :messages="$errors->get('phone')" />
                                    </div>
                                </div>
                            </div>

                            <div class="mb-3">
                                <x-input-label for="facebook" :value="__('Facebook')" />
                                <x-text-input id="facebook" wire:model.live="facebook"
                                    class=" {{ $errors->get('facebook') ? 'is-invalid' : '' }}" type="text"
                                    name="facebook" />


                            </div>
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="mb-3">
                                        <x-input-label for="twitter" :value="__('Twitter')" />
                                        <x-text-input id="twitter" wire:model.live="twitter" type="text"
                                            name="twitter" />



                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="mb-3">

                                        <x-input-label for="pinterest" :value="__('Pinterest')" />
                                        <x-text-input id="pinterest" wire:model.live="pinterest" type="text"
                                            name="pinterest" />



                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="mb-3">

                                        <x-input-label for="youtube" :value="__('Youtube')" />
                                        <x-text-input id="youtube" wire:model.live="youtube" type="text"
                                            name="youtube" />


                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="mb-3">
                                        <x-input-label for="instagram" :value="__('Instagram')" />
                                        <x-text-input id="instagram" wire:model.live="instagram"
                                            class=" {{ $errors->get('instagram') ? 'is-invalid' : '' }}"
                                            type="text" name="instagram" />

                                    </div>
                                </div>
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
