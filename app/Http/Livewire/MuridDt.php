<?php

namespace App\Http\Livewire;

use App\Models\murid;
use Livewire\Component;
use Livewire\WithPagination;

class MuridDt extends Component
{
        use WithPagination;
        public $sortBy = 'created_at';
        public $sortDirection = 'asc';
        public $perPage = 10;
        public $search = '';
    public function render()
    {
        $items = murid::query()
        ->search($this->search)
        ->orderBy($this->sortBy, $this->sortDirection)
        ->paginate($this->perPage);
        return view('livewire.murid-dt',[
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
