<!DOCTYPE html>
<html>
<head>
    <title>Incident Report</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }
        table {
            width: 100%;
            border-collapse: collapse;
        }
        th, td {
            border: 1px solid #ddd;
            padding: 8px;
        }
        th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>
    <h1>Incident Report</h1>
    <div class="container mt-4">
        <table class="table">
            <tr>
                <td width="30%"><strong>Name of Incident Informant </strong></td>
                <td>{{ $name }}</td>
            </tr>
            <tr>
                <td><strong>Division </strong></td>
                <td>{{ $data->division }}</td>
            </tr>
            <tr>
                <td><strong>Time of Incident </strong></td>
                <td>{{ $data->incident_date }}</td>
            </tr>
        </table>
        <hr
        style="margin-top: 20px; margin-bottom: 10px; border: none; height: 2px; background-color: #ffffff;">
        <table class="table">
            <tr>
                <td width="30%"><strong>Subject of Incident </strong></td>
                <td>{{ $data->incident_name }}</td>
            </tr>
            <tr>
                <td><strong>Incident Description </strong></td>
                <td>{{ $data->description }}</td>
            </tr>
            <tr>
                <td><strong>Cause of the Incident </strong></td>
                <td>{{ $data->cause_incident }}</td>
            </tr>
            <tr>
                <td><strong>Incident Report Recipient </strong></td>
                <td>{{  $pic }}</td>
            </tr>
            <tr>
                <td><strong>Reporting Time </strong></td>
                <td>{{ $data->created_at }}</td>
            </tr>
        </table>
        <hr
        style="margin-top: 20px; margin-bottom: 10px; border: none; height: 2px; background-color: #ffffff;">
        <table class="table">
            <tr>
                <td width="30%"><strong>Person Handles Incidents </strong></td>
                <td>{{ $solved }}</td>
            </tr>
            <tr>
                <td><strong>Handling Time </strong></td>
                <td> {{ $data->incident_handler_date }}</td>
            </tr>
            <tr>
                <td><strong>Incident Resolution </strong></td>
                <td>{{ $data->solution }}</td>
            </tr>
            <tr>
                <td><strong>Resolution Time </strong></td>
                <td>{{ $data->incident_finish_date }}</td>
            </tr>
        </table>
        <hr
        style="margin-top: 20px; margin-bottom: 10px; border: none; height: 2px; background-color: #ffffff;">
        <table class="table">
            <tr>
                <td width="30%"><strong>Handling Status </strong></td>
                <td>{{ $data->status }}</td>
            </tr>
            <tr>
                <td><strong>Notes </strong></td>
                <td> {{ $data->notes }}</td>
            </tr>
            <tr>
                <td><strong>Approval from Head of IT </strong></td>
                <td>{{ $data->approve_date }}</td>
            </tr>
        </table>

    </div>
</body>
</html>