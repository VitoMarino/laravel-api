@extends('layouts.admin')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12">
                <h2 class="d-inline-block p-2 rounded-4" style="background: {{$project->type->color}}">{{$project->type->name}}</h2>
                <h2>{{ $project->name }}</h2>
                <h3>
                    @forelse ( $project->technologies as $technology )
                    <span class="badge" style="background-color:{{$technology->color}}">{{$technology->name}}</span>
                @empty
                    <td>---</td>
                @endforelse
                </h3>
                <h4>{{ $project->activity }}</h4>
                <h4>{{ $project->description }}</h4>
                <h4>{{ $project->date }}</h4>
                <!--Per mostrare immagine uplodata usare asset--->
                <img src="{{asset('storage/' . $project->image)}}" alt="{{$project->activity}}">
            </div>
        </div>
    </div>
@endsection
