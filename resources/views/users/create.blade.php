<x-layout title="Registro">

    <form method="post">
        @csrf
        <div class="form-group text-light">
            <label for="name" class="form-label">Nome</label>
            <input type= "name" name="name" id="name" class="form-control">        
        </div> 

        <div class="form-group text-light">
            <label for="email" class="form-label">E-mail</label>
            <input type= "email" name="email" id="email" class="form-control">        
        </div>

        <div class="form-group text-light">
            <label for="password" class="form-label">Senha</label>
            <input type= "password" name="password" id="password" class="form-control">        
        </div> 

        <button class="btn btn-primary mt-3">
            Registrar
        </button>

    </form>

</x-layout>