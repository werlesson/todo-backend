<x-layout page="Login">
    <x-slot:btn>
        <x-btn text="Registre-se" href="{{route('register')}}"></x-btn>
    </x-slot:btn>

        <section id="page_task">
        <h2 class="page_task__header">Autenticação</h2>

        @if ($errors->any())
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{$error}}</li>
                @endforeach
            </ul>
        @endif

        <form class="page_task__form" method="POST" action="{{route('user.login_action')}}">

            @csrf

            <x-form.input
                name="email"
                label="E-mail"
                type="email"
                placeholder="Digite seu e-mail..."
                required
            />

            <x-form.input
                name="password"
                label="Senha"
                type="password"
                required
                placeholder="Digite sua senha..."
            />

            <div class="page_task__form__group d-flex flex-row gap-1">
                <x-btn text="Entrar" class="btn btn-primary flex-1" type="submit"/>
            </div>
        </form>

    </section>
</x-layout>
