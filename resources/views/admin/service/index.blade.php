@extends('layouts.app',['page' => __('Services')])

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <div class="row">
                    <div class="col-8">
                        <h4 class="card-title">Manage Services</h4>
                    </div>
                    <div class="col-4 text-right">
                        <a href="{{ route('service.create') }}" class="btn btn-sm btn-primary">Create Service</a>
                    </div>
                </div>
            </div>

            <div class="card-body">
                <div class="table-responsive">
                    <table class="table tablesorter">
                        <thead class=" text-primary">
                            <tr>
                                <th>Title</th>
                                <th>Description</th>
                                <th>Icon</th>
                                <th>Image</th>
                                <th style="width:12%">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($services as $service)
                            <tr>
                                <td>{{ $service->title }}</td>
                                <td>{{ $service->description }}</td>
                                <td>{{ $service->icon }}</td>
                                <td>
                                    @isset($service->image)
                                    <img src="{{ Storage::url($service->image) }}" alt="Image" width="100" />
                                    @endisset
                                </td>

                                <td>
                                    <a href="{{ route('service.edit', $service) }}" class="btn btn-sm btn-info btn-round btn-icon float-left" title="Edit" data-toggle="tooltip">
                                        <i class="tim-icons icon-pencil"></i>
                                    </a>

                                    <form method="POST" action="{{ route('service.destroy', $service) }}" class="float-left ml-1">
                                        @csrf
                                        @method('delete')
                                        <a href="{{ route('service.destroy', $service) }}" class="btn btn-sm btn-danger btn-round btn-icon dsc-delete-btn" title="Delete" data-toggle="tooltip">
                                            <i class="tim-icons icon-trash-simple"></i>
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