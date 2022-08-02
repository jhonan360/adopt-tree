@extends('layouts.dashboard')
@section('contentBody')

    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Productos</h1>
    </div>
        
    <form method=POST action="productos.php">
        <div class="row">
            <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                <div class="form-group row <?php if( !isset( $_GET["id"] ) ) echo('invisible');?>" >
                    <label for="id" class="col-sm-2 col-md-2 col-lg-2 col-xl-2 col-form-label">Id</label>
                    <div class="col-sm-10 col-md-10 col-lg-10 col-xl-10">
                        <input type="text" class="form-control" id="id" name="id" placeholder="Id del producto" value="<?php if( isset( $_GET["id"] ) ) echo$_GET["id"];?>" required readonly="readonly">
                    </div>
                </div>
        
                <div class="form-group row">
                    <label for="tipoProducto" class="col-sm-2 col-md-2 col-lg-2 col-xl-2 col-form-label">Tipo de producto</label>
                    <div class="col-sm-10 col-md-10 col-lg-10 col-xl-10">
                        <select class="form-control" id="tipoProducto" name="tipoProducto"  required>
                            <option value="" selected disabled>Seleccione tipo de producto</option>
                            <?php
                                foreach ($tiposProductos as $tipo) {
                                    $select= "";
                                    if($datos["Tipo_Producto_Id"]==$tipo["Id"]){
                                        $select= "selected";
                                    }
                                    echo('<option value="'.$tipo["Id"].'"'.$select.' >'.$tipo["Nombre"]." | ".$tipo["Detalle"].'</option>');
                                }
                            ?>
                        </select>
                        
                    </div>
                </div>
        
                
                <div class="form-group row">
                    <label for="nombreProducto" class="col-sm-2 col-md-2 col-lg-2 col-xl-2 col-form-label">Nombre</label>
                    <div class="col-sm-10 col-md-10 col-lg-10 col-xl-10">
                        <input type="text" class="form-control" id="nombreProducto" name="nombreProducto" placeholder="Escribe nombre del producto" value="<?=$datos["Nombre"]?>" required>
                    </div>
                </div>
        
                <div class="form-group row">
                    <label for="estadoProducto" class="col-sm-2 col-md-2 col-lg-2 col-xl-2 col-form-label">Estado</label>
                    <div class="col-sm-10 col-md-10 col-lg-10 col-xl-10">
                        <select class="form-control" id="estadoProducto" name="estadoProducto" required>
                            <option value="" selected disabled>Seleccione un estado</option>
                            <?php
                                $opt=[array("Id" => "A","Nombre" => "Activo"),array("Id" => "I","Nombre" => "Inactivo")] ;
                                
                                foreach ($opt as $o) {
                                    $select= "";
                                    if($datos["Estado"]==$o["Id"]){
                                        $select= "selected";
                                    }
                                    echo('<option value="'.$o["Id"].'"'.$select.' >'.$o["Nombre"].'</option>');
                                }                    
                            ?>
        
                        </select>
                    </div>
                </div>
        
                <div class="form-group row">
                    <label for="precioCompra" class="col-sm-2 col-md-2 col-lg-2 col-xl-2 col-form-label">Precio Compra</label>
                    <div class="col-sm-10 col-md-10 col-lg-10 col-xl-10">
                        <input type="number" min="0" class="form-control" id="precioCompra" name="precioCompra" placeholder="Escribe nombre del producto" value="<?=$datos["Precio_Compra"]?>">
                    </div>
                </div>
        
                <div class="form-group row">
                    <label for="precioVenta" class="col-sm-2 col-md-2 col-lg-2 col-xl-2 col-form-label">Precio Venta</label>
                    <div class="col-sm-10 col-md-10 col-lg-10 col-xl-10">
                        <input type="number" min="0" class="form-control" id="precioVenta" name="precioVenta" placeholder="Escribe nombre del producto" value="<?=$datos["Precio_Venta"]?>">
                    </div>
                </div>
                                                    
                <div class="form-group row">
                    <label for="descripcion" class="col-sm-2 col-md-2 col-lg-2 col-xl-2 col-form-label">Descripción</label>
                    <div class="col-sm-10 col-md-10 col-lg-10 col-xl-10">
                        <textarea class="form-control" name="descripcion" id="descripcion"  rows="3" required><?=$datos["Descripcion"]?></textarea>
                    </div>
                </div>
                    
            </div>
        </div>
        <div class="form-group row text-center">
            <div class="col-sm-4 ">
                <button class="btn btn-success btn-icon-split" type="submit" id="btnCrear" name="btnCrear" <?php if( isset( $_GET["id"] ) ) echo('disabled');?>>
                    <span class="icon text-white-50">
                        <i class="fas fa-check"></i>
                    </span>
                    <span class="text">Crear producto</span>    
                </button>
            </div>
            <div class="col-sm-4">
                    <button class="btn btn-warning btn-icon-split"  id="btnActualizar" name="btnActualizar" <?php if( !isset( $_GET["id"] ) ) echo('disabled');?>>
                        <span class="icon text-white-50">
                            <i class="fas fa-edit"></i>
                        </span>
                        <span class="text">Actualizar</span>    
                    </button>
                </div>
            <div class="col-sm-4">
                    <a  href="./productos.php"class="btn btn-primary btn-icon-split"  >
                        <span class="icon text-white-50">
                            <i class="fas fa-dumpster"></i>
                        </span>
                        <span class="text">limpiar</span>    
                    </a>
            </div>
        </div>
    </form>
@endsection