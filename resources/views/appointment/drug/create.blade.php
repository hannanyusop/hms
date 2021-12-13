{{ Form::open(['url' => route('appointment-drug.store', encrypt($appointment->id)), 'method' => 'POST']) }}
<div class="setting-widget">
    <div class="list no-hairlines-md">
        <div class="widget-title">
            <h5>{{ __('Add Drug') }}</h5>
        </div>

        <div class="row">
            <div class="col-md-12">
                <div class="item-col">
                    <div class="item-title item-label">Drug</div>
                    <div class="item-input-wrap input-dropdown-wrap">
                        <select name="drug_id">
                            @foreach($drugs as $drug)
                                <option value="{{ $drug->id }}">{{ $drug->code."-".$drug->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <div class="item-col">
                    <div class="item-title item-label">Quantity</div>
                    <input name="qty" value="1">
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
