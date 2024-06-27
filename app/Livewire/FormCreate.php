<?php

namespace App\Livewire;

use App\Models\Tag;
use App\Models\Article;
use Livewire\Component;
use Illuminate\Support\Str;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Whoops\Run;

class FormCreate extends Component
{

    use WithFileUploads;
    
    public $title;
    public $subtitle;
    public $body;
    public $image;
    public $category_id;
    public $user_id;
    public $tags;
    public $temporary_images;
    public $article;
    public $created_at;

    public $name = ['Politica', 'Economia', 'Food&Drink', 'Sport', 'Intrattenimento', 'Tech'];
    

    protected $messages = [
        'title.required' => 'Il campo Titolo è obbligatorio',
        'title.min' => 'Il campo Titolo deve avere almeno 5 caratteri',
        'title.unique' => 'Titolo già presente a sistema',
        'image.required' => 'Il campo Immagine è obbligatorio',
        'subtitle.required' => 'Il campo Sottotitolo è obbligatorio',
        'subtitle.min' => 'Il campo Sottotitolo deve avere almeno 5 caratteri',
        'body.required' => 'Il campo Testo è obbligatorio',
        'body.min' => 'Il campo Testo deve avere almeno 10 caratteri',
        'category_id.required' => 'Il campo Categoria è obbligatorio',
        'tags.required' => 'Il campo Tag è obbligatorio',
        'image' => 'File non valido o non caricato correttamente',
    ];


    public function mount()
    {

        $this->user_id = Auth::user()->id;
        if ($this->article) {
            $this->title = $this->article->title;
            $this->subtitle = $this->article->subtitle;
            $this->body = $this->article->body;
            $this->image = $this->article->image;
            $this->category_id = $this->article->category_id;
            $this->user_id = $this->article->user_id;
            $this->tags = $this->article->tags->pluck('name')->implode(',');
            $this->created_at = $this->article->created_at;
        }
        
    }

    public function store()
    {
        $this->validate([
            'title' => 'required|unique:articles|min:5',
            'subtitle' => 'required|min:5',
            'body' => 'required|min:10',
            'image' => 'image|required',
            'category_id' => 'required',
            'tags' => 'required',
        ]);



        $imagePath = $this->image->store('public/images');

        $this->article = Article::create ([
            'title' => $this->title,
            'subtitle' => $this->subtitle,
            'body' =>  $this->body,
            'category_id' =>  $this->category_id,
            'user_id' => $this->user_id,
            'slug' => Str::slug($this->title),
            'image' => $imagePath
        ]);



        $tags = explode(',', $this->tags);

        foreach ($tags as $i => $tag) {
            $tags[$i] = trim($tag);
        }

        foreach ($tags as $tag) {
            $newTag = Tag::updateOrCreate(['name' => $tag], ['name' => strtolower($tag)]);
            $this->article->tags()->attach($newTag);
        }

        /* session()->flash('success', 'Articolo creato correttamente.'); */
        return redirect()->route('home')->with('message', 'Hai creato correttamente il tuo articolo');
    }

    public function update(){

        $this->validate([
            'title' => 'required|min:5|unique:articles,title,' . $this->article->id,
            'subtitle' => 'required|min:5',
            'body' => 'required|min:10',
            'category_id' => 'required',
            'tags' => 'required',
        ]);

        
 
        $imagePath = $this->article->image;

        if ($this->image instanceof \Illuminate\Http\UploadedFile) {
            Storage::delete($this->article->image);
            $imagePath = $this->image->store('public/images');
        }
        

        $this->article->update([
            'title' => $this->title,
            'subtitle' => $this->subtitle,
            'body' =>  $this->body,
            'category_id' =>  $this->category_id,
            'user_id' => $this->user_id,
            'slug' => Str::slug($this->title),
            'image' => $imagePath,
        ]);


        
        $tags = explode(',', $this->tags);

        foreach ($tags as $i => $tag) {
            $tags[$i] = trim($tag);
        }

        foreach ($tags as $tag) {
            $newTag = Tag::updateOrCreate(['name' => $tag], ['name' => strtolower($tag)]);
            $this->article->tags()->attach($newTag);
        }

        $this->article->is_accepted = NULL;
        $this->article->save();

        return redirect()->route('writer.dashboard')->with('message', 'Hai creato correttamente il tuo articolo');
    

    }


    public function save()
    {
        if ($this->article) {
            $this->update();
        } else {
            $this->store();
        }
    }

    public function render()
    {
        return view('livewire.form-create');
    }

    
}
