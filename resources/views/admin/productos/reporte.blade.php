<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reportes</title>
    <style> 
        body {
            font-family: Arial, sans-serif;
            margin: 0;
        }

        .header{
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            height: 50px;
            background:  #f0f0f0;
            text-align: center;
            line-height: 50px;
            font-size: 14px;
            border-bottom: 1px solid #ddd;

        }

        .footer{

            position: fixed;
            bottom: 0;
            left: 0;
            right: 0;
            height: 30px;
            background: #f0f0f0;
            text-align: center;
            line-height: 30px;
            font-size: 12px;
            border-top: 1px solid #ddd;

        }

        .content{
            margin: 60px 20px 50px 20px;
        }

        .page-number::before{
            content: "Pagina" counter(page);
        }


        .table{
            width:100%;
            margin-bottom: 1rem;
            color: #212529;
            border-collapse: collapse;
        }

        .table-bordered{
            border: 1px solid #000000;
        }

        .table-bordered th,
        .table-bordered td {
            border:1px solid #000000;
        }

        .table-bordered thead th {
            border-bottom-width: 2px;
        }


    </style>
</head>
<body>
    <div class="header">
        <b>LUPITA ALMACEN DE MUJERES</b>
    </div>

    <div class="content">
        <hr>
        <h2>Reporte de Clientes</h2>
        <hr>
        <table border="0" class="table table-bordered">
            <tr>
                <td width="25px" style="background-color: #cccccc; text-align:center"><b>Nro</b></td>
                <td width="275px" style="background-color: #cccccc; text-align:center"><b>Nombre</b></td>
                <td width="125px" style="background-color: #cccccc; text-align:center"><b>Codigo Producto</b></td>
                <td width="50px" style="background-color: #cccccc; text-align:center"><b>stock</b></td>
                <td width="75px" style="background-color: #cccccc; text-align:center"><b>precio Producto</b></td>
                <td width="100px" style="background-color: #cccccc; text-align:center"><b>F.Vencimiento</b></td>


               
            </tr>


            <tbody>
                @php

                $contador= 1;
                

                @endphp

                @foreach ($productos as $producto)

               

                    
                    <tr>
                        <td style="text-align:center">{{$contador++}}</td>
                        <td>{{ $producto->nombre_producto }}</td>
                        <td style="text-align:center">{{ $producto->codigo_producto }}</td>
                        <td style="text-align:center">{{ $producto->stock_producto }}</td>
                        <td style="text-align:center">{{ $producto->precio_venta_producto }}</td>
                        <td style="text-align:center">{{ $producto->fecha_vencimiento_producto }}</td>
                        

                    </tr>
                @endforeach

              

            </tbody>

        </table>
    </div>

    <div class="footer">
        <small class="page-number"></small>
    </div>
</body>
</html>