            <div class="containerArticleCreate">

                <div class="boxPreviewArticleCreate">
                    <div class="containerAllCard ">
                        @if (empty($image))
                            <div aria-hidden="true" style="height: 100%">
                                <div class="card-text placeholder-glow skeleton centro-skeletron" style="height: 95%">
                                    <span class="placeholder col-12 "
                                        style="height: 100%; width: 100%;cursor:default;"></span>
                                </div>
                            </div>
                        @else
                            @if (is_object($image))
                                <img style="object-position: top" src="{{ $image->temporaryUrl() }}" alt="">
                            @else
                                <img src="{{ Storage::url($image) }}" alt="">
                            @endif
                        @endif
                        <div class="containerDetailAllCard">
                            @if ($created_at == false)
                                <p>{{ date('d/m/Y H:i') }}</p>
                            @else
                                <p>{{ $created_at }}</p>
                            @endif
                            <h4 class="card-text placeholder-glow skeleton centro-skeletron">
                                @if ($title == false)
                                    <span class="placeholder col-2" style="cursor:default"></span>
                                @else
                                    {{ $title }}
                                @endif
                            </h4>
                            {{--  <h4>{{($title) ? $title : '-------' }}</h4> --}}
                            <h5 class="card-text placeholder-glow skeleton centro-skeletron">
                                @if ($subtitle == false)
                                    <span class="placeholder col-2" style="cursor:default"></span>
                                @else
                                    {{ $subtitle }}
                                @endif
                            </h5>
                            <div class="containerTagAllCard">
                                <p class="card-text placeholder-glow skeleton centro-skeletron">
                                    @if ($category_id == false)
                                        <span class="placeholder col-12" style="cursor:default"></span>
                                    @else
                                        {{ $name[$category_id - 1] . '.' }} &nbsp;
                                    @endif
                                </p>
                                <p class="card-text placeholder-glow skeleton centro-skeletron">
                                    @if ($tags == false)
                                        <span class="placeholder col-6" style="cursor:default"></span>
                                    @else
                                        {{ $tags }}&nbsp;
                                    @endif
                                </p>
                                <p>{{ Auth::user()->name }}</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="containerFormCreateArticle">

                    <form class="formCreateArticle" wire:submit.prevent="save" enctype="multipart/form-data">

                        @csrf
                     
                            <label for="title" class="form-label"></label>
                            <input style="border-radius: 0px" placeholder="Titolo" type="text" name="title"
                                class="form-control" id="title" wire:model="title" value="">
                            @error('title')
                                <div class="divErrorBox">{{ $message }}</div>
                            @enderror
                       
                            <label for="subtitle" class="form-label"></label>
                            <input style="border-radius: 0px" placeholder="Sottotitolo" type="text" name="subtitle"
                                class="form-control" id="subtitle" wire:model="subtitle" value="">
                            @error('subtitle')
                                <div class="divErrorBox">{{ $message }}</div>
                            @enderror
                       
                            <label for="image" class="form-label"></label>
                            <input style="border-radius: 0px" placeholder="Immagine" type="file" name="image"
                                class="form-control" id="image" wire:model="image">
                            @error('image')
                                <div class="divErrorBox">{{ $message }}</div>
                            @enderror
                    
                            <label for="tags" class="form-label"></label>
                            <input style="border-radius: 0px" placeholder="Tags" name="tags" class="form-control"
                                id="tags" wire:model.blur="tags">

                            @error('tags')
                                <div class="divErrorBox">{{ $message }}</div>
                            @enderror
                     
                            <label for="category" class="form-label"></label>
                            <select style="border-radius: 0px" name="category" id="category"
                                class="form-control text-capitalize" wire:model="category_id">
                                <option value="">Scegli la categoria</option>
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                                @endforeach
                            </select>
                            @error('category_id')
                                <div class="divErrorBox">{{ $message }}</div>
                            @enderror
                     
                            <label for="body" class="form-label"></label>
                            <textarea style="border-radius: 0px" placeholder="Corpo del testo" name="body" id="body" cols="30"
                                rows="7" class="form-control" wire:model.live="body"></textarea>
                            @error('body')
                                <div class="divErrorBox">{{ $message }}</div>
                            @enderror
                  


                        <div>
                            <button class="bottomFormCreateArticle">
                                @if ($created_at == false)
                                    Crea il tuo articolo
                                @else
                                    Modifica l'articolo
                                @endif
                            </button>
                        </div>

                    </form>
                </div>

            </div>
