<div class="card pb-2.5">
    <div class="card-header" id="auth_email">
        <h3 class="card-title">
            Email
        </h3>
    </div>
    <form method="POST" action="{{ route('profile.update') }}">
        @csrf
        @method('PATCH')
        <div class="card-body grid gap-5 pt-7.5">
            <div class="w-full">
                <div class="flex items-baseline flex-wrap lg:flex-nowrap gap-2.5">
                    <label class="form-label max-w-56">
                        Email
                    </label>
                    <div class="flex flex-col items-start grow gap-7.5 w-full">
                        <x-forms.input
                            name="email"
                            type="text"
                            :value="old('email', auth()->user()->email)"
                            required
                            autofocus
                            class="w-full"
                            :messages="$errors->get('email')"
                        />
                    </div>
                </div>
            </div>
            <div class="flex justify-end pt-2.5">
                <button type="submit" class="btn btn-primary">Valider</button>
            </div>
            @if (session('status') === 'profile-updated')
                <div class="alert alert-success">
                    Profil mis à jour avec succès !
                </div>
            @endif
        </div>
    </form>
</div>
