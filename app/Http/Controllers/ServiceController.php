<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Service;
use App\Http\Resources\ServiceResource;
class ServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('index');
    }
    public function serviceData(){
        $servicetext = Service::all();
        return new ServiceResource($servicetext);
    }

    

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'text' => 'required'
        ]);
        $service = new Service;
        $service->text = $request->input('text');
        $service->save();

        //append data to next line
        $data = $request->input('text'). ' - Date and Time updated: '. $service->updated_at.PHP_EOL;
        $file = 'service.txt';

        // file is located in the public folder
        if(!file_exists($file)){
            $filehandler = fopen($file, 'w+');
            fwrite($filehandler,$request->input('text'));
            fclose($filehandler);
        }
        else{
            file_put_contents($file, $data , FILE_APPEND | LOCK_EX);
        }
        return redirect('/')->with('success', 'Data Sent to file.');
    }

   
}
