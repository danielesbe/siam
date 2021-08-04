<div>

    <div class="row mb-4">
        <div class="col form-inline">
            Per Page: &nbsp;
            <select wire:model="perPage" class="form-control">
                <option>2</option>
                <option>5</option>
                <option>10</option>
                <option>15</option>
                <option>25</option>
            </select>
        </div>

        <div class="col">
            <input wire:model.debounce.300ms="search" class="form-control" type="text" placeholder="Search Products...">
        </div>

    </div>

    <table class="table">
        <thead>
            <tr>
                <th wire:click="sortBy('nama')" style="cursor: pointer;">
                    Nama
                    {{-- @include('partials._sort-icon',['field'=>'nama']) --}}
                </th>
                <th wire:click="sortBy('nik')" style="cursor: pointer;">
                    Nik
                    {{-- @include('partials._sort-icon',['field'=>'nik']) --}}
                </th>
            </tr>
        </thead>
        <tbody>
            @foreach ($items as $item)
            <tr>
                <td>{{$item->nama}}</td>
                <td>{{$item->nik}}</td>
            </tr>
            @endforeach </tbody>
    </table>
    <div>
        <p>
            {{$items->links()}}
        </p>
    </div>
</div>
