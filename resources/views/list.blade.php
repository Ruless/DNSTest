@extends('welcome')

@section('content')
    @if($message = Session::get('success'))
        <div class="alert alert-info alert-dismissible fade in" role="alert">
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
          <strong>Успех!</strong> {{ $message }}
        </div>
    @endif
    {!! Session::forget('success') !!}
<table class="table table-striped">
    <thead>
        <tr>
            <td>ID</td>
            <td>Фамилия</td>
            <td>Имя</td>
            <td>Отчество</td>
            <td>Год рождения</td>
            <td>Должность</td>
            <td>Зарплата</td>
            <td></td>
        </tr>
    </thead>
    <tbody>
        @foreach($customers as $customer)
        <tr>
            <td>{{ $customer->id }}</td>
            <td>{{ $customer->lastname }}</td>
            <td>{{ $customer->firstname }}</td>
            <td>{{ $customer->secondname }}</td>
            <td>{{ $customer->bth }}</td>
            <td>{{ $customer->position }}</td>
            <td>{{ $customer->salary }}</td>
            <td>

                <a class="btn btn-small btn-success" href="{{ route('show', ['id'=> $customer->id]) }}">Просмотреть</a>

                <a class="btn btn-small btn-info" href="{{ route('edit', ['id'=> $customer->id]) }}">Редактировать</a>

                <a class="btn btn-small btn-warning" href="{{ route('delete', ['id'=> $customer->id]) }}">Удалить</a>

            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection