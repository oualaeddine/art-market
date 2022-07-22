<?php

namespace App\Http\Livewire;

use App\Models\Vendor;
use Livewire\Component;
use Livewire\WithPagination;

class VendorsLivewireComponent extends Component
{
    use WithPagination;


    protected $paginationTheme = 'bootstrap';

    public $perPage=12;
    public $search = '';
    public $sort_by='default';

    public function updatingSort_by()
    {
        $this->resetPage();
    }

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function mount()
    {
        $this->sortBy = "default";
    }

    public function render()
    {
        return view('livewire.vendors-livewire-component',[
            'vendors'=>Vendor::query()
                ->whereIsActive(true)
                ->where('name_fr', 'like', '%'.$this->search.'%')
                       ->orWhere('name_ar', 'like', '%'.$this->search.'%')

                ->when($this->sort_by!='default',function ($query){
                    $query->orderByDesc('name_fr');
                },function ($query){
                    $query->orderBy('name_fr');
                })
                ->whereHas('vendors',function ($query){
                    $query->where('is_active',1);
                })
                ->whereHas('active_products')
                ->withCount('active_products as products_count')
                ->paginate($this->perPage)->withQueryString()
        ]);
    }


}
