<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\tahun_ajaran;
use Livewire\WithPagination;

class TahunDt extends Component
{
        use WithPagination;
        public $sortBy = 'created_at';
        public $sortDirection = 'asc';
        public $perPage = 10;
        public $search = '';
    public function render()
    {
        $items = tahun_ajaran::query()
        ->search($this->search)
        ->orderBy($this->sortBy, $this->sortDirection)
        ->paginate($this->perPage);
        return view('livewire.tahun-dt',[
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
