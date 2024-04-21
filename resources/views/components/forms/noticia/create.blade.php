<div>
    <div @keydown.escape.window="createNews = false"
    class="fixed w-full max-w-xl p-6 transform -translate-x-1/2 -translate-y-1/2 rounded-lg shadow-lg bg-slate-300 top-1/2 left-1/2 dark:bg-gray-800">
    <button type="button" @click="createNews = false" class="absolute top-0 right-0 p-3 text-red-500 focus:outline-none">
        <svg class="w-10 h-10" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
        </svg>
    </button>
    <div class="mb-8 text-center">
        <h1 class="text-2xl font-semibold text-gray-800 dark:text-gray-200">
            Cadastrar Notícia
        </h1>
    </div>    <!-- Formulário blurwire -->
    <form wire:submit="save">
        <!-- Título -->
        <div class="mb-4">
            <label for="titulo" class="block text-sm font-semibold text-gray-700 dark:text-gray-300">Título:</label>
            <input type="text" wire:model.live="titulo"
                class="w-full px-4 py-2 border rounded-md focus:outline-none focus:border-green-500 dark:bg-gray-700 dark:border-gray-500 dark:text-gray-300">
            @error('titulo') <span class="text-sm text-red-500">{{ $message }}</span> @enderror
        </div>

        <!-- Descrição -->
        <div class="mb-4">
            <label for="descricao" class="block text-sm font-semibold text-gray-700 dark:text-gray-300">Descrição:</label>
            <textarea wire:model.live="descricao" rows="4"
                class="w-full px-4 py-2 border rounded-md focus:outline-none focus:border-green-500 dark:bg-gray-700 dark:border-gray-500 dark:text-gray-300">
            </textarea>
            @error('descricao') <span class="text-sm text-red-500">{{ $message }}</span> @enderror
        </div>
      
        <div class="mb-4"
            x-data="{ fileUpload: false }">
            <div class="flex items-center mb-4">
                <label for="uploadOption" class="mr-4 text-sm font-semibold text-gray-700 dark:text-gray-300">Upload de aquivo de imagem:</label>
                <div class="relative">
                    <!-- Botão de switch -->
                    <button type="button" @click="fileUpload = !fileUpload" :class="{ 'bg-green-500' : fileUpload, 'bg-gray-300': !fileUpload }" class="flex items-center w-12 h-6 transition-colors duration-200 ease-in-out rounded-full focus:outline-none">
                        <span class="sr-only">Alternar</span>
                        <span aria-hidden="true" :class="{ 'translate-x-6': fileUpload, 'translate-x-0': !fileUpload }" class="inline-block w-5 h-5 transition-transform ease-in-out transform bg-white rounded-full shadow ring-0"></span>
                    </button>
                </div>
            </div>
            <!-- Upload de arquivo de Imagem -->
            <div class="mb-4" x-show="fileUpload">
                <label for="imagem" class="block text-sm font-semibold text-gray-700 dark:text-gray-300">Imagem:</label>
                <input type="file" wire:model.blur="imagem" id="imagem" class="w-full px-4 py-2 border rounded-md focus:outline-none focus:border-green-500 dark:bg-gray-700 dark:border-gray-500 dark:text-gray-300">
                @error('imagem') <span class="text-sm text-red-500">{{ $message }}</span> @enderror
            </div>

            <!-- Upload de Imagem via URL -->
            <div class="mb-4"  x-show="!fileUpload">
                <label for="imagem" class="block text-sm font-semibold text-gray-700 dark:text-gray-300">URL da Imagem:</label>
                <input type="text" wire:model.blur="imagem" id="imagem" class="w-full px-4 py-2 border rounded-md focus:outline-none focus:border-green-500 dark:bg-gray-700 dark:border-gray-500 dark:text-gray-300" placeholder="Cole aqui o link da imagem da sua notícia">
                @error('imagem') <span class="text-sm text-red-500">{{ $message }}</span> @enderror
            </div>
        </div>
        
        <!-- Botões -->
        <div class="flex justify-between">
			<button type="submit" class="px-6 py-2 text-sm font-bold text-green-200 bg-green-800 rounded-md shadow-sm hover:bg-green-700 hover:text-white focus:outline-none focus:shadow-outline-green active:bg-blue-800">
				<i class="fa-classic fa-solid fa-floppy-disk"></i>
				Salvar
			</button>
			
			
			
			<button type="button" @click="createNews = !createNews" class="px-6 py-2 text-sm font-semibold text-white bg-red-500 rounded-md hover:bg-red-700 focus:outline-none focus:shadow-outline-red active:bg-red-800">
				Cancelar
			</button>
        </div>
    </form>
</div>
</div>
