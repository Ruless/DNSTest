<?php

namespace App\Http\Controllers\Excel;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Customer;
use Validator;

class DataController extends Controller
{

    public function index()
    {
        return view('list', [
            'customers' => Customer::all()
        ]);
    }

    public function create()
    {
        return view('create');
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'lastname' => 'required|min:5|max:255',
            'firstname' => 'required|min:5|max:255',
            'secondname' => 'required|min:5|max:255',
            'bth' => 'required|date_format:Y|integer',
            'position' => 'required|min:3|max:255',
            'salary' => 'required',
        ]);


        if($validator->passes()){
            Customer::create([
                'lastname' => $request['lastname'],
                'firstname' => $request['firstname'],
                'secondname' => $request['secondname'],
                'bth' => $request['bth'],
                'position' => $request['position'],
                'salary' => $request['salary'],
            ]);
            return response()->json([
                'redirect' => route('home')
            ]);
        }else{
            return response()->json([
                'error' => $validator->errors()
            ]);
        }
    }


    public function edit(Request $request)
    {
        return view('edit', [
            'customer' => Customer::find($request['id'])
        ]);
    }

    public function update(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'lastname' => 'required|min:5|max:255',
            'firstname' => 'required|min:5|max:255',
            'secondname' => 'required|min:5|max:255',
            'bth' => 'required|date_format:Y|integer',
            'position' => 'required|min:3|max:255',
            'salary' => 'required',
        ]);


        if($validator->passes()){
            $customer = Customer::find($request['id']);

            $customer->lastname = $request['lastname'];
            $customer->firstname = $request['firstname'];
            $customer->secondname = $request['secondname'];
            $customer->bth = $request['bth'];
            $customer->position = $request['position'];
            $customer->salary = $request['salary'];
            $customer->save();

            return response()->json([
                'redirect' => route('home')
            ]);
        }else{
            return response()->json([
                'error' => $validator->errors()
            ]);
        }
    }

    public function show(Request $request)
    {

        return view('show', [
            'customer' => Customer::find($request['id'])
        ]);
    }


    public function delete(Request $request)
    {
        $customer = Customer::find($request['id']);
        $customer->delete();
        return redirect('/');
    }
}
