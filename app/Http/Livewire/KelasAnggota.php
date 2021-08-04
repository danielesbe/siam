<?php

namespace App\Http\Livewire;
use App\Models\kelas;
use Livewire\Component;
use Livewire\WithPagination;

class KelasAnggota extends Component
{
    protected $id_kelas;
    public $search = '';

    public function mount($id_kelas) {
        $this->id_kelas = $id_kelas;
    }
    public function render()
    {
        $filter = $this->search;
        $items = kelas::search($this->search)->find($this->id_kelas);
        return view('livewire.kelas-anggota',[
            'items' => $items,
        ]);
    }

}
