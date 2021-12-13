{{ Form::open(['url' => route('appointment-disease.store', encrypt($appointment->id)), 'method' => 'POST']) }}
<div class="setting-widget">
    <div class="list no-hairlines-md">
        <div class="widget-title">
            <h5>{{ __('Add Disease') }}</h5>
        </div>

        <div class="row">
            <div class="col-md-12">
                <div class="item-col">
                    <div class="item-title item-label">Disease</div>
                    <div class="item-input-wrap input-dropdown-wrap">
                        <select name="disease_id">
                            @foreach($diseases as $disease)
                                <option value="{{ $disease->id }}">{{ $disease->code." ".$disease->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <div class="item-col">
                    <div class="item-title item-label">Remark</div>
                    <textarea name="remark"></textarea>
                </div>
            </div>
        </div>

        <button type="submit" class="mt-3">{{ __('Submit') }}</button>

    </div>
</div>
{{ Form::close() }}
