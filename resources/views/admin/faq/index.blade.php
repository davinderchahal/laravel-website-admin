@extends('layouts.app',['page' => __('FAQs')])

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <div class="row">
                    <div class="col-8">
                        <h4 class="card-title">Manage FAQs</h4>
                    </div>
                    <div class="col-4 text-right">
                        <a href="{{ route('faq.create') }}" class="btn btn-sm btn-primary">Create FAQ</a>
                    </div>
                </div>
            </div>

            <div class="card-body">
                <div class="table-responsive">
                    <table class="table tablesorter" id="">
                        <thead class=" text-primary">
                            <tr>
                                <th>Question</th>
                                <th>Answer</th>
                                <th>Status</th>
                                <th style="width: 12%;">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($faqs as $faq)
                            <tr>
                                <td>{{ $faq->question }}</td>
                                <td>{{ $faq->answer }}</td>
                                <td>{{ ($faq->is_show == 1) ? 'Show': 'Not Show' }}</td>
                                <td>
                                    <a href="{{ route('faq.edit', $faq) }}" class="btn btn-sm btn-info btn-round btn-icon float-left" title="Edit" data-toggle="tooltip">
                                        <i class="tim-icons icon-pencil"></i>
                                    </a>

                                    <form method="POST" action="{{ route('faq.destroy', $faq) }}" class="float-left ml-1">
                                        @csrf
                                        @method('delete')
                                        <a href="{{ route('faq.destroy', $faq) }}" class="btn btn-sm btn-danger btn-round btn-icon dsc-delete-btn" title="Delete" data-toggle="tooltip">
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