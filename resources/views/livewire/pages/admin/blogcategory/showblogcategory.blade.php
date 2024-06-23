<?php

use Illuminate\Support\Facades\Session;
use Livewire\Attributes\Layout;
use Livewire\Volt\Component;
use App\Models\Blogcategory;
use App\Models\SiteSetting;
use Livewire\WithPagination;


new #[Layout('layouts.dashboard')] class extends Component {
    //
    use WithPagination;
    public $search;
    public function with(): array
    {
        return [
            'blogcat' => Blogcategory::when($this->search != '', function ($q) {
                return $q->where(function ($query) {
                    $query
                        ->where('category_name', 'like', '%' . $this->search . '%')
                        ->orWhere('id', $this->search)
                        ->orWhere('category_slug', 'like', '%' . $this->search . '%');
                });
            })->paginate(SiteSetting::first()->paginate, pageName: 'blogcat-page'),
        ];
    }
    public function status(Blogcategory $blogcategory)
    {
        session()->flash('message', 'Blog Category Status Changed Successfully.');
        session()->flash('alert-type', 'success');
        $blogcategory->changestatus($blogcategory);

        $this->redirectIntended(default: route('blogcategory.index', absolute: false), navigate: true);
    }
    public function delete(Blogcategory $blogcategory)
    {
        session()->flash('message', 'Blog Category Deleted Successfully.');
        session()->flash('alert-type', 'danger');
        $blogcategory->delete();
        $this->redirectIntended(default: route('blogcategory.index', absolute: false), navigate: true);
    }
}; ?>
@section('title', breadcrumb())
<div>

    <div class="page-content">

        <livewire:dashboard.components.breadcrumbs :name="'Create Blog Category'" :button="true" :function="'create'" />

        <a wire:navigate href="/admin/blogcategory/create" class="btn btn-inverse-info my-2">Create Blog Category</a>
        <div class="row">
            <div class="col-md-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h6 class="card-title">Show Blog Category </h6>

                        <div class="table-responsive">



                                <div class="w-100">
                                    <div class="text-end"><label>
                                            <input type="search" wire:model.live='search' class="form-control"
                                                placeholder="Search for Name.."></label></div>
                                </div>

                                <hr>
                                @if (session('message'))
                                    <div class="alert alert-{{ session('alert-type') }}">
                                        {{ session('message') }}
                                    </div>
                                @endif
                                <div class="row">
                                    <div class="text-center" wire:loading.delay>
                                        <div class="spinner-border" role="status">
                                            <span class="visually-hidden">Loading...</span>
                                        </div>
                                    </div>
                                </div>


                                <table class="table" wire:loading.class="opacity-50">
                                    <thead>
                                        <tr>
                                            <th sortable direction="desc">ID</th>
                                            <th>Name</th>
                                            <th>Slug</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        @forelse ($blogcat as $bcat)
                                             <livewire:pages.admin.blogcategory.components.blogtable :key="$bcat->id"
                                                :$bcat />
                                        @empty
                                        <tr>
                                           <td colspan="6">
                                             <h5 class="text-center text-white">No Data found....</h5></td>
                                            </tr>
                                        @endforelse
                                    </tbody>
                                </table>


                                {{ $blogcat->links('vendor.pagination.bootstrap-5') }}




                        </div>

                    </div>
                </div>
            </div>
        </div>

    </div>


    </div>
