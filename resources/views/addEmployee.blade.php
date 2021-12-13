@extends('template')

@section('main-content')
    <div class="container-fluid" style="width: 100%">
        <header class="d-flex justify-content-center py-3 bg-dark">
            <h2 class="text-white">Dodaj pracownika</h2>
        </header>
    </div>
    <div class="container-lg" style="padding-top: 15px">
        <form method="POST" action="/dashboard/addEmployee">
            @method('POST')
            @csrf
            <div class="form-group col-md-6">
                <label for="inputEmail4">Imię</label>
                <input type="text" name="name" class="form-control" required>
            </div>
            <div class="form-group col-md-6">
                <label for="inputPassword4">Email</label>
                <input type="email" name="email" class="form-control" required>
            </div>
            <div class="form-group col-md-6">
                <label for="inputAddress">Numer telefonu</label>
                <input type="number" name="phone" class="form-control" required>
            </div>
            <div class="form-group col-md-6">
                <label for="inputAddress">Pensja</label>
                <input type="number" name="salary" class="form-control" required>
            </div>
            <label>Płec</label><br>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="gender" value="M" required>
                <label class="form-check-label" for="inlineRadio1">Mężczyzna</label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="gender" value="F" required>
                <label class="form-check-label" for="inlineRadio2">Inne</label>
            </div><br>
            <button type="submit" class="btn btn-primary">Zarejestruj</button>
        </form>
    </div>

@endsection
