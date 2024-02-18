<?php

namespace App\Http\Controllers;

use Illuminate\View\View;
use Illuminate\Http\Request;
use App\Jobs\ProcessExcel;
use Exception;
use Illuminate\Support\Facades\Bus;

class ExcelUploadController extends Controller
{
    public function Upload(): View{
        return view('uploader.upload');
    }
    //
    public function BigExcelUpload(Request $request)
    {
        // dd($request->file('excelfile'));
        //validation data
        /* kilobytes 2048 =2MB*100 */
        $request->validate([
            'excelfile' => 'required|file|mimes:csv,xlsx|max:204800',
        ],[
            'required'=>'Please Select a Csv File.'
        ]);
        
        $message= "CSV Uploaded/ imported added on queue";
        //File chunk data import into db
        if($request->has('excelfile')){
            $exceldata = file($request->excelfile);
            // dd(count($exceldata)); Actual data validation inside excel/csv
            if(is_array($exceldata) && count($exceldata)>0){
                $chuncklength=count($exceldata);
                $chunks = array_chunk($exceldata, (($chuncklength>500)? 500: $chuncklength) );
                $header = [];
                $batch = Bus::batch([])->dispatch();
                foreach ($chunks as $key => $chunk) {
                    $data = array_map('str_getcsv', $chunk);
                    if($key==0){
                        $header = $data[0];
                        unset($data[0]);
                    }
                    // dump($header);
                    // dd($data);
                    $batch->add(new ProcessExcel($data, $header));
                }
            }
            
            //File Upload
            // $path=$request->file('excelfile')->store('Excel');            
        }
/* }catch(Exception $ex) {
    throw new Exception($ex->getMessage());
    // $message = $ex->getMessage();
    // return redirect()->route('upload')->with('errors', $message);
} */ 
        return redirect()->route('upload')->with('success', $message);
    }
}
