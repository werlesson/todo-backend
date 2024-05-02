<div class="list__item">
    <div class="list__item__title">
        <input type="checkbox" name="" id=""
            @if ($data['done'])
                checked
            @endif
        />
        {{$data['title'] ?? ''}}
    </div>
    <div class="list__item__priority">
        <div class="sphere"></div>
        {{$data['category'] ?? '' }}
    </div>
    <div class="list__item__actions">
        <a href="">
            <img src="/assets/images/icon-edit.png" alt="editar tarefa" />
        </a>
        <a href="">
            <img src="/assets/images/icon-delete.png" alt="remover tarefa" />
        </a>
    </div>
</div>
