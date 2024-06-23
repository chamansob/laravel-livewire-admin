<?php

namespace App\Livewire;

use App\Models\User;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Blade;
use Livewire\Attributes\On;
use Illuminate\Database\Eloquent\Builder;
use PowerComponents\LivewirePowerGrid\Button;
use PowerComponents\LivewirePowerGrid\Column;
use PowerComponents\LivewirePowerGrid\Exportable;
use PowerComponents\LivewirePowerGrid\Facades\Filter;
use PowerComponents\LivewirePowerGrid\Footer;
use PowerComponents\LivewirePowerGrid\Header;
use PowerComponents\LivewirePowerGrid\PowerGrid;
use PowerComponents\LivewirePowerGrid\PowerGridFields;
use PowerComponents\LivewirePowerGrid\PowerGridComponent;
use PowerComponents\LivewirePowerGrid\Traits\WithExport;

final class UserTable extends PowerGridComponent
{
    use WithExport;

    public function setUp(): array
    {
        $this->showCheckBox();

        return [
            Exportable::make('export')
                ->striped()
                ->type(Exportable::TYPE_XLS, Exportable::TYPE_CSV),
            Header::make()->showSearchInput(),
            Footer::make()
                ->showPerPage()
                ->showRecordCount(),
        ];
    }

    public function datasource(): Builder
    {
        return User::query();
    }

    public function relationSearch(): array
    {
        return [];
    }

    public function fields(): PowerGridFields
    {
        return PowerGrid::fields()
            ->add('id')
            ->add('photo', fn ($user) => '<img class="w-100" src="' . (($user->photo) ? asset("storage/{$user->photo}") : asset("upload/no_image.jpg")) . '">')
            ->add('name')
            ->add('username')
            ->add('role', fn ($user) => $user->roles[0]->name)
            ->add('created_at_formatted',fn ($user) => '<span class="">C:</span>'.Carbon::parse($user->created_at)->format('d-m-Y h:i:s A') . '<br>' . '<span class="">U:</span>' . Carbon::parse($user->updated_at)->format('d-m-Y h:i:s A'));
    }

    public function columns(): array
    {
        return [
            Column::make('Id', 'id'),
            Column::make('Photo', 'photo')
            ->sortable()
                ->searchable(),
            Column::make('Name', 'name')
                ->sortable()
                ->searchable(),

            Column::make('Username', 'username')
                ->sortable()
                ->searchable(),

            Column::make('Role', 'role')
            ->contentClasses([
                'SuperAdmin'    => 'badge badge-pill bg-danger',
                'Manager' => 'badge badge-pill bg-warning',
                'User' => 'badge badge-pill bg-info',
            ])
                ->sortable()
                ->searchable(),


            Column::make('Created at', 'created_at_formatted')
                ->sortable()
                ->searchable(),

            Column::action('Action')
        ];
    }

    public function filters(): array
    {
        return [
        ];
    }

    #[On('delete')]
    public function delete($user): void
    {

        if($user==1)
        {

            session()->flash('message', "You can not delete main admin ");
            session()->flash('alert-type', 'danger');

            $this->skipRender();

        }else
        {
            $user = User::find($user);
            $user->delete();


            session()->flash('message', 'User deleted successfully.');
            session()->flash('alert-type', 'danger');
        }



        // Optionally, you can redirect
        $this->redirectIntended(default: route('users.index'), navigate: true);
    }
    public function actions(User $row): array
    {
        return [
            Button::add('edit')
            ->target('_self')
            ->slot('Edit')
            ->class('btn btn-inverse-warning')
            ->route('user.edit', ['user' => $row->id]),


            Button::add('delete')
            ->render(function ($user) {
                return Blade::render(<<<HTML
                      <x-primary-button class="btn btn-inverse-danger" wire:click="delete('$user->id')" wire:confirm="Are you sure you want to delete">
                  {{ __('Delete') }}
            </x-primary-button>
HTML);
            }),

        ];
    }

    /*
    public function actionRules($row): array
    {
       return [
            // Hide button edit for ID 1
            Rule::button('edit')
                ->when(fn($row) => $row->id === 1)
                ->hide(),
        ];
    }
    */
}
