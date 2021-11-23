@extends('backend.layouts.app')

@section('title', __('Add Drug'))

@section('content')
    <div class="col-md-6 offset-md-3">
        <x-backend.card>
            <x-slot name="header">@lang('Add Drug')</x-slot>
                <x-slot name="body">
                    {{ Form::open(['url' => route('drug.store'), 'method' => 'POST']) }}
                    <div class="mb-3 row">
                        {{ Form::label('code', __('Code'), ['class' => 'col-sm-2 col-form-label']) }}
                        <div class="col-sm-4">
                            {{ Form::text('code', null, ['class' => 'form-control']) }}
                            @error('code')<small class="text-danger text-small font-weight-bold">{{ $message }}</small>@enderror
                        </div>
                    </div>
                    <div class="mb-3 row">
                        {{ Form::label('name', __('Name'), ['class' => 'col-sm-2 col-form-label']) }}
                        <div class="col-sm-10">
                            {{ Form::text('name', null, ['class' => 'form-control']) }}
                            @error('name')<small class="text-danger text-small font-weight-bold">{{ $message }}</small>@enderror
                        </div>
                    </div>
                    <div class="mb-3 row">
                        {{ Form::label('price', __('Price'), ['class' => 'col-sm-2 col-form-label']) }}
                        <div class="col-sm-10">
                            {{ Form::number('price', null, ['class' => 'form-control', 'step' => 0.01]) }}
                            @error('price')<small class="text-danger text-small font-weight-bold">{{ $message }}</small>@enderror
                        </div>
                    </div>

                    <button class="btn btn-primary btn-block mt-3" type="submit">{{__('Save')}}</button>
                    {{ Form::close() }}
                </x-slot>
        </x-backend.card>
    </div>
@endsection
@push('after-scripts')
@endpush
