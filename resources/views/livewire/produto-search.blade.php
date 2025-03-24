<div>
    <div class="bg-white p-4 rounded shadow mb-6">
        <h2 class="text-lg font-semibold mb-4">Filtrar Produtos</h2>
        
        <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
            <!-- Filtro por nome -->
            <div>
                <label for="searchTerm" class="block mb-1">Nome do Produto</label>
                <input 
                    type="text" 
                    id="searchTerm" 
                    wire:model.live.debounce.300ms="searchTerm" 
                    class="w-full rounded border-gray-300"
                    placeholder="Digite para buscar produtos (mín. 3 caracteres)"
                >
            </div>
            
            <!-- Filtro por categorias -->
            <div>
                <label class="block mb-1">Categorias</label>
                <input 
                    type="text" 
                    wire:model.live.debounce.500ms="categoriaSearch" 
                    class="w-full rounded border-gray-300 mb-2"                    
                >
                <select 
                    wire:model.live="selectedCategorias" 
                    multiple 
                    class="w-full rounded border-gray-300" 
                    size="4"
                >
                    @foreach($categorias as $categoria)
                        <option value="{{ $categoria->id }}">{{ $categoria->nome }}</option>
                    @endforeach
                </select>
                <p class="text-xs text-gray-500 mt-1">Segure CTRL para selecionar múltiplas opções</p>
            </div>
            
            <!-- Filtro por marcas -->
            <div>
                <label class="block mb-1">Marcas</label>
                <select 
                    wire:model.live="selectedMarcas" 
                    multiple 
                    class="w-full rounded border-gray-300" 
                    size="4"
                >
                    @foreach($marcas as $marca)
                        <option value="{{ $marca->id }}">{{ $marca->nome }}</option>
                    @endforeach
                </select>
                <p class="text-xs text-gray-500 mt-1">Segure CTRL para selecionar múltiplas opções</p>
            </div>
        </div>
        
        <div class="mt-4 flex justify-end">
        <button 
            wire:click="limparFiltros"
            class="px-4 py-2 bg-red-500 hover:bg-red-600 rounded text-white transition-colors"
        >
            <i class="fas fa-broom mr-2"></i> Limpar Filtros
        </button>
</div>        
    </div>
    
    <!-- Resultados da busca -->
    <div class="bg-white p-4 rounded shadow">
        <h2 class="text-lg font-semibold mb-4">Resultados</h2>
        
        @if($produtos->count() > 0)
            <div class="overflow-x-auto">
                <table class="w-full border-collapse">
                    <thead>
                        <tr class="bg-gray-100">
                            <th class="border p-2 text-left">Nome</th>
                            <th class="border p-2 text-left">Categoria</th>
                            <th class="border p-2 text-left">Marca</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($produtos as $produto)
                            <tr class="hover:bg-gray-50">
                                <td class="border p-2">{{ $produto->nome }}</td>
                                <td class="border p-2">{{ $produto->categoria->nome }}</td>
                                <td class="border p-2">{{ $produto->marca->nome }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            
            <div class="mt-4">
                {{ $produtos->links() }}
            </div>
        @else
            <div class="py-8 text-center text-gray-500">
                Nenhum produto encontrado para os filtros selecionados.
            </div>
        @endif
    </div>
</div>

<script>
    document.addEventListener('livewire:init', () => {
        Livewire.on('filtrosLimpos', () => {
            console.log('Evento filtrosLimpos recebido');
            // Limpa os parâmetros da URL
            history.replaceState({}, '', window.location.pathname);
        });
    });
</script>