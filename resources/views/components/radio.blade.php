@props(['wiremodel', 'options', 'label'])
<div class="px-1">
    <label for="" class="font-medium text-sm">{{ $label }}</label>
    @foreach ($options as $data)
        <div class="form-control">
            <label class="label cursor-pointer">
                <span class="label-text font-medium">{{ $data['label'] }}</span>
                <input type="radio" name="radio-10" class="radio checked"
                value="{{ $data['value'] }}"
                wire:model='{{ $wiremodel }}' />
            </label>
        </div>
    @endforeach
</div>
