<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reporte</title>
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
                <td width="50px" style="background-color: #cccccc; text-align:center"><b>Nro</b></td>
                <td width="150px" style="background-color: #cccccc; text-align:center"><b>Fecha Venta</b></td>
                <td width="150px" style="background-color: #cccccc; text-align:center"><b>tipo Pago</b></td>
                <td width="50px" style="background-color: #cccccc; text-align:center"><b>Porcentaje Agregado</b></td>
                <td width="150px" style="background-color: #cccccc; text-align:center"><b>Precio Total</b></td>
               
            </tr>


            <tbody>
                @php

                $contador= 1;
                $suma_total_ventas=0;
                

                @endphp

                @foreach ($ventas as $venta)

                    @php
                    $suma_total_ventas += $venta->precio_total_venta
                    @endphp

                    
                    <tr>
                        <td style="text-align:center">{{$contador++}}</td>
                        <td>{{ $venta->fecha_venta}}</td>
                        <td style="text-align:center">{{ $venta->tipopago->nombre }}</td>
                        <td style="text-align:center">{{ $venta->porcentaje_impuesto }}</td>
                        <td style="text-align:center">{{$venta->precio_total_venta}}</td>
                        
                        

                    </tr>
                @endforeach

              

            </tbody>

        </table>

        <p><b>Total En ventas:</b>{{ $suma_total_ventas }}</p>
    </div>

    <div class="footer">
        <small class="page-number"></small>
    </div>
</body>
</html>