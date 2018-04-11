@extends('welcome')

@section('content')
    <form action="{{ route('import/data') }}" class="form-horizontal" method="post" enctype="multipart/form-data">
        {{ csrf_field() }}
        <input type="file" name="import_file" />
        <button class="btn btn-primary m-t-20">Импортировать данные с файла</button>
    </form>
@endsection