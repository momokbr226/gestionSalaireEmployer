<link href="https://fonts.googleapis.com/css?family=Open+Sans:700,600" rel="stylesheet" type="text/css" />
<link rel="stylesheet" href="{{ asset('css/auth.css') }}" type="text/css" />


<form method="post" action="{{ route('submitDefineAccess', $email) }}" class="auth-form">
    @csrf
    @method('POST')

    <div class="form-container">
        <h1 class="form-title">Espace de connexion</h1>

        <!-- Messages de statut -->
        <div class="form-messages">
            @if (Session::get('success'))
                <div class="alert success">
                    {{ session('success') }}
                </div>
            @endif

            @if (Session::get('error_msg'))
                <div class="alert error">
                    {{ session('error_msg') }}
                </div>
            @endif
        </div>

        <!-- Champ Email -->
        <div class="form-group">
            <label for="email" class="form-label">Email</label>
            <input type="text" 
                   name="email" 
                   class="form-input"
                   value="{{ $email }}" 
                   readonly/>
        </div>
        <div class="form-group">
            <label for="text" class="form-label">Code</label>
            <input type="text" 
                   name="code" 
                   class="form-input"
                  />
        </div>

        <!-- Champ Mot de passe -->
        <div class="form-group">
            <label for="password" class="form-label">Mot de passe</label>
            <input type="password" 
                   name="password" 
                   class="form-input" />
            @error('password')
                <span class="error-message">{{ $message }}</span>
            @enderror
        </div>

        <!-- Confirmation Mot de passe -->
        <div class="form-group">
            <label for="password" class="form-label">Confirmation mot de passe</label>
            <input type="password" 
                   name="confirm_password" 
                   class="form-input" />
            @error('confirm_password')
                <span class="error-message">{{ $message }}</span>
            @enderror
        </div>

        <!-- Bouton de soumission -->
        <div class="form-group">
            <button type="submit" class="submit-btn">Valider</button>
        </div>
    </div>
</form>

<style>
    .auth-form {
        max-width: 500px;
        margin: 2rem auto;
        padding: 2rem;
        background: #f8f9fa;
        border-radius: 8px;
        box-shadow: 0 2px 4px rgba(0,0,0,0.1);
    }

    .form-title {
        text-align: center;
        color: #2c3e50;
        margin-bottom: 1.5rem;
    }

    .form-group {
        margin-bottom: 1.5rem;
    }

    .form-label {
        display: block;
        margin-bottom: 0.5rem;
        color: #4a5568;
        font-weight: 600;
    }

    .form-input {
        width: 100%;
        padding: 0.75rem;
        border: 1px solid #e2e8f0;
        border-radius: 4px;
        font-size: 1rem;
    }

    .form-input:read-only {
        background-color: #f0f4f8;
        cursor: not-allowed;
    }

    .submit-btn {
        width: 100%;
        padding: 1rem;
        background-color: #4299e1;
        color: white;
        border: none;
        border-radius: 4px;
        font-size: 1rem;
        cursor: pointer;
        transition: background-color 0.3s;
    }

    .submit-btn:hover {
        background-color: #3182ce;
    }

    .alert {
        padding: 0.75rem;
        margin-bottom: 1rem;
        border-radius: 4px;
        font-size: 0.9rem;
    }

    .success {
        background-color: #c6f6d5;
        color: #22543d;
    }

    .error {
        background-color: #fed7d7;
        color: #742a2a;
    }

    .error-message {
        display: block;
        margin-top: 0.5rem;
        color: #e53e3e;
        font-size: 0.875rem;
    }
</style>