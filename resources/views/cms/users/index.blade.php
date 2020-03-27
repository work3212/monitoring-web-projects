@extends('cms.main')
@section('content')
    <h1 class="h3 text-center mt-5">Список клиентов Viber</h1>
    <hr class="mb-5">
    <section>
        <table class="table table-striped">
            <thead class="thead-dark">
            <tr>
                <th scope="col">Имя</th>
                <th scope="col">Токен</th>
            </tr>
            </thead>
            <tbody>
            @foreach($users as $user)
                <tr>
                    <td>{{$user->name}}</td>
                    <td>{{$user->token}}</td>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </section>
@endsection




