<?php

namespace App\Livewire\Forms;

use App\Models\SiteSetting;
use Livewire\Attributes\Validate;
use Livewire\Form;
use Livewire\WithFileUploads;
class SiteSettingForm extends Form
{
    public ?SiteSetting $site;
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


    /**
     * Attempt to authenticate the request's credentials.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function setPost(SiteSetting $site)
    {
        $this->site = $site;
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
    public function updatesitesettings()
    {
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
    }
}
