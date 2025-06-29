<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use Mary\Traits\Toast;

class DataTable extends Component
{
    use Toast;
    use WithPagination;

    protected $listeners = ['refreshTable' => '$refresh'];

    public $model;
    public $perPage = 10;
    public $headers = [];
    public $actionButtons = [
        'create' => true,
        'edit' => true,
        'delete' => true,
        'detail' => true,
    ];
    public array $sortBy = ['column' => 'id', 'direction' => 'desc'];
    public bool $deleteModal = false;
    public $currentItemId;

    public function mount($model, $headers = [], $actionButtons = null)
    {
        $this->model = $model;
        $this->headers = $headers;
        
        if ($actionButtons) {
            $this->actionButtons = $actionButtons;
        }

        if (count($this->actionButtons) > 0) {
            array_push($this->headers, [
                'key' => 'actions',
                'label' => 'Actions',
                'class' => 'flex flex-col md:flex-row items-center justify-items-center gap-2',
                'sortable' => false,
            ]);
        }
    }

    public function onDelete($id)
    {
        $this->currentItemId = $id;
        $this->deleteModal = true;
    }

    public function delete()
    {
        $modelClass = $this->getModelClass();
        $modelClass::find($this->currentItemId)->delete();
        $this->deleteModal = false;
        $this->currentItemId = null;
        $this->success($this->model ." deleted successfully.");
    }

    protected function getModelClass(): string
    {
        $modelName = ucfirst($this->model);
        $class = "App\\Models\\$modelName";

        if (class_exists($class)) {
            return $class;
        }

        throw new \Exception("Model class $class does not exist.");
    }

    public function render()
    {
        $modelClass = $this->getModelClass();
        
        $query = $modelClass::query();

        // Add sorting
        $query->orderBy(...array_values($this->sortBy));

        $items = $query->paginate($this->perPage);

        return view('livewire.data-table', [
            'items' => $items,
            'headers' => $this->headers,
            'model' => $this->model,
        ]);
    }
}