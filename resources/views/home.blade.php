<x-layout>
    <x-slot:btn>
        <x-btn text="Criar tarefa" href="{{route('task.create')}}"></x-btn>
    </x-slot:btn>

    <div class="home__page">
        <section class="graph">
            <div class="graph__header">
                <h2>Progresso do dia</h2>
                <hr />
                <div class="graph__header__date">
                    <img src="/assets/images/icon-prev.png" alt="">
                    <span>25 de Abr</span>
                    <img src="/assets/images/icon-next.png" alt="">
                </div>
            </div>
            <div class="graph__header__subtitle">
                Tarefa <b>3/6</b>
            </div>
            <div class="graph__content">
                <div class="graph-placeholder"></div>
                <div class="d-flex">
                    <div class="mr-1">
                        <img src="/assets/images/icon-info.png" alt="">
                    </div>
                    <span>Restam 3 tarefas para serem realizadas!</span>
                </div>

            </div>
        </section>
        <section class="list">
            <article class="list__header">
                <select name="" class="list__header__select">
                    <option value="">Todas as tarefas</option>
                    <option value="">Pendentes</option>
                    <option value="">Concluídas</option>
                </select>
            </article>
            <article class="list__content">
                @php
                    $tasks = [
                        [
                            'id' => 1,
                            'done' => false,
                            'title' => 'Título da tarefa',
                            'category' => 'Categoria da tarefa',
                        ],
                    ]
                @endphp


                <x-task :data="$tasks[0]"/>
            </article>
        </section>
    </div>
</x-layout>
