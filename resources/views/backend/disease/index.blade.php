@extends('backend.layouts.app')

@section('title', __('Diseases Management'))

@section('content')
    <x-backend.card>
        <x-slot name="header">
            @lang('Diseases Management')
        </x-slot>

        @if ($logged_in_user->hasAllAccess())
            <x-slot name="headerActions">
                <a class="card-header-action" href="{{ route('disease.create') }}"><i class="c-icon cil-plus"></i> {{ __('Add Disease') }}</a>
            </x-slot>
        @endif

        <x-slot name="body">
            <table class="table table-striped border" id="dtable">
                <thead>
                <tr>
                    <th>{{ __('Code') }}</th>
                    <th>{{ __('Name') }}</th>
                    <th>{{ __('Remark') }}</th>
                    <th>{{ __('Actions') }}</th>
                </tr>
                </thead>
                <tbody>
                @foreach($diseases as $disease)
                    <tr>
                        <td>{{ $disease->code }}</td>
                        <td>{{ $disease->name }}</td>
                        <td>{{ $disease->remark }}</td>
                        <td>
                            <a class="btn btn-info" href="{{ route('disease.show', encrypt($disease->id)) }}">{{ __('View') }}</a>
                            <a class="btn btn-secondary" href="{{ route('disease.edit', encrypt($disease->id)) }}">{{ __('Edit') }}</a>
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
