<x-layouts.auth>
    <x-slot name="title">
        Créer un compte
    </x-slot>

    <x-slot name="content">
        <h1>Créer un compte</h1>

        <!-- Affichage des erreurs de validation -->
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('auth.custom.register.submit') }}" method="POST">
            @csrf
            <div>
                <!-- Champs du formulaire -->
                <x-form.group.text name="name" label="Nom" />
                <x-form.group.email name="email" label="Email" />
                <x-form.group.password name="password" label="Mot de passe" />
                <x-form.group.password name="password_confirmation" label="Confirmer le mot de passe" />
            </div>

            <x-button type="submit">
                Créer le compte
            </x-button>
        </form>
    </x-slot>
</x-layouts.auth>
