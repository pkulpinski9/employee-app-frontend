@extends('template')

@section('main-content')
    <div class="container-fluid" style="width: 100%">
        <header class="d-flex justify-content-center py-3 bg-dark">
            <h2 class="text-white">Dodaj pracownika</h2>
        </header>
    </div>
    <div class="container-lg" style="padding-top: 15px">
        <form method="POST" action="/dashboard/editEmployee">
            @method('PUT')
            @csrf
            <input type="hidden" name="employee_id" value="{{$employee->id}}">
            <div class="form-group col-md-6">
                <label for="inputEmail4">Imię</label>
                <input type="text" name="name" class="form-control" value="{{$employee->name}}" required>
            </div>
            <div class="form-group col-md-6">
                <label for="inputPassword4">Email</label>
                <input type="email" name="email" class="form-control" value="{{$employee->email}}" required>
            </div>
            <div class="form-group col-md-6">
                <label for="inputAddress">Numer telefonu</label>
                <input type="number" name="phone" min="10000000000" max="99999999999" class="form-control" value="{{$employee->phone}}" required>
            </div>
            <div class="form-group col-md-6">
                <label for="inputAddress">Pensja</label>
                <input type="number" name="salary" min="3200" max="1000000" step="0.01" class="form-control" value="{{$employee->salary}}" required>
            </div>
            <div class="form-group col-md-6">
                <label for="inputAddress">Data zatrudnienia</label>
                <input type="text" name="salary" class="form-control" value="{{$employee->hire_date}}" disabled>
            </div>
            <label>Płec</label><br>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="gender" value="M" required @if($employee->gender == 'M') checked @endif>
                <label class="form-check-label" for="inlineRadio1">Mężczyzna</label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="gender" value="F" required @if($employee->gender == 'F') checked @endif>
                <label class="form-check-label" for="inlineRadio2">Kobieta</label>
            </div><br>
            <button type="submit" class="btn btn-primary">Edytuj</button>
        </form>
    </div>


@endsection
