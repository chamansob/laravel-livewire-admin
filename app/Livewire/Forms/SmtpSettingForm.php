<?php

namespace App\Livewire\Forms;

use Livewire\Attributes\Validate;
use Livewire\Form;
use App\Models\SmtpSetting;

class SmtpSettingForm extends Form
{
    public ?SmtpSetting $smtp;

    public $mailer = '';
    #[Validate('required')]
    public $host = '';
    #[Validate('required')]
    public $port = '';
    #[Validate('required')]
    public $username = '';
    #[Validate('required')]
    public $password = '';
    #[Validate('required')]
    public $encryption = '';
    #[Validate('required')]
    public $from_name = '';
    #[Validate('required')]
    public $from_address = '';


    public function setPost(SmtpSetting $smtp)
    {
        $this->smtp = $smtp;
        $this->mailer = $smtp->mailer;
        $this->host = $smtp->host;
        $this->port = $smtp->port;
        $this->username = $smtp->username;
        $this->password = $smtp->password;
        $this->encryption = $smtp->encryption;
        $this->from_name = $smtp->from_name;
        $this->from_address = $smtp->from_address;

    }


    /**
     * Attempt to authenticate the request's credentials.
     *
     * @throws \Illuminate\Validation\ValidationException
     */

    public function updatesmtpsettings()
    {
           $this->smtp->update(
            $this->all()
        );
    }
}
