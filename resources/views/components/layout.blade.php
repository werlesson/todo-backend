<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ $page ?? 'TodoApp' }}</title>
    <link href="https://fonts.googleapis.com/css2?family=Rubik:ital,wght@0,300..900;1,300..900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="/assets/css/style.css" />
    @vite('resources/js/app.js')
</head>
<body>
    <div class="container">
        <aside class="sidebar">
            <div class="sidebar__logo">
                <img src="/assets/images/logo.png" alt="logo do sistema" />
            </div>
        </aside>
        <section class="content">
            <nav>
                {{$btn ?? null}}
            </nav>
            <main>
                {{$slot}}
            </main>
        </section>
    </div>
</body>
</html>
