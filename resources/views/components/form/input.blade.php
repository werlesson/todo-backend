<div class="page_task__form__group">
    <label class="page_task__form__label" for="{{$name}}">
        {{empty($label) ? '' : $label}}
    </label>
    @if (!empty($type) && $type == 'select')
        <select
            id="category"
            class="page_task__form__input"
            name="{{$name}}"
            {{ empty($required) ? '' : 'required' }}
        >
            <option selected disabled value="">
                Selecione a categoria
            </option>
            @foreach ($options as $option)
                <option
                    value="{{$option[$optionValue]}}"
                    {{!empty($value) && $value == $option->id ? 'selected' : null}}
                >
                    {{ $option[$optionText] }}
                </option>
            @endforeach
        </select>
    @elseif (!empty($type) && $type == 'textarea')
        <textarea
            class="page_task__form__input"
            placeholder="{{empty($placeholder) ? 'Digite aqui...' : $placeholder}}"
            rows="{{empty($rows) ? '5' : $rows}}"
            name="{{$name}}"
            id="{{$name}}"
            {{ empty($required) ? '' : 'required' }}
        >{{$value ?? ''}}"</textarea>
    @else
        <input
            type="{{empty($type) ? 'text' : $type}}"
            class="page_task__form__input"
            name="{{$name}}"
            id="{{$name}}"
            placeholder="{{empty($placeholder) ? 'Digite aqui...' : $placeholder}}"
            {{ empty($required) ? '' : 'required' }}
            value="{{$value ?? ''}}"
        />
    @endif
</div>
