<x-app>
    <div class="card bg-light p-3">
        <h3>Redefinir senha</h3>

        <x-alerts/>
        <div>
            <div class="row">
                {{ html()->form('POST', route('change-password.update'))->open() }}
                <div class="form-group mb-3">
                    {{ html()
                        ->label('Senha Atual', 'current_password') 
                        ->attributes([
                        'class' => 'form-label'
                        ])
                    }}
                    {{ html()
                        ->password('current_password')
                        ->attributes([
                        'class' => 'form-control' . ($errors->has('current_password') ? ' is-invalid' : '')
                        ])
                        ->value(request()->current_password)
                    }}
                    <x-input-error field="current_password"/>
                </div>
                <div class="form-group mb-3">
                    {{ html()
                        ->label('Nova Senha', 'new_password') 
                        ->attributes([
                        'class' => 'form-label'
                        ])
                    }}
                    {{ html()
                        ->password('new_password')
                        ->attributes([
                        'class' => 'form-control' . ($errors->has('new_password') ? ' is-invalid' : '')
                        ])
                        ->value(request()->new_password)
                    }}
                    <x-input-error field="new_password"/>
                </div>
                <div class="form-group mb-3">
                    {{ html()
                        ->label('Confirme a Nova Senha', 'new_password_confirmation') 
                        ->attributes([
                        'class' => 'form-label'
                        ])
                    }}
                    {{ html()
                        ->password('new_password_confirmation')
                        ->attributes([
                        'class' => 'form-control' . ($errors->has('new_password_confirmation') ? ' is-invalid' : '')
                        ])
                        ->value(request()->new_password_confirmation)
                    }}
                    <x-input-error field="new_password_confirmation"/>
                </div>

                <button type="submit" class="btn btn-primary">
                    Redefinir
                </button>
                {{ html()->form()->close() }}
        </div>
    </div>
</x-app>