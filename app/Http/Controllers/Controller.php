<?php

namespace App\Http\Controllers;

use App\Http\Resources\EmployeeResource;
use App\Http\Resources\UserCollection;
use App\Http\Resources\UserResource;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Http;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function index()
    {
        $client = new Client();
        $res = $client->request('GET', 'http://127.0.0.1:8080/api/employee');
        $json = $res->getBody()->getContents();

        $object = (array)json_decode($json);
        $collection = User::hydrate($object);

        $employees = EmployeeResource::collection($collection);
        return view('test', [
            'employees' => $employees
        ]);
    }

    public function show(Request $request)
    {
        $client = new Client();
        $res = $client->request('GET', 'http://127.0.0.1:8080/api/employee/filter/' . $request->input('search_input'));
        $json = $res->getBody()->getContents();

        $object = (array)json_decode($json);
        $collection = User::hydrate($object);

        $employees = EmployeeResource::collection($collection);
        return view('test', [
            'employees' => $employees
        ]);
    }

    /**
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function addEmployee(Request $request)
    {
        $client = new Client();
        $client->request('POST', 'http://127.0.0.1:8080/api/employee', [
            'json' => [
                'name' => $request->input('name'),
                'email' => $request->input('email'),
                'phone' => $request->input('phone'),
                'salary' => $request->input('salary'),
                'gender' => $request->input('gender'),
                'hire_date' => Carbon::now()->toDateTimeString()
            ]
        ]);

        return redirect()->route('dashboard');
    }

    public function deleteEmployee(Request $request){
        $client = new Client();
        $client->delete('http://127.0.0.1:8080/api/employee/' . $request->input('employee_id'));

        return redirect()->route('dashboard');
    }
}
