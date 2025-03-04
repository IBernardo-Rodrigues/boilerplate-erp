  <x-guest>
    <div class="auth-wrapper position-absolute top-50 start-50 translate-middle rounded">
      <div class="logo-wrapper">
        <img src="{{ asset('assets/img/logo.png') }}" alt="Logo">
      </div>
      <h3 class="text-center">Redefinir Senha</h3>
      <p class="text-muted text-center">Verifique sua caixa de entrada!</p>
  
      {{ html()->form('POST', route('password.email'))->open() }}
  
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
  
      {{ html()
          ->submit('Enviar')
          ->attributes([
            'class' => 'btn btn-primary d-block mx-auto mt-3'
          ])
      }}
  
      {{ html()->form()->close() }}
    </div>
  </x-guest>