<?php

namespace App\Http\Livewire;

use App\Models\guru;
use Livewire\Component;
use Livewire\WithPagination;

class KelasGuru extends Component
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
        $items = guru::query()
        ->search($this->search)
        ->orWhereHas('mapel', function ($query) {
            $query->where('nama','like','%'.$this->search.'%')
            ->orWhere('kode','like','%'.$this->search.'%');
        })
        ->paginate($this->perPage);
        return view('livewire.kelas-guru',[
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
