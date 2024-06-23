<?php

namespace App\Livewire;

use App\Models\Blogtag;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Blade;
use Illuminate\Database\Eloquent\Builder;
use PowerComponents\LivewirePowerGrid\Button;
use PowerComponents\LivewirePowerGrid\Column;
use PowerComponents\LivewirePowerGrid\Exportable;
use PowerComponents\LivewirePowerGrid\Facades\Filter;
use Livewire\Attributes\On;
use PowerComponents\LivewirePowerGrid\Facades\Rule;
use PowerComponents\LivewirePowerGrid\Footer;
use PowerComponents\LivewirePowerGrid\Header;
use PowerComponents\LivewirePowerGrid\PowerGrid;
use PowerComponents\LivewirePowerGrid\PowerGridFields;
use PowerComponents\LivewirePowerGrid\PowerGridComponent;
use PowerComponents\LivewirePowerGrid\Traits\WithExport;

final class Blogtags extends PowerGridComponent
{
    use WithExport;
    public $x;
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
        return Blogtag::query();
    }

    public function relationSearch(): array
    {
        return [];
    }

    public function fields(): PowerGridFields
    {
        return PowerGrid::fields()
            ->add('id')
            ->add('tag_name');
    }

    public function columns(): array
    {
        return [
            Column::make('Id', 'id')->searchable()
                ->sortable(),
            Column::make('Name', 'tag_name')->searchable()
                ->sortable(),
            Column::action('Action')
        ];
    }

    public function filters(): array
    {
        return [];
    }

    #[On('bulkDelete.{tableName}')]
    public function bulkDelete(): void
    {
        if ($this->checkboxValues) {
            // $this->js('alert(window.pgBulkActions.get(\'' . $this->tableName . '\'))');
            $tableName = $params['tableName'] ?? $this->tableName;
            $selected = $this->checkboxValues;
            //  dd($selected);
            Blogtag::whereIn('id', $selected)->delete();

            session()->flash('message', 'Selected blogtags deleted successfully.');
            session()->flash('alert-type', 'danger');

            // Optionally, you can redirect
            $this->js('window.pgBulkActions.clearAll()');
            $this->redirectIntended(default: route('blogtags.index'), navigate: true);
        } else {
            $this->js('alert("No id selected")');
        }
    }
    #[On('delete')]
    public function delete($blog): void
    {

        $blog = Blogtag::find($blog);
        $blog->delete();


        session()->flash('message', 'Blog deleted successfully.');
        session()->flash('alert-type', 'danger');

        // Optionally, you can redirect
        $this->redirectIntended(default: route('blogtags.index'), navigate: true);
    }
    public function actions(Blogtag $row): array
    {
        return [
            Button::add('edit')
                ->target('_self')
                ->slot('Edit')
                ->class('btn btn-warning')
                ->route('blogtags.edit', ['blogtag' => $row->id]),


            Button::add('delete')
                ->render(function ($blogtag) {
                    return Blade::render(<<<HTML
                      <x-primary-button class="btn btn-danger" wire:click="delete('$blogtag->id')" wire:confirm="Are you sure you want to delete">
                {{ __('Delete') }}
            </x-primary-button>
HTML);
                }),

        ];
    }
    public function header(): array
    {
        return [
            Button::add('bulk-delete')
                ->slot('Bulk delete (<span x-text="window.pgBulkActions.count(\'' . $this->tableName . '\')"></span>)')

                ->class('btn btn-danger')
                ->dispatch('bulkDelete.' . $this->tableName, []),
        ];
    }


    public function actionRules($row): array
    {
        return [
            // Hide button edit for ID 1
            // Rule::button('edit')
            //     ->when(fn($row) => $row->id === 1)
            //     ->hide(),

        ];
    }
}
