<link href="https://fonts.googleapis.com/css?family=Open+Sans:700,600" rel="stylesheet" type="text/css" />
<link rel="stylesheet" href="{{ asset('css/auth.css') }}" type="text/css" />


<form method="post" action=" {{ route('HandleLogin') }}">

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

        <input type="email" name="email" class="email" />

        <input type="password" name="password" class="email" />

        <div class="btn-container">
            <button type="submit"> Connexion</button>
        </div>

        <!-- End Btn -->
        <!-- End Btn2 -->
    </div>
    <!-- End Box -->
</form>
