@extends('template')

@section('main-content')
    <div class="container-fluid" style="width: 100%">
        <header class="d-flex justify-content-center py-3 bg-dark">
            <h2 class="text-white">Panel Admina</h2>
        </header>
    </div>

    <div class="container-sm pt-4">
        <form method="GET" action="/dashboard/find" style="display: inline;">
            @method('GET')
            @csrf
            <input class="input-group-lg" type="text" class="form-control" name="search_input"
                   placeholder="Wpisz dane..." required>
            <button class="btn btn-outline-secondary" type="sumbit">Szukaj</button>
        </form>
        <a class="btn btn-outline-primary" href="{{route('dashboard')}}">Pokaż wszystkich</a>
        <a class="btn btn-outline-success" href="{{route('addEmployee')}}">Dodaj pracownika</a>

    </div>

    <div class="container-sm" style="height: 400px; overflow: auto; padding-top: 15px; text-align: center">
        <table id="myTable" class="table table-striped table-bordered table-sm">
            <thead>
            <tr>
                <th class="th-sm" onclick="sortTable(0)">Imię</th>
                <th class="th-sm" onclick="sortTable(1)">Email</th>
                <th class="th-sm" onclick="sortTable(2)">Nr. telefonu</th>
                <>
                <th class="th-sm">Działania</th>
            </tr>
            </thead>
            <tbody>
            @foreach($employees as $employee)
                <tr>
                    <td>{{$employee->name}}</td>
                    <td>{{$employee->email}}</td>
                    <td>{{$employee->phone}}</td>

                    <td>Edytuj</td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>


    <script>
        function sortTable(n) {
            var table, rows, switching, i, x, y, shouldSwitch, dir, switchcount = 0;
            table = document.getElementById("myTable");
            switching = true;
            dir = "asc";
            while (switching) {
                switching = false;
                rows = table.rows;
                for (i = 1; i < (rows.length - 1); i++) {
                    shouldSwitch = false;
                    x = rows[i].getElementsByTagName("TD")[n];
                    y = rows[i + 1].getElementsByTagName("TD")[n];
                    if (dir == "asc") {
                        if (x.innerHTML.toLowerCase() > y.innerHTML.toLowerCase()) {
                            shouldSwitch = true;
                            break;
                        }
                    } else if (dir == "desc") {
                        if (x.innerHTML.toLowerCase() < y.innerHTML.toLowerCase()) {
                            shouldSwitch = true;
                            break;
                        }
                    }
                }
                if (shouldSwitch) {
                    rows[i].parentNode.insertBefore(rows[i + 1], rows[i]);
                    switching = true;
                    switchcount++;
                } else {
                    if (switchcount == 0 && dir == "asc") {
                        dir = "desc";
                        switching = true;
                    }
                }
            }
        }
    </script>
@endsection
