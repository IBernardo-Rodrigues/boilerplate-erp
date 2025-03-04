<x-guest>
  <div class="auth-wrapper rounded">
    <div class="logo-wrapper">
      <img src="{{ asset('assets/img/logo.png') }}" alt="Logo">
    </div>
    <h3 class="text-center fw-bold mb-2">Entrar</h3>

    {{ html()->form('POST', route('login'))->open() }}
    <div class="row">
    <div class="form-group mb-3">
      {{ html()
          ->label('Email', 'email') 
          ->attributes([
            'class' => 'form-label m-0'
          ])
      }}
      {{ html()
          ->email('email')
          ->required()
          ->attributes([
            'class' => 'form-control' . ($errors->has('email') ? ' is-invalid' : '')
          ])
      }}
      <x-input-error field="email"/>
    </div>

    <div class="form-group mb-1">
      {{ html()
          ->label('Senha', 'password') 
          ->attributes([
            'class' => 'form-label m-0'
          ])
      }}
      {{ html()
          ->password('password')
          ->required()
          ->attributes([
            'class' => 'form-control' . ($errors->has('password') ? ' is-invalid' : '')
          ])
      }}
      <x-input-error field="password"/>
    </div>
    </div>
    <div class="options d-flex justify-content-between align-items-center">
      <label for="remember-me" class="check-label">
        <input type="checkbox" name="remember_me"> Lembrar Senha
      </label>

      <a href="{{ route('password.request') }}" class="text-decoration-none">Esqueceu a senha?</a>
    </div>

    {{ html()
        ->submit('Entrar')
        ->attributes([
          'class' => 'btn btn-primary d-block mx-auto mt-4 fw-bold'
        ])
    }}
    <p class="text-center mt-3">
      <a href="{{ route('register') }}" class="text-decoration-none">Criar Uma Conta</a>
    </p>

    {{ html()->form()->close() }}
  </div>
</x-guest>