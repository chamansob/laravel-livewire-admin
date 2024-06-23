<?php

use App\Models\SiteSetting;
use Illuminate\Support\Facades\Session;
use Livewire\Attributes\Layout;
use Livewire\Volt\Component;

new #[Layout('layouts.dashboard')] class extends Component {
    /**
     * Handle an incoming authentication request.
     */
    public $sitename = '';
    public $logo = '';
    public function mount()
    {
        $this->sitename = SiteSetting::first()->site_title;
        $this->logo = SiteSetting::first()->logo;
    }
}; ?>
@section('title', breadcrumb())
<div>
    <div class="page-content">
        <livewire:dashboard.components.breadcrumbs />
        <div class="d-flex justify-content-between align-items-center flex-wrap grid-margin">
            <div>
                <h4 class="mb-3 mb-md-0">Welcome to Dashboard</h4>
            </div>
            <div class="d-flex align-items-center flex-wrap text-nowrap">



            </div>
        </div>

        <div class="row">
            <div class="col-12 col-xl-12 stretch-card">
                <div class="row flex-grow-1">
                    <div class="col-md-12 grid-margin stretch-card">
                        <div class="card">
                            <div class="card-body">
                                <div class="d-flex flex-column gap-2 justify-content-center text-center">


                                       <div class="p-2"> <h1 class="mb-0 text-center">{{ $sitename }}</h1></div>

                                    <div class="p-2"><img src="{{ asset('storage/' . $logo) }}"></div>
                                </div>

                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 grid-margin stretch-card">

                    </div>
                    <div class="col-md-4 grid-margin stretch-card">

                    </div>
                </div>
            </div>
        </div> <!-- row -->

    </div>

</div>
