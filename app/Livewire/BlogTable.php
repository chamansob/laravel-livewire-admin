<?php

namespace App\Livewire;

use App\Models\Blog;
use App\Models\Blogcategory;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Blade;
use Illuminate\Database\Eloquent\Builder;
use Livewire\Attributes\On;
use PowerComponents\LivewirePowerGrid\Facades\Filter;
use PowerComponents\LivewirePowerGrid\{
    Button,
    Column,
    Footer,
    Exportable,
    Header,
    PowerGrid,
    PowerGridFields,
    PowerGridComponent,
    PowerGridEloquent
};
use PowerComponents\LivewirePowerGrid\Traits\WithExport;

final class BlogTable extends PowerGridComponent
{
    use WithExport;
    public bool $deferLoading = false;

    public string $loadingComponent = 'components.mycustomloading';
    public int $blogcat_id = 0;
    public array $selectedItems = [];
  //  public string $tableName = 'blogs';

    public function setUp(): array
    {
        $this->showCheckBox();

        return [
            Exportable::make('export')
                ->striped()
                ->type(Exportable::TYPE_XLS, Exportable::TYPE_CSV),
            Header::make()
            ->withoutLoading()
            ->showSearchInput(),
            Footer::make()
                ->showPerPage()
                ->showRecordCount(),

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

    public function datasource(): Builder
    {
        return Blog::query()
            ->when(
                $this->blogcat_id,
                fn ($builder) => $builder->whereHas(
                    'category',
                    fn ($builder) => $builder->where('blogcat_id', $this->blogcat_id)
                )
            )
            ->with(['category']);
    }

    public function relationSearch(): array
    {
        return [
            'category' => [
                'category_name',
            ],
        ];
    }

    public function fields(): PowerGridFields
    {
        return PowerGrid::fields()
            ->add('id')
            ->add('category_name', fn ($blog) => e($blog->category->category_name))
            ->add('post_image', fn ($blog) => '<img class="wd-80 ht-80 rounded-circle" src="' . (($blog->post_image) ? asset("storage/{$blog->post_image}") : asset("upload/no_image.jpg")) . '">')

            ->add('post_title', fn ($blog) => Str::substr($blog->post_title,0,10)."...")
            ->add('status')
            ->add('status_label', fn ($blog) => $blog->status == 0 ? 'Yes' : 'No');
    }

    public function columns(): array
    {
        return [
            Column::add()
                ->title('ID')
                ->field('id', 'blogs.id')
                ->searchable()
                ->sortable(),
            Column::make('Image', 'post_image'),
            Column::make('Category', 'category_name')
            ->searchable()
                ->searchable(),
            Column::make('Post Title', 'post_title')
                ->sortable()
                ->searchable(),
            Column::add()
                ->title('Status')
                ->field('status')->toggleable( trueLabel: 'yes', falseLabel: 'no')
                ->sortable(),

            Column::action('Action')
        ];
    }

    public function filters(): array
    {
        return [
            Filter::boolean('status', 'status')
                ->label('Active', 'Deactive'),
            // Uncomment if needed
            Filter::select('category_name', 'blogcat_id')
            ->dataSource(Blogcategory::all())
                ->optionLabel('category_name')
                ->optionValue('id'),
        ];
    }

    #[On('toggleable')]
    public function toggleable($blog): void
    {
        $blog = Blog::find($blog);
        $blog->status = $blog->status == 0 ? 1 : 0; // Toggle status
        $blog->save();
        session()->flash('message', 'Blog status updated successfully.');
        session()->flash('alert-type', 'success');
    }

    #[On('bulkDelete.{tableName}')]
    public function bulkDelete(): void
    {
        if ($this->checkboxValues) {
       // $this->js('alert(window.pgBulkActions.get(\'' . $this->tableName . '\'))');
       $tableName = $params['tableName'] ?? $this->tableName;
        $selected = $this->checkboxValues;
      //  dd($selected);
        Blog::whereIn('id', $selected)->delete();

        session()->flash('message', 'Selected blogs deleted successfully.');
        session()->flash('alert-type', 'danger');

            // Optionally, you can redirect
         $this->js('window.pgBulkActions.clearAll()');
        $this->redirectIntended(default: route('blog.index'), navigate: true);
        }else
        {
            $this->js('alert("No id selected")');
        }
    }

    #[On('delete')]
    public function delete($blog): void
    {
        $blog = Blog::find($blog);
        $blog->delete();

        session()->flash('message', 'Blog deleted successfully.');
        session()->flash('alert-type', 'danger');

        // Optionally, you can redirect
        $this->redirectIntended(default: route('blog.index'), navigate: true);
    }

    public function actions(Blog $row): array
    {
        return [

            Button::add('edit')
            ->target('_self')
            ->slot('Edit')
            ->class('btn btn-inverse-warning')
            ->route('blog.edit', ['blog' => $row->id]),


            Button::add('delete')
            ->render(function ($blog) {
                return Blade::render(<<<HTML
                      <x-primary-button class="btn btn-inverse-danger" wire:click="delete('$blog->id')" wire:confirm="Are you sure you want to delete">

                  {{ __('Delete') }}
            </x-primary-button>
HTML);
            }),


        ];
    }

    public function onUpdatedToggleable(string|int $id, string $field, string $value): void
    {
        session()->flash('message', 'Blog status updated successfully.');
        session()->flash('alert-type', 'success');
        blog::query()->find($id)->update([
            $field => e($value),
        ]);

        $this->skipRender();
       // $this->redirectIntended(default: route('blog.index'), navigate: true);
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
