<?php

namespace App\Http\Controllers\Excel;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Customer;                     
use Excel;
use Session;

class ExcelController extends Controller
{
    //
    public function import()
    {
        $data = Customer::get()->toArray();

        return view('import');
    }

     public function importData(Request $request)
    {
        if($request->hasFile('import_file')){
            Excel::load($request->file('import_file')->getRealPath(), function ($reader) {
                foreach ($reader->toArray() as $key => $row) {
                    if ($row != ''){
                        Customer::create([
                            'lastname' => $row['famimliya'],
                            'firstname' => $row['imya'],
                            'secondname' => $row['otchestvo'],
                            'bth' => ceil($row['god._rozhdeniya']),
                            'position' => $row['dolzhnost'],
                            'salary' => $row['zp_v_god.'],
                        ]);
                    }
                }
                
            });
        }
        
        Session::put('success', 'Данные успешно импотрированы в базу!');
        return redirect('/');
    }

    public function exportData()
    {
        $data = Customer::get()->toArray();
        
        for ($i=0; $i < count($data); $i++) { 
            unset($data[$i]['id']);
            unset($data[$i]['created_at']);
            unset($data[$i]['updated_at']);
        }        
        
        
        return Excel::create(date("H:i:s"), function($excel) use ($data) {
            $excel->sheet('first', function($sheet) use ($data)
            {
                $sheet->prependRow(array(
                    'Фамимлия', 'Имя', 'Отчество', 'Год. рождения', 'Должность', 'Зп в год.'
                ));

                foreach ($data as $key => $value) {
                    $sheet->appendRow($value);
                }
            });
        })->download('xlsx');
    }
}
