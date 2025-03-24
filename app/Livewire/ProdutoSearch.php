<?php

namespace App\Http\Livewire;

use App\Models\Produto;
use App\Models\Categoria;
use App\Models\Marca;
use Livewire\Component;
use Livewire\WithPagination;

class ProdutoSearch extends Component
{
    use WithPagination;

    public $searchTerm = '';
    public $categorias = [];
    public $marcas = [];
    public $selectedCategorias = [];
    public $selectedMarcas = [];
    
    // Parâmetros para persistência na URL
    protected $queryString = [
        'searchTerm' => ['except' => ''],
        'selectedCategorias' => ['except' => []],
        'selectedMarcas' => ['except' => []],
    ];

    public function mount()
    {
        // Carregar todas as categorias e marcas para os seletores
        $this->categorias = Categoria::orderBy('nome')->get();
        $this->marcas = Marca::orderBy('nome')->get();
    }

    public function updatingSearchTerm()
    {
        $this->resetPage();
    }

    public function updatingSelectedCategorias()
    {
        $this->resetPage();
    }

    public function updatingSelectedMarcas()
    {
        $this->resetPage();
    }

    public function limparFiltros()
    {
        $this->searchTerm = '';
        $this->selectedCategorias = [];
        $this->selectedMarcas = [];
        $this->resetPage();
    }

    public function render()
    {
        $query = Produto::query();
        
        // Filtro por nome do produto
        if ($this->searchTerm) {
            $query->where('nome', 'like', '%' . $this->searchTerm . '%');
        }
        
        // Filtro por categorias selecionadas
        if (count($this->selectedCategorias) > 0) {
            $query->whereIn('categoria_id', $this->selectedCategorias);
        }
        
        // Filtro por marcas selecionadas
        if (count($this->selectedMarcas) > 0) {
            $query->whereIn('marca_id', $this->selectedMarcas);
        }
        
        // Carregando relacionamentos para exibição
        $produtos = $query->with(['categoria', 'marca'])
                          ->orderBy('nome')
                          ->paginate(10);
        
        return view('livewire.produto-search', [
            'produtos' => $produtos,
        ]);
    }
}