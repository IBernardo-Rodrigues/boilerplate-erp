<x-guest>
  <div class="auth-wrapper position-absolute top-50 start-50 translate-middle rounded">
    <div class="logo-wrapper">
      <img src="{{ asset('assets/img/logo.png') }}" alt="Logo">
    </div>
    <h3 class="text-center">Criar Conta</h3>

    {{ html()->form('POST', route('register'))->open() }}

    <div class="form-group mb-3">
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
            'class' => 'form-control' . ($errors->has('name') ? ' is-invalid' : '' )
          ])
      }}
      <x-input-error field="name"/>
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
          'class' => 'btn btn-primary d-block mx-auto mt-5'
        ])
    }}
    <p class="text-center mt-3">
      <a href="{{ route('login') }}" class="text-decoration-none">Já tem uma conta? Clique Aqui!</a>
    </p>

    {{ html()->form()->close() }}
  </div>
</x-guest>