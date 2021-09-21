<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ingreso de Productos</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
</head>
<body>
        <div class="container">
            <h4>Ingreso de Productos</h4>
            <div class="row">
                <div class="col-xl-12">
                    <form action="{{route('producto.store')}}" method="post">
                        @csrf
                        <div class="form-group">
                            <label for="Nombre">Nombre</label>
                            <input type="text" class="form-control" name="Nombre" required maxlength ="50">
                        </div>
                        <div class="form-group">
                            <label for="Precio_Unitario">Precio Unitario</label>
                            <input type="text" class="form-control" name="Precio_Unitario" required maxlength ="50">
                        </div>
                        <div class="form-group">
                            <label for="Existencia">Existencia</label>
                            <input type="text" class="form-control" name="Existencia" required maxlength ="50">
                        </div>
                        <div class="form-group">
                            <label for="Categoria">Categoria</label>
                            <input type="text" class="form-control" name="Categoria" required maxlength ="50">
                        </div>
                        <div class="form-gruop">
                            <input type="submit" class="btn btn-primary my-1" value="Guardar">
                            <input type="reset" class="btn btn-danger my-1" value="Cancelar">
                            <a href="javascript:history.back()">Ir a la Lista de Productos</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
</body>
</html>