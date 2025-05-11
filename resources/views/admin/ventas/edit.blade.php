@extends('adminlte::page')

@section('title', 'Menu de Ventas')

@section('content_header')
    <h1>Modificacion de Venta</h1>
    <hr>
@stop

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card card-outline card-success">
                <div class="card-header">
                    <h3 class="card-title">Ingrese los datos </h3>
                </div>

                <div class="card-body">

                    <form action="{{ url('/admin/ventas',$venta->id) }}" id="form_venta" method="post">
                        @csrf
                        @method('PUT')
                        <div class="row">
                            <div class="col-md-8">
                                <div class="row">
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <label for="cantidad">Cantidad</label><b>*</b>
                                            <input type="number" style="text-align:center" class="form-control" id="cantidad" value="1"  required>
                                            @error('cantidad')
                                            <small style"">{{ $message }}</small>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="codigo">Codigo</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fas fa-barcode"></i></span>
                                            </div>
                                            <input id="codigo" type="text" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <div style="height: 32px"></div>
                                            <button  type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal"><i class="fas fa-search"></i></button>

                                            <a href="{{ url('/admin/productos/create') }}"  type="button" class="btn btn-success"><i class="fas fa-plus"></i></a>
                                            
                                        </div>

                                    </div>

                                </div>
                                <div class="row">

                                    <table class="table table-sm table-striped table-bordered table-hover ">
                                        <thead>
                                            <tr style="background-color: #cccccc">
                                                <th style="text-align:center; vertical-align:middle">Nombre</th>
                                                <th style="text-align:center; vertical-align:middle">Codigo</th>
                                                <th style="text-align:center; vertical-align:middle">Cantidad</th>
                                                <th style="text-align:center; vertical-align:middle">Costo</th>
                                                <th style="text-align:center; vertical-align:middle">Total</th>
                                                <th style="text-align:center; vertical-align:middle">Accion</th>
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
                                                <td style="text-align:center; vertical-align:middle">
                                                    <button  type="button" class="btn bg-gradient-danger btn-sm delete-btn" data-id="{{ $detalleVenta->id }}" ><i class="fas fa-trash"></i></button>
                                                    
                                                </td>
                                                

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
                                            <label for="fecha_venta" >Fecha de Venta</label>
                                            <input type="date" class="form-control" value="{{ $venta->fecha_venta }}" name="fecha_venta">
                                            @error('fecha_venta')
                                            <small style"">{{ $message }}</small>
                                            @enderror

                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="tipo_pago">Tipo de Pago</label>
                                            <select name="tipo_pago_id" class="form-control" id="tipo_pago_id" required>
                                                @foreach ($tipos_pagos as $tipo)
                                                    <option value="{{ $tipo->id }}" {{ $venta->tipo_pago_id == $tipo->id ? 'selected' : '' }}>
                                                        {{ $tipo->nombre }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                   
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="precio_total_venta">Porcentaje Agregado</label>
                                            <input type="number" name="porcentaje_agregado" id="porcentaje_agregado" class="form-control"  value="{{ $venta->porcentaje_impuesto}}" required min="0">
                                        </div>
                                    </div>
                                    
                                </div>

                                

                                <div class="row">
                                @php
                                    $total_base = $venta->detallesVenta->sum(fn($d) => $d->cantidad * $d->precio_unitario);
                                    $porcentaje = $venta->porcentaje_impuesto;
                                    $total_venta = $total_base + ($total_base * $porcentaje / 100);
                                @endphp
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="precio_total_venta">Precio Total</label>
                                            <input type="text"
                                                style="text-align:center; vertical-align:middle; background-color: #e9e710;"
                                                class="form-control"
                                                value="{{ $total_venta }}"
                                                id="precio_total_venta"
                                                name="precio_total_venta"
                                                data-original-total="{{ $total_venta }}"
                                                readonly>
                                            @error('precio_total_venta')
                                                <small>{{ $message }}</small>
                                            @enderror
                                        </div>
                                    </div>
                                    
                                </div>

                                <hr>

                                <div class="row">
                                    <div class="col-md-12">
                                            <div class="form-group">
                                                
                                                <button type="submit" class="btn bg-gradient-success btn-lg btn-block"><i class="fas fa-save"></i> Actualizar Venta</button>
                                    
                                            </div>
                                    </div>
                                </div>

                                

                            </div>  
                                 
                        </div>

                        
                       
                    </form>
                   
              </div>
              
            </div>
            
        </div>
    </div>
@stop


<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Lista de Productos</h1>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <table id="tabla"class="table table-striped table-bordered table-hover">
                            <thead class="thead-light">
                                <tr>
                                    <th scope="col" style="text-align:center">Accion</th>
                                    <th scope="col" style="text-align:center">Nombre</th>
                                    <th scope="col" style="text-align:center">Codigo</th>
                                    <th scope="col" style="text-align:center">Stock</th>
                                    <th scope="col" style="text-align:center">Precio de Venta</th>
                                </tr>  
                            </thead>
                            <tbody>
                                
                                @foreach ( $productos as $producto)
                                    <tr>
                                        <td style="text-align:center; vertical-align:middle"><button type="button" class="btn btn-info seleccionar-btn" data-id="{{ $producto->codigo_producto }}">Agregar</button></td>
                                        <td style="text-align:center; vertical-align:middle">{{ $producto->nombre_producto }}</td>
                                        <td style="text-align:center; vertical-align:middle">{{ $producto->codigo_producto }}</td>
                                        <td style="text-align:center; vertical-align:middle">{{ $producto->stock_producto }}</td>
                                        <td style="text-align:center; vertical-align:middle">{{ $producto->precio_venta_producto }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                    </div>
                </div>
            </div>
</div>
                                            

@section('css')
    {{-- Add here extra stylesheets --}}
    {{-- <link rel="stylesheet" href="/css/admin_custom.css"> --}}
@stop

@section('js')




    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const porcentajeInput = document.getElementById('porcentaje_agregado');
            const totalVentaInput = document.getElementById('precio_total_venta');
            const totalVentaOriginal = parseFloat(totalVentaInput.dataset.originalTotal); // Guardamos el total original

            porcentajeInput.addEventListener('input', function () {
                const porcentaje = parseFloat(porcentajeInput.value);

                if (!isNaN(porcentaje)) {
                    const incremento = (totalVentaOriginal * porcentaje) / 100;
                    const nuevoTotal = (totalVentaOriginal + incremento).toFixed(2);
                    totalVentaInput.value = nuevoTotal;
                } else {
                    totalVentaInput.value = totalVentaOriginal.toFixed(2); // Si borra el porcentaje, vuelve al original
                }
            });
        });
    </script>

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
                        url:"{{ url('/admin/ventas/detalle') }}/"+id,
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
                var id_venta='{{ $venta->id }}';
                
                if(codigo.length>0){
                    $.ajax({
                        url:"{{ route('admin.detalles.ventas.store') }}",
                        method:'POST',
                        data:{
                            _token:'{{ csrf_token() }}',
                            codigo:codigo,
                            cantidad:cantidad,
                            id_venta:id_venta
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
                        error:function(xhr, status, error){
                            console.log(xhr.responseText);
                            alert('Error en la solicitud AJAX. Mirá la consola.');
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