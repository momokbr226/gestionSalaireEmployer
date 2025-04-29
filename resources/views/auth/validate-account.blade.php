<link href="https://fonts.googleapis.com/css?family=Open+Sans:700,600" rel="stylesheet" type="text/css" />
<link rel="stylesheet" href="{{ asset('css/auth.css') }}" type="text/css" />


<form method="post" action=" {{ route('submitDefineAccess', $email) }}">

    @csrf
    @method('POST')

    <div class="box">
        <h1>Espace de connexion</h1>

        @if (Session::get('success'))
            <b style="font-size: 10px; color: green;">
                {{ session('success') }}</b>
        @endif

        @if (Session::get('error_msg'))
            <b style="font-size: 10px; color: red;">
                {{ session('error_msg') }}</b> 
        @endif

        <div class="form-group">
            <label for="email">Email</label>
            <input type="tex" name="email" class="email" value="{{ $email }}" readonly/>
            
        </div>
         <div class="form-group">
            <label for="code">Code</label>
            <input type="text" name="code" class="email" value="{{old('code')  }}" />
            @error('code')
                <b style="font-size: 10px; color: red;">{{ $message }}</b>
            @enderror
        </div>
        
        <div class="form-group">
            <label for="password">Mot de passe</label>
            <input type="password" name="password" class="email" />
            @error('password')
                <b style="font-size: 10px; color: red;">{{ $message }}</b>
            @enderror
        </div>

        <div class="form-group">
            <label for="password">Mot de passe de confirmation</label>
            <input type="password" name="confirm_password" class="email" />
            @error('confirm_password')
                <b style="font-size: 10px; color: red;">{{ $message }}</b>
            @enderror
        </div>

        <div class="btn-container">
            <button type="submit"> Valider</button>
        </div>

        <!-- End Btn -->
        <!-- End Btn2 -->
    </div>
</form>

<style>
    .form-group
{
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;
    margin-bottom: 10px;
}
</style>