@extends('adminlte::page')

@section('title', 'Menu de Ventas')

@section('content_header')
    <h1>Detalle de la Venta</h1>
    <hr>
@stop

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card card-outline card-primary">
                <div class="card-header">
                    <h3 class="card-title">Datos Registrados </h3>
                </div>

                <div class="card-body">

                    
                        <div class="row">
                            <div class="col-md-8">
                                
                                <div class="row">

                                    <table class="table table-sm table-striped table-bordered table-hover ">
                                        <thead>
                                            <tr style="background-color: #cccccc">
                                                <th style="text-align:center; vertical-align:middle">Nombre</th>
                                                <th style="text-align:center; vertical-align:middle">Codigo</th>
                                                <th style="text-align:center; vertical-align:middle">Cantidad</th>
                                                <th style="text-align:center; vertical-align:middle">Costo</th>
                                                <th style="text-align:center; vertical-align:middle">Total</th>
                                                
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php 
                                            $total_cantidad=0; 
                                            $total_venta=0;
                                        ?>    
                                        @foreach ( $venta->detallesVenta as $detalleVenta )

                                            
                                            
                                            <tr>
                                                <td style="text-align:center; vertical-align:middle">{{ $detalleVenta ->producto->nombre_producto}}</td>
                                                <td style="text-align:center; vertical-align:middle">{{ $detalleVenta ->producto->codigo_producto }}</td>
                                                <td style="text-align:center; vertical-align:middle">{{ $detalleVenta ->cantidad}}</td>
                                                <td style="text-align:center; vertical-align:middle">{{ number_format($detalleVenta->precio_unitario, 2) }}</td>
                                                <td style="text-align:center; vertical-align:middle">{{ $costo = $detalleVenta->cantidad * $detalleVenta->precio_unitario }}</td>
                                               
                                                

                                            </tr>

                                            @php
                                                $total_cantidad+=  $detalleVenta->cantidad;

                                                $total_venta+=  $costo;
                                                    
                                            @endphp
                                            
                                        @endforeach
                                        </tbody>
                                        <tfooter>
                                            <tr>
                                                <td colspan="2" style="text-align:right"><b>Cantidad Total</b></td>
                                                <td style="text-align:center; vertical-align:middle"><b>{{ $total_cantidad }}</b></td>
                                                <td colspan="1" style="text-align:right"><b>Total Ventas</b></td>
                                                <td style="text-align:center; vertical-align:middle"><b>{{ $total_venta }}</b></td>
                                            </tr>

                                        </tfooter>

                                    </table>

                                </div>
                            </div>
                            <div class="col-md-4">                                
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="fecha_venta">Fecha de Venta</label>
                                            <input type="date" class="form-control" value="{{ $venta->fecha_venta }}" name="fecha_venta" disabled>
                                            @error('fecha_venta')
                                            <small style"">{{ $message }}</small>
                                            @enderror

                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="tipo_pago">Tipo de Pago</label>
                                            <input type="text" class="form-control" value="{{ $venta->tipoPago->nombre ?? 'N/A' }}" name="tipo_pago" disabled>


                                        </div>
                                    </div>
                                   
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="precio_total_venta">Porcentaje Agregado</label>
                                            <input type="number" name="porcentaje_agregado" id="porcentaje_agregado" class="form-control"  value="{{ $venta->porcentaje_impuesto }}" disabled>
                                        </div>
                                    </div>
                                    
                                </div>



                                

                                

                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="precio_total_venta">Precio Total</label>
                                            <input type="text" style="text-align:center; vertical-align:middle; background-color: #e9e710;" class="form-control" value="{{ $venta->precio_total_venta }}" name="precio_total_venta" disabled>
                                            @error('precio_total_venta')
                                            <small style"">{{ $message }}</small>
                                            @enderror
                                        </div>
                                    </div>
                                    
                                </div>

                                <hr>

                                <div class="row">
                                    <div class="col-md-12">
                                            <div class="form-group">
                                                
                                                <a href="{{ url('admin/ventas') }}" type="submit" class="btn bg-gradient-secondary btn-lg btn-block"> Volver</a>
                                    
                                            </div>
                                    </div>
                                </div>

                                

                            </div>  
                                 
                        </div>

                        
                       
                    
                   
              </div>
              
            </div>
            
        </div>
    </div>
@stop



                                            

@section('css')
    {{-- Add here extra stylesheets --}}
    {{-- <link rel="stylesheet" href="/css/admin_custom.css"> --}}
@stop

@section('js')

    <script>
        $(document).on('click', '.oferta-btn', function () {
            const id = $(this).data('id');

            $.ajax({
                url: '{{ route("tmpventa.aplicarOferta", ":id") }}'.replace(':id', id),
                type: 'POST',
                data: {
                    _token: '{{ csrf_token() }}'
                },
                success: function (response) {
                    if (response.success) {
                        Swal.fire({
                                    position: "top-end",
                                    icon: "success",
                                    title: "Precio Oferta Aplicado",
                                    showConfirmButton: false,
                                    timer: 1500
                                });
                        location.reload(); // Recargamos para actualizar el precio mostrado
                    } else {
                        alert(response.message);
                    }
                },
                error: function () {
                    alert('Error al aplicar el precio de oferta.');
                }
            });
        });
    </script>


    <script>


        $('.seleccionar-btn').click(function(){
            var id_producto= $(this).data('id');
            $('#codigo').val(id_producto);
            $('#exampleModal').modal('hide');
            $('#exampleModal').on('hidden.bs.modal',function(){
                $('#codigo').focus();
            });

        });

        $('.delete-btn').click(function(){
            var id = $(this).data('id');
            if(id){
                $.ajax({
                        url:"{{ url('/admin/ventas/create/tmp') }}/"+id,
                        type:'POST',
                        data:{
                            _token:'{{ csrf_token() }}',
                            _method:'DELETE',
                        },
                        success:function(response){
                            if(response.success){
                                Swal.fire({
                                    position: "top-end",
                                    icon: "success",
                                    title: "Producto Eliminado",
                                    showConfirmButton: false,
                                    timer: 1500
                                });
                                location.reload();
                            }else{
                                alert('Error al eliminar producto');
                            }
                        },
                        error:function(error){
                            alert(error);
                        }
                    });
            }
        });

       

        $('#form_venta').on('keypress',function (e){
            if(e.keyCode===13 ){
                e.preventDefault();
            }
        });

        $('#codigo').on('keyup',function(e){
           if(e.keyCode=== 13){
                var codigo = $(this).val();
                var cantidad=$('#cantidad').val();
                
                if(codigo.length>0){
                    $.ajax({
                        url:"{{ route('admin.ventas.tmp_ventas') }}",
                        method:'POST',
                        data:{
                            _token:'{{ csrf_token() }}',
                            codigo:codigo,
                            cantidad:cantidad
                        },
                        success:function(response){
                            if(response.success){
                                Swal.fire({
                                    position: "top-end",
                                    icon: "success",
                                    title: "Producto Agregado",
                                    showConfirmButton: false,
                                    timer: 1500
                                });
                                location.reload();
                            }else{
                                alert('No se encuentra el Producto en la base de datos');
                            }
                        },
                        error:function(error){
                            alert(error);
                        }
                    });
                }

           }
        });
    </script>



    <script>
            $('#tabla').DataTable({

                "pageLength":5,
                "language":{
                    "emptyTable":"No hay informacion",
                    "info":"Mostrando _START_ a _END_ de _TOTAL_ Productos",
                    "infoEmpty":"Mostrando 0 a 0 de 0 Productos",
                    "infofiltered":"(Filtrado de _MAX_ total Productos)",
                    "infoEmpty":"Mostrando 0 a 0 de 0 Productos",
                    "infoPostFix":"",
                    "thousands":",",
                    "lengthMenu":"Mostrar _MENU_ Productos",
                    "loadingRecords":"Cargando...",
                    "processing":"Procesando...",
                    "search":"Buscador:",
                    "zeroRecords":"Sin resultados encontrados",
                    "paginate":{
                        "first":"Primero",
                        "last":"Ultimo",
                        "next":"Siguiente",
                        "previous": "Anterior"
                    }
                },

            });
    </script>


    
@stop