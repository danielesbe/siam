<?php

namespace App\Http\Livewire;

use App\Models\ppdb;
use Livewire\Component;
use Livewire\WithPagination;

class HasilPpdb extends Component
{
    use WithPagination;
    public $sortBy = 'created_at';
    public $sortDirection = 'asc';
    public $perPage = 10;
    public $search = '';
    public function render()
    {

        return view('livewire.hasil-ppdb',[
            'items' => ppdb::query()
            ->where('status','diterima')
            ->cari($this->search)
            ->orderBy($this->sortBy, $this->sortDirection)
            ->paginate($this->perPage)
        ]);
    }
}
