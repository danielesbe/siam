<?php

namespace App\Http\Livewire;

use App\Models\guru;
use Livewire\Component;
use Livewire\WithPagination;

class GuruDt extends Component
{
        use WithPagination;
        public $sortBy = 'created_at';
        public $sortDirection = 'asc';
        public $perPage = 10;
        public $search = '';
    public function render()
    {
        $items = guru::query()
        ->search($this->search)
        ->orWhereHas('mapel', function ($query) {
            $query->where('nama','like','%'.$this->search.'%');
        })
        ->orderBy($this->sortBy, $this->sortDirection)
        ->paginate($this->perPage);
        return view('livewire.guru-dt',[
            'items' => $items,
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
