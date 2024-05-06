<x-layout>
    <x-slot:btn>
        <x-btn text="Voltar" href="{{route('home')}}"></x-btn>
    </x-slot:btn>

    <section id="page_task">
        <h2 class="page_task__header">Criar tarefa</h2>
        <form class="page_task__form" method="POST" action="{{route('task.create_action')}}">

            @csrf

            <x-form.input
                name="title"
                label="Título da tarefa"
                placeholder="Digite o título da tarefa..."
                required
            />

            <x-form.input
                name="due_date"
                label="Data de realização"
                type="datetime-local"
                required
            />

            <x-form.input
                name="category_id"
                label="Categoria"
                type="select"
                :options="$categories"
                optionValue="id"
                optionText="title"
                required
            />

            <x-form.input
                name="description"
                label="Descrição"
                placeholder="Digite a descrição da tarefa..."
                type="textarea"
            />

            <div class="page_task__form__group d-flex flex-row gap-1">
                <x-btn text="Limpar" class="btn flex-1" type="reset"/>
                <x-btn text="Criar tarefa" class="btn btn-primary flex-1" type="submit"/>
            </div>
        </form>

    </section>
</x-layout>
