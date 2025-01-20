@extends('layouts.app')

@section('title')
    Create User
@endsection

@section('content')
    <div class="container">
        <div class="bg-light p-4 rounded">
            <h1>Add new incident</h1>
            <div class="lead">
                Describe and detail the incident you have handled.
            </div>

            <div class="container mt-4">
                <form method="POST" action="{{ route('incident.add') }}">
                    @csrf
                    <div class="mb-3">
                        <label for="report_by" class="form-label">Name of Incident Informant</label>
                        <div class="form-group">
                            <select name="report_by" class="form-control" required>
                                <option value="" disabled selected>Choose Informant</option>
                                @foreach ($users as $user)
                                    <option value="{{ $user->id }}" {{ old('report_by') == $user->id ? 'selected' : '' }}>
                                        {{ $user->name }} 
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        @if ($errors->has('report_by'))
                            <span class="text-danger text-left">{{ $errors->first('report_by') }}</span>
                        @endif
                    </div>
                    <div class="mb-3">
                        <label for="division" class="form-label">Division</label>
                        <input value="{{ old('division') }}" type="text" class="form-control" name="division"
                            placeholder="Division" required>

                        @if ($errors->has('division'))
                            <span class="text-danger text-left">{{ $errors->first('division') }}</span>
                        @endif
                    </div>
                    <div class="mb-3">
                        <label for="incident_date" class="form-label">Time of Incident</label>
                        <input value="{{ old('incident_date') }}" type="datetime-local" class="form-control" name="incident_date"
                            required>

                        @if ($errors->has('incident_date'))
                            <span class="text-danger text-left">{{ $errors->first('incident_date') }}</span>
                        @endif
                    </div>
                    <hr
                        style="margin-top: 40px; margin-bottom: 30px; border: none; height: 2px; background-color: #777777;">
                    <div class="mb-3">
                        <label for="incident_name" class="form-label">Subject of Incident</label>
                        <input value="{{ old('incident_name') }}" type="text" class="form-control" name="incident_name"
                            placeholder="Subject" required>

                        @if ($errors->has('incident_name'))
                            <span class="text-danger text-left">{{ $errors->first('incident_name') }}</span>
                        @endif
                    </div>
                    <div class="mb-3">
                        <label for="description" class="form-label">Incident Description</label>
                        <textarea class="form-control" name="description" placeholder="Incident Description" required rows="4">{{ old('description') }}</textarea>

                        @if ($errors->has('description'))
                            <span class="text-danger text-left">{{ $errors->first('description') }}</span>
                        @endif
                    </div>
                    <div class="mb-3">
                        <label for="cause_incident" class="form-label">Cause of the Incident</label>
                        <textarea class="form-control" name="cause_incident" placeholder="Cause of the Incident" required rows="2">{{ old('cause_incident') }}</textarea>

                        @if ($errors->has('cause_incident'))
                            <span class="text-danger text-left">{{ $errors->first('cause_incident') }}</span>
                        @endif
                    </div>
                    <div class="mb-3">
                        <label for="user_pic" class="form-label">Incident Report Recipient</label>
                        <div class="form-group">
                            <select name="user_pic" class="form-control" required>
                                <option value="" disabled selected>Choose Recipient</option>
                                @foreach ($users as $user)
                                <option value="{{ $user->id }}" {{ old('user_pic') == $user->id ? 'selected' : '' }}>
                                    {{ $user->name }} 
                                </option>
                            @endforeach
                            </select>
                        </div>
                        @if ($errors->has('user_pic'))
                            <span class="text-danger text-left">{{ $errors->first('user_pic') }}</span>
                        @endif
                    </div>
                    <hr
                        style="margin-top: 40px; margin-bottom: 30px; border: none; height: 2px; background-color: #777777;">
                    <div class="mb-3">
                        <label for="solved_by" class="form-label">Person Handles Incidents</label>
                        <div class="form-group">
                            <select name="solved_by" class="form-control" required>
                                <option value="" disabled selected>Choose Recipient</option>
                                @foreach ($users as $user)
                                <option value="{{ $user->id }}" {{ old('solved_by') == $user->id ? 'selected' : '' }}>
                                    {{ $user->name }}
                                </option>
                            @endforeach
                            </select>
                        </div>
                        @if ($errors->has('solved_by'))
                            <span class="text-danger text-left">{{ $errors->first('solved_by') }}</span>
                        @endif
                    </div>
                    <div class="mb-3">
                        <label for="incident_handler_date" class="form-label">Handling Time</label>
                        <input value="{{ old('incident_handler_date') }}" type="datetime-local" class="form-control"
                            name="incident_handler_date" required>

                        @if ($errors->has('incident_handler_date'))
                            <span class="text-danger text-left">{{ $errors->first('incident_handler_date') }}</span>
                        @endif
                    </div>
                    <div class="mb-3">
                        <label for="solution" class="form-label">Incident Resolution</label>
                        <textarea class="form-control" name="solution" placeholder="Incident Resolution" required rows="2">{{ old('solution') }}</textarea>

                        @if ($errors->has('solution'))
                            <span class="text-danger text-left">{{ $errors->first('solution') }}</span>
                        @endif
                    </div>

                    <div class="mb-3">
                        <label for="incident_finish_date" class="form-label">Resolution Time</label>
                        <input value="{{ old('incident_finish_date') }}" type="datetime-local" class="form-control"
                            name="incident_finish_date" required>

                        @if ($errors->has('incident_finish_date'))
                            <span class="text-danger text-left">{{ $errors->first('incident_finish_date') }}</span>
                        @endif
                    </div>
                    <hr
                        style="margin-top: 40px; margin-bottom: 30px; border: none; height: 2px; background-color: #777777;">
                    <div class="mb-3">
                        <label for="status" class="form-label">Handling Status</label>
                        <div class="form-group">
                            <select name="status" class="form-control" required>
                                <option value="" disabled selected>Choose Status</option>
                                <option value="DONE" {{ old('status') == 'DONE' ? 'selected' : '' }}>DONE</option>
                                <option value="ONPROGRESS" {{ old('status') == 'ONPROGRESS' ? 'selected' : '' }}>
                                    ONPROGRESS</option>
                                <option value="DECLINE" {{ old('status') == 'DECLINE' ? 'selected' : '' }}>DECLINE
                                </option>
                                <option value="APPROVED" {{ old('status') == 'APPROVED' ? 'selected' : '' }}>APPROVED
                                </option>
                            </select>

                        </div>
                        @if ($errors->has('status'))
                            <span class="text-danger text-left">{{ $errors->first('status') }}</span>
                        @endif
                    </div>

                    <div class="mb-3">
                        <label for="notes" class="form-label">Notes</label>
                        <textarea class="form-control" name="notes" placeholder="Note" rows="2">{{ old('Notes') }}</textarea>

                        @if ($errors->has('Notes'))
                            <span class="text-danger text-left">{{ $errors->first('Notes') }}</span>
                        @endif
                    </div>

                    <div class="mb-3">
                        <label for="approve_date" class="form-label">Approval from Head of IT</label>
                        <div class="form-group">
                            <input value="{{ old('approve_date') }}" type="datetime-local" class="form-control"
                                name="approve_date">

                        </div>
                        @if ($errors->has('approve_date'))
                            <span class="text-danger text-left">{{ $errors->first('approve_date') }}</span>
                        @endif
                    </div>
                    <button type="submit" class="btn btn-primary" style="margin-top: 40px">Save Report</button>
                    <a href="{{ route('incident.index') }}" class="btn btn-default" style="margin-top: 40px">Back</a>
                </form>
            </div>

        </div>
    @endsection
