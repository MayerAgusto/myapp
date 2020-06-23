Loging
<form action="{{url('/users')}}" method="post" enctype="multipart/form-data"> 
{{csrf_field()}}

<label for="Correo Electronico">{{'Correo Electronico'}}</label>
<input type="email" name="email" id="email" value="">
<br>

<label for=" Contraseña">{{' Contraseña'}}</label>
<input type="password" name="password" id="password" value="">
<br>

<input type="submit" name="Agregar">
</form>