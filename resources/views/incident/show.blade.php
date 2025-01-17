@extends('layouts.app')

@section('title')
Show Incident
@endsection
@section('content')
<div class="bg-light rounded">
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">Show detail</h5>

            <div class="container mt-4">
                <table class="table">
                    <tr>
                        <td width="50%"><strong>Name of Incident Informant :</strong></td>
                        <td>{{ $data->report_by }}</td>
                    </tr>
                    <tr>
                        <td><strong>Division :</strong></td>
                        <td>{{ $data->division }}</td>
                    </tr>
                    <tr>
                        <td><strong>Time of Incident :</strong></td>
                        <td>{{ $data->incident_date }}</td>
                    </tr>
                </table>
                <hr
                style="margin-top: 20px; margin-bottom: 10px; border: none; height: 2px; background-color: #ffffff;">
                <table class="table">
                    <tr>
                        <td width="50%"><strong>Subject of Incident :</strong></td>
                        <td>{{ $data->incident_name }}</td>
                    </tr>
                    <tr>
                        <td><strong>Incident Description :</strong></td>
                        <td>{{ $data->description }}</td>
                    </tr>
                    <tr>
                        <td><strong>Cause of the Incident :</strong></td>
                        <td>{{ $data->cause_incident }}</td>
                    </tr>
                    <tr>
                        <td><strong>Incident Report Recipient :</strong></td>
                        <td>{{ $data->user_pic }}</td>
                    </tr>
                    <tr>
                        <td><strong>Reporting Time :</strong></td>
                        <td>{{ $data->created_date }}</td>
                    </tr>
                </table>
                <hr
                style="margin-top: 20px; margin-bottom: 10px; border: none; height: 2px; background-color: #ffffff;">
                <table class="table">
                    <tr>
                        <td width="50%"><strong>Person Handles Incidents :</strong></td>
                        <td>{{ $data->solved_by }}</td>
                    </tr>
                    <tr>
                        <td><strong>Handling Time :</strong></td>
                        <td> {{ $data->incident_handler_date }}</td>
                    </tr>
                    <tr>
                        <td><strong>Incident Resolution :</strong></td>
                        <td>{{ $data->solution }}</td>
                    </tr>
                    <tr>
                        <td><strong>Resolution Time :</strong></td>
                        <td>{{ $data->incident_finish_date }}</td>
                    </tr>
                </table>
                <hr
                style="margin-top: 20px; margin-bottom: 10px; border: none; height: 2px; background-color: #ffffff;">
                <table class="table">
                    <tr>
                        <td width="50%"><strong>Handling Status :</strong></td>
                        <td>{{ $data->status }}</td>
                    </tr>
                    <tr>
                        <td><strong>Notes :</strong></td>
                        <td> {{ $data->notes }}</td>
                    </tr>
                    <tr>
                        <td><strong>Approval from Head of IT :</strong></td>
                        <td>{{ $data->approve_date }}</td>
                    </tr>
                </table>

               
                <div class="mt-4">
                    <a href="{{ route('incident.edit', $data->id) }}" class="btn btn-info">Edit</a>
                    <a href="{{ route('incident.index') }}" class="btn btn-default">Back</a>
                </div>
            </div>

        </div>

    </div>
</div>
@endsection

<style>
    .table {
        width: 50%; /* Memastikan tabel mengambil lebar penuh */
        border-collapse: separate; /* Menghilangkan jarak antara sel */
        font-size: 14px;
        
    }

    .table td {
        padding: 10px; /* Jarak dalam sel */
        vertical-align: top; /* Memastikan teks di atas */
    }
</style>