@extends('layouts.admin')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12">
                <form action="{{ route('admin.projects.update', $project->id) }}" method="POST" enctype='multipart/form-data'>
                    @method('PUT')
                    @csrf

                    <div class="mb-3">
                        <label for="name">Name</label>
                        <input type="text" name="name" id="name" class="form-control mb-3"
                            value="{{ $project->name }}">
                        @error('name')
                            <div class="alert alert-danger">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="activity">Activity</label>
                        <input type="text" name="activity" id="activity" class="form-control mb-3"
                            value="{{ $project->activity }}">
                        @error('activity')
                            <div class="alert alert-danger">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="type_id">Type</label>
                        <select class="form-select mb-3" aria-label="Default select example" name="type_id">
                            @foreach ($types as $type)
                                <!--All'interno della option gli sto dicendo che se non trova la categoria che ho selezionato, deve comunque lasciare quella che ho messo. WARNING: Usare doppio uguale e NON triplo uguale, in questo caso.-->
                                <option value="{{ $type->id }}"
                                    {{ $type->id == old('type_id', $project->type_id) ? 'selected' : '' }}>

                                    {{ $type->name }}
                                </option>
                            @endforeach
                        </select>
                        @error('type_id')
                            <div class="alert alert-danger">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <!--CHECKBOX-->
                    <div class="mb-3">
                        <label for="technology" class="d-block">Technolgy</label>
                            <div class="btn-group" role="group" aria-label="Basic checkbox toggle button group">
                                @foreach ($technologies as $technology)
                                <!--Per evitare che si selezioni sempre lo stesso badge, devo modificare l'id aggiungendo quello che ho scritto sotto-->
                                <!--COSA IMPORTANTE DA RICORDARE. Nel caso di una checbox, nel name, per passare i dati correttamente dobbiamo mettere [], per passare tutti i dati.-->

                                <!--Con questa serie di if, sto dicendo: "Se c'è un errore lascia che si vedano ancora i badge che ho cliccato io.
                                Se però torno indietro, non salvandolo e quindi non editandolo, mi si vedono selezionati solo i badge salvati ed editati effettivi-->
                                @if($errors->any())
                                    <input name="technologies[]" type="checkbox" class="btn-check"
                                        id="technology-check-{{ $technology->id }}" autocomplete="off"
                                        value="{{ $technology->id }}"
                                        {{ in_array($technology->id, old('technologies', [])) ? 'checked' : '' }}>
                                @else
                                    <input name="technologies[]" type="checkbox" class="btn-check"
                                        id="technology-check-{{ $technology->id }}" autocomplete="off"
                                        value="{{ $technology->id }}"
                                        {{ $project->technologies->contains($technology) ? 'checked' : '' }}>
                                @enderror

                                <label class="btn btn-outline-primary me-2 rounded-3"
                                    for="technology-check-{{ $technology->id }}">{{ $technology->name }}</label>
                            @endforeach
                            </div>
                        @error('technologies')
                            <div class="alert alert-danger mt-3">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="name">Description</label>
                        <input type="text" name="description" id="description" class="form-control mb-3"
                            value="{{ $project->description }}">
                        @error('description')
                            <div class="alert alert-danger">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="name">Image</label>
                        <input type="file" name="image" id="image" class="form-control mb-3"
                            value="{{ $project->image }}">
                        @error('image')
                            <div class="alert alert-danger">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <input type="submit" value="Edit" class="btn btn-primary">
                    <input type="reset" value="Reset" class="btn btn-warning">
                </form>
            </div>
        </div>
    </div>
@endsection
