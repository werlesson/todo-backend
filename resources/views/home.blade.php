<x-layout>
    <x-slot:btn>
        <x-btn text="Criar tarefa" href="{{route('task.create')}}"></x-btn>
        <x-btn text="Sair" href="{{route('logout')}}" class="btn btn-primary ml-1"></x-btn>
    </x-slot:btn>

    <div class="home__page">
        <section class="graph">
            <div class="graph__header">
                <h2>Progresso do dia</h2>
                <hr />
                <div class="graph__header__date">
                    <a href="{{route('home', ['date' => $date_prev_button])}}">
                        <img src="/assets/images/icon-prev.png" alt="">
                    </a>
                    <span>{{$date_as_string}}</span>
                    <a href="{{route('home', ['date' => $date_next_button])}}">
                        <img src="/assets/images/icon-next.png" alt="">
                    </a>
                </div>
            </div>
            <div class="graph__header__subtitle">
                Tarefa <b>{{$done_tasks_count}}/{{$tasks_count}}</b>
            </div>
            <div class="graph__content">
                <div class="graph-placeholder"></div>
                <div class="d-flex">
                    <div class="mr-1">
                        <img src="/assets/images/icon-info.png" alt="">
                    </div>
                    <span>Restam {{$undone_tasks_count}} tarefas para serem realizadas!</span>
                </div>

            </div>
        </section>
        <section class="list">
            <article class="list__header">
                <select name="" class="list__header__select" onchange="changeTaksStatusFilter(this)">
                    <option value="all_task">Todas as tarefas</option>
                    <option value="task_pending">Pendentes</option>
                    <option value="task_done">Concluídas</option>
                </select>
            </article>
            <article class="list__content">
                @foreach ($tasks as $task)
                    <x-task :data="$task"/>
                @endforeach
            </article>
        </section>
    </div>

    <script>
        async function taskUpdate(element) {
            const status = element.checked;
            const taskId = element.getAttribute('data-id');
            const url = '{{route('task.update')}}';
            // alert(url)
            const rawResult = await fetch(url, {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'Accept': 'application/json'
                },
                body: JSON.stringify({
                   status, taskId, _token: '{{csrf_token()}}'
                })
            });
            const result = await rawResult.json();

            if (result.success) {
                alert("Tarefa atualizada com sucesso!");
            } else {
                element.checked = !status;
            }
        }

        function changeTaksStatusFilter(e){
            const value = e.value;

            showAllTasks();

            if (value === 'task_pending') {
                document.querySelectorAll('.task_done').forEach((el) => {
                    el.style.display = 'none';
                });
            } else if (value === 'task_done') {
                document.querySelectorAll('.task_pending').forEach((el) => {
                    el.style.display = 'none';
                });
            }
        }

        function showAllTasks() {
            document.querySelectorAll('.list__item').forEach((el) => {
                el.style.display = 'grid';
            });
        }
    </script>
</x-layout>
