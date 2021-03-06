@extends('admin.admin')
@section('contenido')
<!-- page content -->
<div class="right_col" role="main">
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3>Editar Usuario : {{$User->name}}</h3>
            </div>
        </div>
        <div class="clearfix"></div>
        <div class="row">
            @if (count($errors)>0)
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                    <li>{{$error}}</li>
                    @endforeach
                </ul>
            </div>
            @endif
        </div>

        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Edición Usuario <small>Sistema</small></h2>
                        <ul class="nav navbar-right panel_toolbox">
                            <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                            </li>
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button"
                                    aria-expanded="false"><i class="fa fa-wrench"></i></a>
                                <ul class="dropdown-menu" role="menu">
                                    <li><a href="#">Settings 1</a>
                                    </li>
                                    <li><a href="#">Settings 2</a>
                                    </li>
                                </ul>
                            </li>
                            <li><a class="close-link"><i class="fa fa-close"></i></a>
                            </li>
                        </ul>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        {!!Form::open(array('method'=>'PATCH','route'=>['user.update',$User->id],'files'=>'true'))!!}
                        {{Form::token()}}
                        <div class="form-horizontal form-label-left" novalidate>
                            <div class="item form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Nombre <span
                                        class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input id="nombre" name="nombre" class="form-control col-md-7 col-xs-12"
                                        data-validate-length-range="4" placeholder="Nombre Usuario sistema"
                                        required="required" type="text" value="{{$User->name}}">
                                </div>
                            </div>
                            <div class="item form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="email">Correo <span
                                        class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input type="email" id="email" name="email" required="required"
                                        class="form-control col-md-7 col-xs-12" value="{{$User->email}}">
                                </div>
                            </div>
                            <div class="item form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="email">Confime Correo
                                    <span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input type="email" id="email2" name="email2" data-validate-linked="email"
                                        required="required" class="form-control col-md-7 col-xs-12"
                                        value="{{$User->email}}">
                                    <input type="hidden" name="idpersona" value="{{$User->id_persona}}">
                                </div>
                            </div>
                            <div class="item form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="occupation">Rol <span
                                        class="required">*</span>
                                </label>
                                <div class="col-lg-6 col-md-6 col-sm-6  col-xs-12 form-group has-feedback">
                                    <select name="rol" id="rol" class="form-control selectpicker"
                                        data-live-search="true">
                                        @foreach ($Roles as $Items)
                                        @if($Items->id == $User->id_rol)
                                        <option value="{{$Items->id}}" selected>{{$Items->nombre}}</option>
                                        @else
                                        <option value="{{$Items->id}}">{{$Items->nombre}}</option>
                                        @endif
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="item form-group">
                                <label for="password" class="control-label col-md-3">Contraseña *</label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input id="password" type="text" name="password" data-validate-length="20"
                                        class="form-control col-md-7 col-xs-12" required="required"
                                        value="{{$User->password}}">
                                </div>
                            </div>
                            <div class="item form-group">
                                <label for="password2" class="control-label col-md-3 col-sm-3 col-xs-12">Repetir
                                    Contraseña *</label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input id="password2" type="text" name="password2" data-validate-linked="password"
                                        class="form-control col-md-7 col-xs-12" required="required"
                                        value="{{$User->password}}">
                                </div>
                            </div>
                            <div class="item form-group">
                                    <label for="password2" class="control-label col-md-3 col-sm-3 col-xs-12">Repetir
                                            Estado *</label>
                                <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                                    <select name="estado" id="estado" class="form-control ">
                                        @foreach ($Arrayestado as $items)
                                        @if($items == $User->estado)
                                        <option value="{{$items}}" selected> @if($items == 1) ACTIVO @else INACTIVO
                                            @endif </option>
                                        @else
                                        <option value="{{$items}}"> @if($items == 1) ACTIVO @else INACTIVO @endif
                                        </option>
                                        @endif
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="item form-group">
                                <label for="password2" class="control-label col-md-3 col-sm-3 col-xs-12"> </label>

                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <div class="input-group input-file">
                                        <div class="form-control">
                                            <a target="_blank">Seleccionar imagen de tipo PNG o JPG</a>
                                        </div>
                                        <span class="input-group-addon">
                                            <a class='btn btn-primary' href='javascript:;'>
                                                Imagen
                                                <input type="file" name="imagen"
                                                    onchange="$(this).parent().parent().parent().find('.form-control').html($(this).val());">
                                            </a>
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <div class="ln_solid"></div>
                            <div class="form-group">
                                <div class="col-md-6 col-md-offset-3">
                                        <a href="/../detailperson/{{$User->id_persona}}"><button type="button" class="btn btn-info"> Cancelar</button></a>  
                                        <button id="send" type="submit" class="btn btn-success">Guardar</button>
                                </div>
                            </div>
                        </div>
                        {!!Form::close()!!}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- /page content -->


@endsection