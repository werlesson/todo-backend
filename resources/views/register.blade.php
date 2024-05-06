<x-layout page="Registro">
    <x-slot:btn>
        <x-btn text="Login" href="{{route('login')}}"></x-btn>
    </x-slot:btn>

    <section id="page_task">
        <h2 class="page_task__header">Registrar-se</h2>

        @if ($errors->any())
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{$error}}</li>
                @endforeach
            </ul>
        @endif

        <form class="page_task__form" method="POST" action="{{route('user.register_action')}}">

            @csrf

            <x-form.input
                name="name"
                label="Nome"
                placeholder="Digite seu nome aqui..."
                required
            />

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

            <x-form.input
                name="password_confirmation"
                label="Confirmação de senha"
                type="password"
                required
                placeholder="Digite sua confirmação de senha..."
            />

            <div class="page_task__form__group d-flex flex-row gap-1">
                <x-btn text="Limpar" class="btn flex-1" type="reset"/>
                <x-btn text="Registrar" class="btn btn-primary flex-1" type="submit"/>
            </div>
        </form>

    </section>
</x-layout>
