@extends('backend.layouts.app')

@section('title', __('Diseases Management'))

@section('content')
    <x-backend.card>
        <x-slot name="header">
            @lang('Diseases Management')
        </x-slot>

        @if ($logged_in_user->hasAllAccess())
            <x-slot name="headerActions">
                <a class="card-header-action" href="{{ route('drug.create') }}"><i class="c-icon cil-plus"></i> {{ __('Add') }}</a>
            </x-slot>
        @endif

        <x-slot name="body">
            <table class="table table-striped border" id="dtable">
                <thead>
                <tr>
                    <th>{{ __('Code') }}</th>
                    <th>{{ __('Name') }}</th>
                    <th>{{ __('Price') }}</th>
                    <th>{{ __('Actions') }}</th>
                </tr>
                </thead>
                <tbody>
                @foreach($drugs as $drug)
                    <tr>
                        <td>{{ $drug->code }}</td>
                        <td>{{ $drug->name }}</td>
                        <td>{{ $drug->price }}</td>
                        <td>
                            <a class="btn btn-info" href="{{ route('drug.show', encrypt($drug->id)) }}">{{ __('View') }}</a>
                            <a class="btn btn-secondary" href="{{ route('drug.edit', encrypt($drug->id)) }}">{{ __('Edit') }}</a>
                        </td>
                    </tr
                @endforeach
                </tbody>
            </table>
        </x-slot>
    </x-backend.card>
@endsection
@push('after-scripts')
    <script type="text/javascript">
        $(function () {
            "use strict";
            $('#dtable').DataTable({
                'paging': true,
                'lengthChange': false,
                'searching': true,
                'ordering': true,
                'info': true,
                'autoWidth': false
            });
        });
    </script>
@endpush
