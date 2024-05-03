<x-layout>
    <x-slot:btn>
        <x-btn text="Voltar" href="{{route('home')}}"></x-btn>
    </x-slot:btn>

    <section id="page_task">
        <h2 class="page_task__header">Editar tarefa</h2>
        <form class="page_task__form" method="POST" action="{{route('task.edit_action')}}">

            @csrf

            <input type="hidden" name="id" value="{{$task->id}}" />

            <x-form.input
                name="title"
                label="Título da tarefa"
                placeholder="Digite o título da tarefa..."
                required
                value="{{$task->title ?? ''}}"
            />

            <x-form.input
                name="due_date"
                label="Data de realização"
                type="datetime-local"
                required
                value="{{$task->due_date ?? null}}"
            />

            <x-form.input
                name="category_id"
                label="Categoria"
                type="select"
                :options="$categories"
                optionValue="id"
                optionText="title"
                required
                value="{{$task->category_id ?? null}}"
            />

            <x-form.input
                name="description"
                label="Descrição"
                placeholder="Digite a descrição da tarefa..."
                type="textarea"
                value="{{$task->description ?? ''}}"
            />

            <div class="page_task__form__group d-flex flex-row gap-1">
                <x-btn text="Resetar" class="btn flex-1" type="reset"/>
                <x-btn text="Salvar edição" class="btn btn-primary flex-1" type="submit"/>
            </div>
        </form>

    </section>
</x-layout>
