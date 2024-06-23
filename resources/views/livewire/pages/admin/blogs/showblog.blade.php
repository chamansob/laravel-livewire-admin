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

        <livewire:dashboard.components.breadcrumbs :name="'Create Blog Category'" :button="true" :function="'create'" />

        <a wire:navigate href="/admin/blog/create" class="btn btn-inverse-info my-2">Create Category</a>
        <div class="row">
            <div class="col-md-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h6 class="card-title">Show Blog  </h6>
                         @if (session('message'))
                                    <div class="alert alert-{{ session('alert-type') }}">
                                        {{ session('message') }}
                                    </div>
                                @endif
                        <livewire:blog-table />
                    </div>
                </div>
            </div>

        </div>


    </div>
