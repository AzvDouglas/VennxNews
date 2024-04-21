<?php

namespace App\Livewire\Noticia;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use Livewire\WithFileUploads;
use Illuminate\Http\UploadedFile;
use App\Models\Noticia;

class Index extends Component
{
    use WithFileUploads;

    public $titulo;
    public $descricao;
    public $imagem;
    public $noticias;
    public $noticiaId;
    public $noticia;
    public $editNews;

    protected $rules = [
        'titulo' => 'required|min:3',
        'descricao' => 'required|min:10',
    ];

    protected $messages = [
        'titulo.required' => 'O campo título é obrigatório.',
        'titulo.min' => 'O campo título deve ter no mínimo :min caracteres.',
        'descricao.required' => 'O campo descrição é obrigatório.',
        'descricao.min' => 'O campo descrição deve ter no mínimo :min caracteres.',
        'imagem' => 'Faça o upload de um arquivo de imagem válido por favor.'
    ];



    public function updated($propertyName)
    {
        if ($propertyName === 'imagem') {
            $this->rules['imagem'] = $this->imagem instanceof UploadedFile
                ? 'image|mimes:jpeg,png,jpg,gif,svg|max:2048'
                : 'sometimes|url';
        }
        $this->validateOnly($propertyName);
    }

    public function edit($noticiaId)
    {
        $noticia = Noticia::find($noticiaId);
    
        if ($noticia) {
            $this->noticiaId = $noticiaId;
            $this->titulo = $noticia->titulo;
            $this->descricao = $noticia->descricao;
            $this->imagem = $noticia->imagem;
            $this->editNews = true; // Altera a flag para exibir o formulário de edição
        } else {
            session()->flash('error', 'Notícia não encontrada.');
        }
    }
    
    public function save()
    {
        try {
            $validatedData = $this->validate();

            if ($this->imagem instanceof UploadedFile) {
                $imagemPath = $this->imagem->store('imagens', 'public');
            } else {
                $imagemPath = $this->imagem;
            }

            Noticia::create([
                'titulo' => $validatedData['titulo'],
                'descricao' => $validatedData['descricao'],
                'imagem' => $imagemPath,
                'user_id' => auth()->user()->id,
            ]);
            //limpar o formulário
            $this->titulo = '';
            $this->descricao = '';

            session()->flash('success', 'Notícia criada com sucesso.');

            return $this->redirect('/dashboard');
        } catch (\Exception $e) {
            session()->flash('error', 'Ocorreu um erro ao criar a notícia. Por favor, tente novamente.' . PHP_EOL . $e);
        }
    }


    public function mount()
    {
        $user = Auth::user();
        $this->noticias = $user->noticias->sortByDesc('created_at');
    }

    public function render()
    {
        return view('livewire.noticia.index');
    }
}
