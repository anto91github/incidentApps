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
                        <label for="name" class="form-label">Name of Incident Informant</label>
                        <div class="form-group">
                            <select name="name" class="form-control" required>
                                <option value="" disabled selected>Choose Informant</option>
                                <option value="1" {{ old('name') == '1' ? 'selected' : '' }}>1</option>
                                <option value="2" {{ old('name') == '2' ? 'selected' : '' }}>2</option>
                            </select>
                        </div>
                        @if ($errors->has('name'))
                            <span class="text-danger text-left">{{ $errors->first('name') }}</span>
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
                        <label for="dateof" class="form-label">Time of Incident</label>
                        <input value="{{ old('dateof') }}" type="datetime-local" class="form-control" name="dateof"
                            required>

                        @if ($errors->has('dateof'))
                            <span class="text-danger text-left">{{ $errors->first('dateof') }}</span>
                        @endif
                    </div>
                    <hr
                        style="margin-top: 40px; margin-bottom: 30px; border: none; height: 2px; background-color: #777777;">
                    <div class="mb-3">
                        <label for="subject" class="form-label">Subject of Incident</label>
                        <input value="{{ old('subject') }}" type="text" class="form-control" name="subject"
                            placeholder="Subject" required>

                        @if ($errors->has('subject'))
                            <span class="text-danger text-left">{{ $errors->first('subject') }}</span>
                        @endif
                    </div>
                    <div class="mb-3">
                        <label for="Incidentdesc" class="form-label">Incident Description</label>
                        <textarea class="form-control" name="Incidentdesc" placeholder="Incident Description" required rows="4">{{ old('Incidentdesc') }}</textarea>

                        @if ($errors->has('Incidentdesc'))
                            <span class="text-danger text-left">{{ $errors->first('Incidentdesc') }}</span>
                        @endif
                    </div>
                    <div class="mb-3">
                        <label for="Incidentcause" class="form-label">Cause of the Incident</label>
                        <textarea class="form-control" name="Incidentcause" placeholder="Cause of the Incident" required rows="2">{{ old('Incidentcause') }}</textarea>

                        @if ($errors->has('Incidentcause'))
                            <span class="text-danger text-left">{{ $errors->first('Incidentcause') }}</span>
                        @endif
                    </div>
                    <div class="mb-3">
                        <label for="categoryreport" class="form-label">Incident Report Recipient</label>
                        <div class="form-group">
                            <select name="categoryreport" class="form-control" required>
                                <option value="" disabled selected>Choose Recipient</option>
                                <option value="1" {{ old('categoryreport') == '1' ? 'selected' : '' }}>Rudi</option>
                                <option value="2" {{ old('categoryreport') == '2' ? 'selected' : '' }}>Edy</option>
                                <option value="3" {{ old('categoryreport') == '3' ? 'selected' : '' }}>Alim</option>
                                <option value="4" {{ old('categoryreport') == '4' ? 'selected' : '' }}>Lukas</option>
                                <option value="5" {{ old('categoryreport') == '5' ? 'selected' : '' }}>Johan</option>
                                <option value="6" {{ old('categoryreport') == '6' ? 'selected' : '' }}>Billy</option>
                                <option value="7" {{ old('categoryreport') == '7' ? 'selected' : '' }}>Nasya</option>
                                <option value="8" {{ old('categoryreport') == '8' ? 'selected' : '' }}>Albert</option>
                                <option value="9" {{ old('categoryreport') == '9' ? 'selected' : '' }}>Anto</option>
                                <option value="10" {{ old('categoryreport') == '10' ? 'selected' : '' }}>Akbar</option>
                                <option value="11" {{ old('categoryreport') == '11' ? 'selected' : '' }}>Fajar</option>
                            </select>
                        </div>
                        @if ($errors->has('categoryreport'))
                            <span class="text-danger text-left">{{ $errors->first('categoryreport') }}</span>
                        @endif
                    </div>
                    <div class="mb-3">
                        <label for="datereport" class="form-label">Reporting Time</label>
                        <input value="{{ old('datereport') }}" type="datetime-local" class="form-control" name="datereport"
                            required>

                        @if ($errors->has('datereport'))
                            <span class="text-danger text-left">{{ $errors->first('datereport') }}</span>
                        @endif
                    </div>
                    <hr
                        style="margin-top: 40px; margin-bottom: 30px; border: none; height: 2px; background-color: #777777;">
                    <div class="mb-3">
                        <label for="category" class="form-label">Person Handles Incidents</label>
                        <div class="form-group">
                            <select name="category" class="form-control" required>
                                <option value="" disabled selected>Choose Recipient</option>
                                <option value="1" {{ old('category') == '1' ? 'selected' : '' }}>Rudi</option>
                                <option value="2" {{ old('category') == '2' ? 'selected' : '' }}>Edy</option>
                                <option value="3" {{ old('category') == '3' ? 'selected' : '' }}>Alim</option>
                                <option value="4" {{ old('category') == '4' ? 'selected' : '' }}>Lukas</option>
                                <option value="5" {{ old('category') == '5' ? 'selected' : '' }}>Johan</option>
                                <option value="6" {{ old('category') == '6' ? 'selected' : '' }}>Billy</option>
                                <option value="7" {{ old('category') == '7' ? 'selected' : '' }}>Nasya</option>
                                <option value="8" {{ old('category') == '8' ? 'selected' : '' }}>Albert</option>
                                <option value="9" {{ old('category') == '9' ? 'selected' : '' }}>Anto</option>
                                <option value="10" {{ old('category') == '10' ? 'selected' : '' }}>Akbar</option>
                                <option value="11" {{ old('category') == '11' ? 'selected' : '' }}>Fajar</option>
                            </select>
                        </div>
                        @if ($errors->has('category'))
                            <span class="text-danger text-left">{{ $errors->first('category') }}</span>
                        @endif
                    </div>
                    <div class="mb-3">
                        <label for="datehandling" class="form-label">Handling Time</label>
                        <input value="{{ old('datehandling') }}" type="datetime-local" class="form-control"
                            name="datehandling" required>

                        @if ($errors->has('datehandling'))
                            <span class="text-danger text-left">{{ $errors->first('datehandling') }}</span>
                        @endif
                    </div>
                    <div class="mb-3">
                        <label for="Incidentsolve" class="form-label">Incident Resolution</label>
                        <textarea class="form-control" name="Incidentsolve" placeholder="Incident Resolution" required rows="2">{{ old('Incidentsolve') }}</textarea>

                        @if ($errors->has('Incidentsolve'))
                            <span class="text-danger text-left">{{ $errors->first('Incidentsolve') }}</span>
                        @endif
                    </div>

                    <div class="mb-3">
                        <label for="datesolved" class="form-label">Resolution Time</label>
                        <input value="{{ old('datesolved') }}" type="datetime-local" class="form-control"
                            name="datesolved" required>

                        @if ($errors->has('datesolved'))
                            <span class="text-danger text-left">{{ $errors->first('datesolved') }}</span>
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
                        <label for="note" class="form-label">Notes</label>
                        <textarea class="form-control" name="note" placeholder="Note" rows="2">{{ old('Note') }}</textarea>

                        @if ($errors->has('Note'))
                            <span class="text-danger text-left">{{ $errors->first('Note') }}</span>
                        @endif
                    </div>

                    <div class="mb-3">
                        <label for="statusproven" class="form-label">Approval from Head of IT</label>
                        <div class="form-group">
                            <input value="{{ old('statusproven') }}" type="datetime-local" class="form-control"
                                name="statusproven">

                        </div>
                        @if ($errors->has('statusproven'))
                            <span class="text-danger text-left">{{ $errors->first('statusproven') }}</span>
                        @endif
                    </div>
                    <button type="submit" class="btn btn-primary" style="margin-top: 40px">Save Report</button>
                    <a href="{{ route('incident.index') }}" class="btn btn-default" style="margin-top: 40px">Back</a>
                </form>
            </div>

        </div>
    @endsection
