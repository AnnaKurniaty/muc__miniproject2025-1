@extends('timesheet::layouts.master')

@section('content')
    <h1>Timesheet</h1>

    <table class="table table-striped">
        <thead>
            <tr>
                <th>Tanggal</th>
                <th>Karyawan</th>
                <th>Proposal Number</th>
                <th>Service Name</th>
                <th>Waktu Mulai</th>
                <th>Waktu Selesai</th>
                <th>Total Jam</th>
            </tr>
        </thead>
        <tbody>
            @foreach($timesheets as $timesheet)
                <tr>
                    <td>{{ $timesheet->date }}</td>
                    <td>{{ $timesheet->employee ? $timesheet->employee->fullname : 'N/A' }}</td>
                    <td>{{ $timesheet->serviceused && $timesheet->serviceused->proposal ? $timesheet->serviceused->proposal->number : 'N/A' }}</td>
                    <td>{{ $timesheet->serviceused ? $timesheet->serviceused->service_name : 'N/A' }}</td>
                    <td>{{ $timesheet->timestart }}</td>
                    <td>{{ $timesheet->timefinish }}</td>
                    <td>
                        @php
                            $start = strtotime($timesheet->timestart);
                            $end = strtotime($timesheet->timefinish);
                            $diff = $end - $start;
                            $hours = floor($diff / 3600);
                            $minutes = floor(($diff % 3600) / 60);
                            echo sprintf('%02d:%02d', $hours, $minutes);
                        @endphp
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
