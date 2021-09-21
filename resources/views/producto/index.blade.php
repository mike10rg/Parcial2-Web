<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Productos Ferreteria</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
</head>
<body>
    <div class="container">
        <h4>Gestion de Productos Ferreteros</h4>
        <div class="row">
            <div class="col-xl-12">
                <form action="{{route('producto.index')}}" method="get">
                    <div class= "form-row">
                        <div class="col-sm-4 my-1">
                           <input type="text" class="form-control" name="texto" value="{{$texto}}"> 
                        </div>
                        <div class="col-auto my-1">
                            <input type="submit" class="btn btn-primary" value="Buscar">
                            <a href="{{route('producto.create')}}" class="btn btn-success">Nuevo Producto</a>
                        </div>
                        <div class="col-auto my-1">
                        </div>
                    </div>
                </form>
            </div>
            <div class="col-xl-12">
                <div class="table-responsive">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>Opciones</th>
                                <th>ID</th>
                                <th>Nombre</th>
                                <th>Precio_Unitario</th>
                                <th>Existencia</th>
                                <th>Categoria</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if(count($productos)<=0)
                                <tr>
                                    <td colspan="8">No se encontraron resultados</td>
                                </tr>
                            @else
                            @foreach ($productos as $producto)
                            <tr>
                                <td>
                                <a href="{{route('producto.edit',$producto->Id)}}" class="btn btn-warning btn-sm">Editar</a>
                                <form action="{{route('producto.destroy',$producto->Id)}}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <input type="submit" class="btn btn-danger btn-sm" value="Eliminar">
                                </form>
                                </td>
                                <td>{{$producto->Id}}</td>
                                <td>{{$producto->Nombre}}</td>
                                <td>{{$producto->Precio_Unitario}}</td>
                                <td>{{$producto->Existencia}}</td>
                                <td>{{$producto->Categoria}}</td>
                            </tr>
                            @endforeach
                            @endif
                        </tbody>
                    </table>
                    {{$productos->links()}}
                </div>
            </div>
        </div>
    </div>
</body>
</html>