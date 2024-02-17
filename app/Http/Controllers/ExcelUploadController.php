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
        ]);
        
        $message= "CSV Uploaded/ imported added on queue";
        //File chunk data import into db
        if($request->has('excelfile')){
            $exceldata = file($request->excelfile);
            $chunks = array_chunk($exceldata, 500);
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
            //File Upload
            $path=$request->file('excelfile')->store('Excel');            
        }
/* }catch(Exception $ex) {
    throw new Exception($ex->getMessage());
    // $message = $ex->getMessage();
    // return redirect()->route('upload')->with('errors', $message);
} */ 
        return redirect()->route('upload')->with('success', $message);
    }
}
