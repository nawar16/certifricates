<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Certificate;
use DataTables;

class CertificateController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = Certificate::select('*');
            return Datatables::of($data)
                    ->addIndexColumn()
                    ->addColumn('action', function($row){
                        $btn = '<a href="/certificate/print/'.$row->id.'" class="edit btn btn-primary btn-sm">Print PDF</a>';
                        return $btn;
                    })
                    ->rawColumns(['action'])
                    ->make(true);
        }
        return view('admin.certificates');
    }


    public function store(Request $request)
    {
        try{
            $validator = \Validator::make($request->all(),[
                'fname' => 'required',
                'lname' => 'required',
                'email' => 'required|email',
                'degree' => 'required',
                'source' => 'required',
            ]);
            if ($validator->fails()) {
                return back()->with('error', $validator->messages()->getMessages()[0]);
            }
            Certificate::create($request->all());
            return back()->with('success', 'Certificate create successfully');
        } catch(\Exception $ex){
            return back()->with('error', $ex->getMessage());
        }

    }
    public function view_print($id)
    {
        try{
            $certificate = Certificate::find($id);
            return view('admin.pdf')->with('data', $certificate);
        } catch(\ModelNotFoundException $ex)
        {
            return back()->with('error', $ex->getMessage());
        }
    }
    public function print($id)
    {
        return view('admin.print')->with('id', $id);
    }
    public function do_print($id)
    {
        try{
            $certificate = Certificate::find($id);
            $data = $certificate->toArray();
            $customPaper = array(0,0,1600.00,2300.80);
            $pdf = \Pdf::loadView('admin.pdf', $data)->setOptions(['defaultFont' => 'sans-serif'])->setPaper($customPaper, 'landscape');
            $pdf->getDomPDF()->setHttpContext(
                stream_context_create([
                    'ssl' => [
                        'allow_self_signed'=> TRUE,
                        'verify_peer' => FALSE,
                        'verify_peer_name' => FALSE,
                    ]
                ])
            );
            return $pdf->download('certificate.pdf');
        } catch(\ModelNotFoundException $ex)
        {
            return back()->with('error', $ex->getMessage());
        }
    }
}