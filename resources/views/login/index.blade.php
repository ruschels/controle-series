<x-layout title="login">
	<form method="post">
        @csrf
        <div class="form-group text-light">
            <label for="email" class="form-label">E-mail</label>
            <input type= "email" name="email" id="email" class="form-control">        
        </div> 

        <div class="form-group text-light">
            <label for="password" class="form-label">Password</label>
            <input type= "password" name="password" id="password" class="form-control">        
        </div> 

        <button class="btn btn-primary mt-3">
            Entrar
        </button>

        <a href=" {{ route('users.create') }} " class="btn btn-secondary mt-3">
            Registrar
        </a>

    </form>
</x-layout>