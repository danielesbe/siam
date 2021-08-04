<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\guru;
use Livewire\WithPagination;

class DataTable extends Component
{
    use WithPagination;
    public $sortBy = 'nama';
    public $sortDirection = 'asc';
    public $perPage = 10;
    public $search = '';
    public function render()
    {
        $items = guru::query()
        ->search($this->search)
        ->orderBy($this->sortBy, $this->sortDirection)
        ->paginate($this->perPage);
        return view('livewire.data-table',[
            'items' => $items
        ]);
    }

    public function sortBy($field)
    {
        if ($this->sortDirection == 'asc') {
            $this->sortDirection = 'desc';
        } else {
            $this->sortDirection = 'asc';
        }

        return $this->sortBy = $field;
    }

    public function updatingSearch()
    {
        $this->resetPage();
    }
}
