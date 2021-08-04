<?php

namespace App\Http\Livewire;

use App\Models\murid;
use Livewire\Component;
use Livewire\WithPagination;

class KelasMurid extends Component
{
    use WithPagination;
    public $perPage = 3;
    public $search = '';
    public $id_kelas;

    public function mount($id_kelas) {
        $this->id_kelas = $id_kelas;
    }
    public function render()
    {
        $items = murid::query()
        ->search($this->search)
        ->paginate($this->perPage);
        return view('livewire.kelas-murid',[
            'items' => $items,
        ]);
    }
    public function updatingSearch()
    {
        $this->resetPage();
    }
}
