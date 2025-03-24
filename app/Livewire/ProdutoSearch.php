<?php

namespace App\Livewire;

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
    public $categoriaSearch = ''; // Novo campo para busca de categoria
    
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

    public function updated($property)
    {
        // Resetar a página quando qualquer filtro for alterado
        $this->resetPage();
        
        // Se estiver pesquisando categoria e tiver menos de 3 caracteres, limpa a seleção
        if ($property === 'categoriaSearch' && strlen($this->categoriaSearch) < 3) {
            $this->selectedCategorias = [];
        }
    }

    public function updatedCategoriaSearch($value)
    {
        if (strlen($value) >= 3) {
            $this->categorias = Categoria::where('nome', 'like', '%' . $value . '%')
                ->orderBy('nome')
                ->get();
        } else {
            $this->categorias = Categoria::orderBy('nome')->get();
        }
    }

    public function limparFiltros()
    {
        // Reseta todas as propriedades de filtro
        $this->reset(['searchTerm', 'selectedCategorias', 'selectedMarcas', 'categoriaSearch']);
        
        // Recarrega as listas completas de categorias e marcas
        $this->categorias = Categoria::orderBy('nome')->get();
        $this->marcas = Marca::orderBy('nome')->get();
        
        // Força o reset da página
        $this->resetPage();
        
        // Emite um evento para limpar a URL
        $this->dispatch('filtrosLimpos');
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