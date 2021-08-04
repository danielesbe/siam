<?php

namespace App\Http\Livewire;

use App\Models\kelas;
use Livewire\Component;
use App\Models\tahun_ajaran;
use Livewire\WithPagination;

class KelasDt extends Component
{
        use WithPagination;
        public $sortBy = 'created_at';
        public $sortDirection = 'asc';
        public $perPage = 10;
        public $search = '';
        public $tahun_list = [];
        public $tahun_ajaran = '';
    public function mount()
    {

        $tahun = tahun_ajaran::all();
        $tahun_active = tahun_ajaran::where('status',1)->first();
        $this->tahun_ajaran = $tahun_active->id;
        // $this->tahun_ajaran = $tahun_active;
        $this->tahun_list = $tahun;
    }
    public function render()
    {

        $items = kelas::query()
        ->where('id_tahun_ajaran',$this->tahun_ajaran)
        ->where('nama','like','%'.$this->search.'%')
        ->orderBy($this->sortBy, $this->sortDirection)
        ->paginate($this->perPage);
        $items->loadCount(['murid']);
        return view('livewire.kelas-dt',[
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
