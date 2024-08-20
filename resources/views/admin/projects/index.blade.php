@extends('layouts.admin')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12">
                <table class="table table-hover table-striped">
                    <thead>
                        <tr>
                            <th scope="col">Type</th>
                            <th scope="col">Technology</th>
                            <th scope="col">Name</th>
                            <th scope="col">Activity</th>
                            <th scope="col">Description</th>
                            <th scope="col">Date</th>
                            <th scope="col">Show</th>
                            <th scope="col">Edit</th>
                            <th scope="col">Delete</th>

                        </tr>
                    </thead>

                    <tbody>
                        @foreach ($projects as $project)
                            <tr>
                                <td>{{$project->type->name}}</td>

                                <!--Facendo delle prove ho riscontrato che è necessario fare il forelse prima di poter far vedere gli elementi collegati tra loro-->
                                <td>
                                    @forelse ( $project->technologies as $technology )
                                    <span class="badge" style="background-color:{{$technology->color}}">{{$technology->name}}</span>
                                @empty
                                    <td>---</td>
                                @endforelse
                                </td>

                                <td>{{ $project->name }}</td>
                                <td>{{ $project->activity }}</td>
                                <td>{{ $project->description }}</td>
                                <td>{{ $project->date }}</td>
                                <td>
                                    <a href="{{ route('admin.projects.show', $project) }}" class="btn btn-primary btn-sm">
                                        Show
                                    </a>
                                </td>
                                <td>
                                    <a href="{{ route('admin.projects.edit', $project) }}" class="btn btn-success btn-sm">
                                        Edit
                                    </a>
                                </td>
                                <td>
                                    <form action="{{ route('admin.projects.destroy', $project) }}" method="POST">
                                        @csrf
                                        @method('DELETE')

                                        <input type="submit" value="Delete" class="btn btn-danger btn-sm">
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>

                <!--Meccanismo di paginazione. Prima andare in Providers > AppServiceProvider ed utilizzare la paginazione di Bootstrap.
                    Poi dopo nel Controller, nella index, togliere la ALL che fa vedere tutta la tabella ed inserire paginate-->
                {{$projects->links()}}
            </div>
        </div>
    </div>
@endsection
