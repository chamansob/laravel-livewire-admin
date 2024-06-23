<?php

use Illuminate\Support\Facades\Session;
use Livewire\Attributes\Layout;
use Livewire\Volt\Component;

new #[Layout('layouts.dashboard')] class extends Component {
    //
}; ?>
@section('title', breadcrumb())
<div>

    <div class="page-content">

        <livewire:dashboard.components.breadcrumbs :name="'Create User'" :button="true" :function="'create'" />

        <a wire:navigate href="/admin/users" class="btn btn-inverse-info my-2">Show Users</a>
        <div class="row">
            <div class="col-md-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h6 class="card-title">Create User </h6>
                        <livewire:pages.admin.users.components.userform />
                    </div>
                </div>
            </div>

        </div>


    </div>
