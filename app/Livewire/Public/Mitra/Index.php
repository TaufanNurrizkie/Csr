<?php

namespace App\Livewire\Public\Mitra;

use App\Models\Mitra;
use Livewire\Component;

class Index extends Component
{
    public $mitras;
    public $search = '';
    public $sortOption = 'terbanyak'; // Default sort option

    public function mount()
    {   
        $this->loadMitras(); // Load mitras when the component mounts
    }

    public function updatedSearch()
    {
        $this->loadMitras(); // Load mitras whenever the search value is updated
    }

    public function updatedSortOption()
    {
        \Log::info('Sort option updated to: ' . $this->sortOption);
        $this->loadMitras(); // Reload mitras on sort option change
    }
    

    protected function loadMitras()
    {
        // Create a query with search and sort options
        $query = Mitra::withCount('reports')
            ->where('nama', 'like', "%{$this->search}%"); // Filter by search

        // Apply sorting based on the selected option
        if ($this->sortOption === 'terbanyak') {
            $query->orderBy('reports_count', 'desc');
        } else {
            $query->orderBy('reports_count', 'asc');
        }

        // Execute the query and assign results to mitras
        $this->mitras = $query->get();
    }

    public function render()
    {
        return view('livewire.public.mitra.index')->layout('components.layouts.public');
    }
}
