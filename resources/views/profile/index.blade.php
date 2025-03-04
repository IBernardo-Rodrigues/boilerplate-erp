<x-app>
    <div class="card p-3">
        <h3>Minha Conta</h3>

        <x-alerts/>

        {{ html()->modelForm($user, 'PUT', route('profile.update'))->acceptsFiles()->open() }}
        <div class="my-3">
            <div class="profile-image rounded-circle position-relative" style="width: 60px; height: 60px;">
                <img src="{{ $user->profile_img ? asset('storage/' . $user->profile_img) : asset('assets/img/no-profile.jpg') }}" alt="" width="70" height="70" class="profile position-absolute top-0 rounded-circle">
                <label for="profile_image" class="material-icons position-absolute start-100 top-0 translate-middle bg-warning rounded-circle p-2">edit</label>
                {{ html()
                    ->input('file', 'profile_image')
                    ->attributes([
                    'class' => 'invisible' . ($errors->has('name') ? ' is-invalid' : '')
                    ])
                }}
            </div>
        </div>

        <div>
            <div class="row">
                <div class="form-group col-md-5 mb-3">
                    {{ html()
                        ->label('Nome', 'name') 
                        ->attributes([
                        'class' => 'form-label'
                        ])
                    }}
                    {{ html()
                        ->text('name')
                        ->required()
                        ->attributes([
                        'class' => 'form-control' . ($errors->has('name') ? ' is-invalid' : '')
                        ])
                    }}
                    <x-input-error field="name"/>
                </div>
                <div class="form-group col-md-5 mb-3">
                    {{ html()
                        ->label('Email', 'email') 
                        ->attributes([
                        'class' => 'form-label'
                        ])
                    }}
                    {{ html()
                        ->text('email')
                        ->required()
                        ->attributes([
                        'class' => 'form-control' . ($errors->has('email') ? ' is-invalid' : '')
                        ])
                    }}
                    <x-input-error field="email"/>
                </div>
            </div>

            <button type="submit" class="btn btn-primary me-2">Salvar</button>
            <a href="{{ url()->current() == url()->previous() ? route('dashboard') : url()->previous() }}" class="btn btn-secondary">Voltar</a>
        </div>
        {{ html()->closeModelForm() }}
    </div>

    @push('js')
    <script>
        const profile = document.querySelector('.profile');
        const $inputProfileImage = document.querySelector('input[type=file]');

        $inputProfileImage.addEventListener('change', () => {
            const file = $inputProfileImage.files[0];
            const reader = new FileReader();

            reader.addEventListener('load', () => {
                profile.src = reader.result;
            });

            if (file) {
                reader.readAsDataURL(file);
            }

        });

    </script>
    @endpush
</x-app>