<!doctype html>
<html lang="es">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <style>
        body{
            font-family: Arial, Helvetica, sans-serif;
            font-size:10pt;
            color:#333;
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

    <title>Comprobante</title>
    
  </head>

  <body>

   <table border="0" style="font-size: 8pt;font-family: Arial, sans-serif">

   <tr>
        <td width="115px"></td>
        <td width="500px"></td>
        <td style="text-align: center">
            <b>Nro Factura:{{ $venta->id }}</b>
        </td>
   </tr>
        <td>
            <b>LUPITA</b><br>
            <b>Direccion: Parana 123</b><br>
            <b>Cel:3458- 454545</b><br>
        </td>
        <td width="500px" style="text-align: center"><h1>FACTURA</h1></td>
        <td style="text-align: center"><h4>ORIGINAL</h4></td>


   <tr>


   </tr>
   
   </table>

   <br>

   <?php
   $fecha_db = $venta->fecha_venta;

   //convierte la fecha al formato que quieras

   $fecha_formateada=date("d", strtotime($fecha_db)). " de ".
    date("F",strtotime($fecha_db)). " de " .
    date("Y", strtotime($fecha_db));

    $meses=[
        'January'=>'enero',
        'February'=>'febrero',
        'March'=>'marzo',
        'April'=>'abril',
        'May'=>'mayo',
        'June'=>'junio',
        'July'=>'julio',
        'August'=>'agosto',
        'September'=>'septiembre',
        'October'=>'octubre',
        'November'=>'noviembre',
        'December'=>'diciembre'
    ];

    $fecha_formateada = str_replace(array_keys($meses),array_values($meses), $fecha_formateada);
   
   ?>

    <div style="border: 1px solid #000000">

        <table border="0" cellpadding="6" >
            <tr>
                <td><b>Fecha: </b>{{$fecha_formateada}}</td>
            </tr>
        </table>



    </div>

    <br>

    <table border="0" class="table table-bordered">
        <tr>
            <td width="70px" style="background-color: #cccccc; text-align:center"><b>Nro</b></td>
            <td width="300px" style="background-color: #cccccc; text-align:center"><b>Productos</b></td>
            <td width="90px" style="background-color: #cccccc; text-align:center"><b>Cantidad</b></td>
            <td width="110px" style="background-color: #cccccc; text-align:center"><b>Precio Unitario</b></td>
            <td width="100px" style="background-color: #cccccc; text-align:center"><b>SubTotal</b></td>
        </tr>


        <tbody>
            @php

            $contador= 1;
            $subtotal=0;
            $suma_cantidad=0;
            $suma_precio_uni=0;
            $suma_subtotal=0;

            @endphp

            @foreach ($venta->detallesVenta as $detalle)

            @php
            $subtotal= $detalle->cantidad * $detalle->precio_unitario;
            $suma_cantidad += $detalle->cantidad;
            $suma_precio_uni += $detalle->precio_unitario;
            $suma_subtotal += $subtotal;


            @endphp

                
                <tr>
                    <td style="text-align:center">{{$contador++}}</td>
                    <td>{{ $detalle->producto->nombre_producto }}</td>
                    <td style="text-align:center">{{ $detalle->cantidad }}</td>
                    <td style="text-align:center">$ {{$detalle->precio_unitario}}</td>
                    <td style="text-align:center">{{$subtotal}}</td>

                </tr>
            @endforeach

            <tr>

                <td colspan="2" style="background-color: #cccccc; text-align:center"><b>Total</b></td>
                <td style="background-color: #cccccc; text-align:center"><b>{{ $suma_cantidad }}</b></td>
                <td style="background-color: #cccccc; text-align:center"><b>$ {{ $suma_precio_uni  }}</b></td>
                <td style="background-color: #cccccc; text-align:center"><b>$ {{$suma_subtotal}}</b></td>

            </tr>

        </tbody>

    </table>
    <p><b>Porcentaje: </b> {{ $venta->porcentaje_impuesto }}%</p>

    <p>
        <b>Monto a Pagar: </b> {{ $venta->precio_total_venta }}<br><br>
        <b>Son:</b> {{ $literal }}
    </p>

    <p style="text-align: center">
        -------------------------------------------------------------------------------------------------------------------------------------------------------------
        <br>
        <b>GRACIAS POR SU COMPRA</b>
    </p>
    
    
</body>
</html>