@extends('layouts.app')

@section('title')
Incident List
@endsection

@section('content')
<div class="bg-light rounded">
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">Incident</h5>
            <h6 class="card-subtitle mb-2 text-muted"> Manage Incident.</h6>

            <div class="mt-2">
                @include('layouts.includes.messages')
            </div>

            <div class="mb-2 text-end">
                <a href="{{ route('incident.create') }}" class="btn btn-primary btn-sm float-right">Add Incident</a>
            </div>

            <table class="table table-striped">
                <thead>
                    <tr>
                        <th scope="col" width="1%">#</th>
                        <th scope="col" width="15%">Incident Name</th>
                        <th scope="col">Division</th>
                        <th scope="col" width="10%">Report By</th>
                        <th scope="col" width="10%">status</th>
                        <th scope="col" width="1%" colspan="3"></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($incidentList as $data)
                    <tr>
                        <th scope="row">{{ $data->id }}</th>
                        <td>{{ $data->incident_name }}</td>
                        <td>{{ $data->division }}</td>
                        <td>{{ $data->report_by }}</td>
                        <td>{{ $data->status}}</td>
                        <td><a href="{{ route('incident.show', $data->id) }}" class="btn btn-info btn-sm">Show</a></td>
                        <td><a href="{{ route('incident.edit', $data->id) }}" class="btn btn-warning btn-sm">Edit</a></td>
                        <td><form action="{{ route('incident.destroy', $data->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                        </form></td>
                    </tr>
                    @endforeach
                </tbody>
            </table>

        </div>
    </div>
</div>
@endsection