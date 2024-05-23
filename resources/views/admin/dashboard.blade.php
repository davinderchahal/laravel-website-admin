@extends('layouts.app',['page' => __('Dashboard')])

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card ">
            <div class="card-header">
                <h4 class="card-title">Manage Enquiry</h4>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table tablesorter" id="">
                        <thead class=" text-primary">
                            <tr>
                                <th>
                                    Name
                                </th>
                                <th>
                                    Email
                                </th>
                                <th>
                                    Phone
                                </th>
                                <th>
                                    Subject
                                </th>
                                <th>
                                    Message
                                </th>
                                <th>
                                    Status
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($enquiries as $enquiry)
                            <tr>
                                <td>{{ $enquiry->name }}</td>
                                <td>{{ $enquiry->email }}</td>
                                <td>{{ $enquiry->phone }}</td>
                                <td>{{ $enquiry->subject }}</td>
                                <td>{{ $enquiry->message }}</td>
                                <td>
                                    <form method="POST" action="{{ route('enquiry.status', $enquiry) }}">
                                        @csrf
                                        @method('patch')
                                        <a href="{{ route('enquiry.status', $enquiry) }}" class="btn btn-sm {{ ($enquiry->is_attended == 1) ? 'btn-success': 'btn-warning' }}" onclick="event.preventDefault(); this.closest('form').submit();" title="Change Status" data-toggle="tooltip">
                                            {{ ($enquiry->is_attended) ? 'Attended': 'Unattended' }}
                                        </a>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection