@extends('layouts.app')
@section('PageTitle', 'Examenes Digestivos')
@section('content')
<div class="row">
  <div class="col-sm-12">
    <div class="full-right">
      <h2>Examenes Digestivos</h2>
    </div>
  </div>
</div>

@if ($message = Session::get('success'))
<div class="alert alert-success">
  <p>{{ $message }}</p>
</div>
@endif
@if ($message = Session::get('warning'))
<div class="alert alert-warning">
  <p>{{ $message }}</p>
</div>
@endif

<table class="table table-hover">
  <tr>
    <thead>
      <th with="80px">No</th>
      <th>Organo Digestivo</th>
      <th>Detalle</th>
        <th width="140px" class="text-center">
          <a href="{{route('createEDIS', $exm_id)}}" class="btn btn-success btn-sm">
            <i class="glyphicon glyphicon-plus"></i>
          </a>
        </th>
        <th> </th>
    </thead>
  </tr>
  <?php $no = 1; ?>
  @foreach ($exmsistemasdigestivos as $key => $value)
  <tr>
    <td>{{$no++}}</td>
    <td>{{ $value->nombre }}</td>
    <td>{{ $value->exSg_Descripcion }}</td>
    <td>
      {!! Form::open(['method' => 'POST','route' => ['editEDIS', $value->exSg_id, $exm_id],'style'=>'display:inline']) !!}
      <button type="submit" style="display: inline;" class="btn btn-hover btn-sm black-background">
        <i style="color: #ffffff;" class="fas fa-edit"></i>
      </button>
      {!! Form::close() !!}

      {!! Form::open(['method' => 'DELETE','route' => ['deleteEDIS', $value->exSg_id, $exm_id],'style'=>'display:inline']) !!}
      <button type="submit" style="display: inline;" class="btn btn-hover btn-sm black-background">
        <i style="color: #ffffff;" class="far fa-trash-alt"></i>
      </button>
      {!! Form::close() !!}

    </td>
  </tr>
  @endforeach
</table>
@endsection