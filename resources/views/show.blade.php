@extends('welcome')

@section('content')
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
        </tr>
    </thead>
    <tbody>
        
        <tr>
            <td>{{ $customer->id }}</td>
            <td>{{ $customer->lastname }}</td>
            <td>{{ $customer->firstname }}</td>
            <td>{{ $customer->secondname }}</td>
            <td>{{ $customer->bth }}</td>
            <td>{{ $customer->position }}</td>
            <td>{{ $customer->salary }}</td>

        </tr>
        
    </tbody>
</table>
@endsection