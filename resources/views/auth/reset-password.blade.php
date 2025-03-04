  <x-guest>
    <div class="auth-wrapper position-absolute top-50 start-50 translate-middle rounded">
      <div class="logo-wrapper">
        <img src="{{ asset('assets/img/logo.png') }}" alt="Logo">
      </div>
      <h3 class="text-center">Redefinir Senha</h3>
      <p class="text-muted text-center">Preencha os campos!</p>
  
      {{ html()->form('POST', route('password.reset', $token))->open() }}
  
      <div class="form-group mb-3">
        {{ html()
            ->hidden('token', $token)
            ->required()
            ->attributes([
              'class' => 'form-control' . ($errors->has('token') ? ' is-invalid' : '' )
            ])
        }}
        <x-input-error field="token"/>
      </div>
      
      <div class="form-group mb-3">
        {{ html()
            ->label('Email', 'email') 
            ->attributes([
              'class' => 'form-label'
            ])
        }}
        {{ html()
            ->email('email')
            ->required()
            ->attributes([
              'class' => 'form-control' . ($errors->has('email') ? ' is-invalid' : '' )
            ])
        }}
        <x-input-error field="email"/>
      </div>
      
      <div class="form-group mb-3">
        {{ html()
            ->label('Senha', 'password') 
            ->attributes([
              'class' => 'form-label'
            ])
        }}
        {{ html()
            ->password('password')
            ->required()
            ->attributes([
              'class' => 'form-control' . ($errors->has('password') ? ' is-invalid' : '' )
            ])
        }}
        <x-input-error field="password"/>
      </div>
      
      <div class="form-group mb-3">
        {{ html()
            ->label('Confirmar Senha', 'password_confirmation') 
            ->attributes([
              'class' => 'form-label'
            ])
        }}
        {{ html()
            ->password('password_confirmation')
            ->required()
            ->attributes([
              'class' => 'form-control' . ($errors->has('password_confirmation') ? ' is-invalid' : '' )
            ])
        }}
        <x-input-error field="password_confirmation"/>
      </div>
  
      {{ html()
          ->submit('Enviar')
          ->attributes([
            'class' => 'btn btn-primary d-block mx-auto mt-3'
          ])
      }}
  
      {{ html()->form()->close() }}
    </div>
  </x-guest>