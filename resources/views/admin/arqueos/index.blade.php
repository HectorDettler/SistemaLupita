@extends('adminlte::page')

@section('title', 'Menu de Caja')

@section('content_header')
    <h1>Lista de Arqueos</h1>
    <hr>
@stop

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card card-outline card-primary">
                <div class="card-header">
                    <h3 class="card-title">Arqueos Registrados </h3>
                    <div class="card-tools">

                        @if($arqueoAbierto)
                        
                        
                        @else
                            <a href="{{ url('/admin/arqueos/create') }}" class="btn bg-gradient-primary"><i class="fa fa-plus"></i> Crear Arqueo</a>
                        @endif
                        

                        

                    </div>
                </div>

                <div class="card-body">
                    <table id="tabla" class="table table-striped table-bordered table-hover">
                        <thead class="thead-light">
                            <tr>
                                <th scope="col" style="text-align:center">Nro</th>
                                <th scope="col" style="text-align:center">Fecha Apertura</th>
                                <th scope="col" style="text-align:center">Monto Inicial</th>
                                <th scope="col" style="text-align:center">Fecha Cierre</th>
                                <th scope="col" style="text-align:center">Monto Final</th>
                                <th scope="col" style="text-align:center">Movimientos</th>
                                <th scope="col" style="text-align:center">Acciones</th>
                            </tr>  
                        </thead>
                        <tbody>
                            <?php $contador=1; ?>
                            @foreach ( $arqueos as $arqueo)
                                <tr>
                                    <td style="text-align:center">{{ $contador++ }}</td>
                                    <td style="text-align:center">{{ $arqueo->fecha_apertura_arqueo }}</td>
                                    <td style="text-align:center">{{ $arqueo->monto_inicial_arqueo }}</td>
                                    <td style="text-align:center">{{ $arqueo->fecha_cierre_arqueo }}</td>
                                    <td style="text-align:center">{{ $arqueo->monto_final_arqueo }}</td>

                                    <td>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <b>Ingresos</b><br>
                                                {{ number_format($arqueo->total_ingreso) }}
                                            </div>
                                            <div class="col-md-6">
                                                <b>Egresos</b><br>
                                                {{ number_format($arqueo->total_engreso) }}
                                            </div>
                                        </div>
                                        
                                    </td>
                                    
                                    <td style="text-align:center">
                                        <div class="btn-group" role="group" aria-label="Basic example">
                                            
                                            <a href="{{ url('/admin/arqueos/'.$arqueo->id) }}" class="btn bg-gradient-primary btn-sm" ><i class="fas fa-eye" ></i></a>
                                            <a href="{{ url('/admin/arqueos/'.$arqueo->id.'/edit') }}" class="btn bg-gradient-success btn-sm" ><i class="fas fa-pencil" ></i></a>
                                            <a href="{{ url('/admin/arqueos/'.$arqueo->id.'/ingreso_egreso') }}" class="btn bg-gradient-warning btn-sm" ><i class="fas fa-cash-register" ></i></a>
                                            <a href="{{ url('/admin/arqueos/'.$arqueo->id.'/cierre') }}" class="btn bg-gradient-secondary btn-sm" ><i class="fas fa-lock" ></i></a>
                                            <form action="{{ url('/admin/arqueos',$arqueo->id) }}" method="post" onclick="preguntar{{$arqueo->id}}(event)" id="miFormulario{{ $arqueo->id }}">
                                                @csrf
                                                @method ('DELETE')
                                                <button type="submit" class="btn bg-gradient-danger btn-sm" style="border-radius: 0px 5px 5px 0px"  ><i class="fas fa-trash"></i></button>
                                            </form>
                                            <script>

                                                function preguntar{{$arqueo->id}}(event){
                                                    event.preventDefault();
                                                    
                                                    
                                                    Swal.fire({
                                                        title:'¿Desea eliminar este registro?',
                                                        text:'si se elimina este archivo, se borraran todos los movimientos de caja relacionados a este.',
                                                        icon:'question',
                                                        showDenyButton: true,
                                                        confirmButtonText:'Eliminar',
                                                        confirmButtonColor:'a#5161d',
                                                        denyButtonColor:'#270a0a',
                                                        denyButtonText:'Cancelar'
                                                    }).then((result)=>{
                                                        if(result.isConfirmed){
                                                            var form= $('#miFormulario{{$arqueo->id}}');
                                                            form.submit();
                                                        }

                                                    });
                                                    
                                                }

                                            </script>
                                            
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
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
    <script> console.log("Hi, I'm using the Laravel-AdminLTE package!"); </script>


    <script>
        $('#tabla').DataTable({

            "pageLength":5,
            "language":{
                "emptyTable":"No hay informacion",
                "info":"Mostrando _START_ a _END_ de _TOTAL_ Arqueos",
                "infoEmpty":"Mostrando 0 a 0 de 0 Arqueos",
                "infofiltered":"(Filtrado de _MAX_ total Arqueos)",
                "infoEmpty":"Mostrando 0 a 0 de 0 Arqueos",
                "infoPostFix":"",
                "thousands":",",
                "lengthMenu":"Mostrar _MENU_ Arqueos",
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