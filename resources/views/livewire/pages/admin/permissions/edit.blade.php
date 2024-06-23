<?php

use Illuminate\Support\Facades\Session;
use Livewire\Attributes\Layout;
use Livewire\Volt\Component;

new #[Layout('layouts.dashboard')] class extends Component {
    public $id;

}; ?>
@section('title', breadcrumb())
<div>

    <div class="page-content">

        <livewire:dashboard.components.breadcrumbs :name="'Create Permission'" :button="true" :function="'create'" />

        <a wire:navigate href="/admin/permissions" class="btn btn-inverse-info my-2">Show Permission</a>
        <div class="row">
            <div class="col-md-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h6 class="card-title">Edit Permission </h6>

                        <livewire:pages.admin.permissions.components.permisssionform :id="$id" :is_edit="true" />
                    </div>
                </div>
            </div>

        </div>


    </div>

