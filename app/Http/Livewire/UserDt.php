<?php

namespace App\Http\Livewire;

use App\Models\guru;
use Livewire\Component;
use App\Models\Pengguna;
use Livewire\WithPagination;

class UserDt extends Component
{
        use WithPagination;
        public $sortBy = 'created_at';
        public $sortDirection = 'asc';
        public $perPage = 10;
        public $search = '';
    public function render()
    {
        $items = Pengguna::query()
        ->search($this->search)
        ->orderBy($this->sortBy, $this->sortDirection)
        ->paginate($this->perPage);
        return view('livewire.user-dt',[
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
