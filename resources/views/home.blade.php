@extends('layouts.app')

@section('content')

<!-- Modal New Number -->
<div class="modal fade" id="modal-new-number" tabindex="-1" role="dialog" 
  aria-labelledby="modal-new-number-label" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="modal-new-number-label">Adicionar Número</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        {{ Form::open(['route' => 'administracao', 'method' => 'post', 'id' => 'modal-new-number-form']) }}
          <div class="form-group mb-3">
              {{ Form::label('type_id', 'Tipo de Número') }}
              {{ Form::select('type_id', $numberTypes, null, ['class' => 'custom-select']) }}
          </div>
          <div class="form-group mb-3">
              {{ Form::label('number_value', 'Valor') }}
              {{ Form::number('number_value', null, ['class' => 'form-control', 'placeholder' => 0]) }}
          </div>
        {{ Form::close() }}
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
        <button type="button" class="btn btn-primary" id="new-number">Adicionar</button>
      </div>
    </div>
  </div>
</div>

<!-- Modal Edit Number -->
<div class="modal fade" id="modal-edit-number" tabindex="-1" role="dialog" 
  aria-labelledby="modal-edit-number-label" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="modal-edit-number-label">Editar Número</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        {{ Form::open(['route' => 'administracao', 'method' => 'post', 'id' => 'modal-edit-number-form']) }}
          <div class="form-group mb-3">
              {{ Form::label('edit_type_id', 'Tipo de Número') }}
              {{ Form::select('edit_type_id', $numberTypes, null, ['class' => 'custom-select']) }}
          </div>
          <div class="form-group mb-3">
              {{ Form::label('edit_number_value', 'Valor') }}
              {{ Form::number('edit_number_value', null, ['class' => 'form-control', 'placeholder' => 0]) }}
          </div>
          {{ Form::hidden('edit_number_id', null) }}
        {{ Form::close() }}
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
        <button type="button" class="btn btn-primary" id="edit-number">Editar</button>
      </div>
    </div>
  </div>
</div>

<!-- Main Content -->
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-12">

      @if (session('status'))
        <div class="alert alert-success">
          {{ session('status') }}
        </div>
      @endif

      <div class="card">
        <div class="card-header">Administração
          <button class="btn btn-primary float-right btn-margin-left" data-toggle="modal" data-target="#modal-new-number">
              Novo Número
          </button>
          <a href="{{route('dashboard')}}" class="btn btn-primary float-right">
              Ver Dashboard</a>
        </div>

        <div class="card-body">
          <table class="table table-striped">
            <thead>
              <tr>
                <th>ID</th>
                <th>Título</th>
                <th>Valor</th>
                <th>Data/Hora</th>
                <th class="text-right tbl-action-padding">
                    Ações
                </th>
              </tr>
            </thead>
            <tbody>

              @foreach ($numberList as $number)
                <tr>
                  <td>{{ $number->id }}</td>
                  <td>{{ $number->numberType->description }}</td>
                  <td>{{ $number->value }}</td>
                  <td>{{ $number->created_at }}</td>
                  <td>
                    <button class="btn btn-primary float-right btn-margin-left" 
                      onclick="removeNumber({{ $number->id }})">Excluir</button>
                    <button class="btn btn-primary float-right" data-toggle="modal" data-target="#modal-edit-number"
                      onclick="editNumber({{ $number->id }}, {{ $number->type_id }}, {{ $number->value }})">Editar</button>
                  </td>
                </tr>
              @endforeach
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>

<script src="{{ asset('js/home.js') }}"></script>
@endsection
