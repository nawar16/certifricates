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
                        $btn = '<a href="/certificate/print/'.$row->id.'" class="btn btn-primary btn-sm">Print PDF</a>';
                        $btn .= '<button type="button" class="btn btn-info edit" title="Edit" ><i class="fa fa-edit"></i></button>';
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
            ],
            [
                'fname.required' => 'الاسم الاول مطلوب!',
                'lname.required' => 'الاسم الثاني مطلوب!',
                'email.required' => 'الايميل مطلوب!',
                'degree.required' => 'الدرجة مطلوبة!',
                'source.required' => 'مصدر الشهادة مطلوب!',
            ]);
            if ($validator->fails()) {
                foreach($validator->messages()->getMessages() as $key=>$msg)
                return back()->with('error', $msg[0]); 
            }
            Certificate::create($request->all());
            return back()->with('success', 'تم اضافة الشهادة بنجاح');
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
    public function update($id, Request $request)
    {
        try{
            $validator = \Validator::make($request->all(),[
                'fname' => 'required',
                'lname' => 'required',
                'email' => 'required|email',
                'degree' => 'required',
                'source' => 'required',
            ],
            [
                'fname.required' => 'الاسم الاول مطلوب!',
                'lname.required' => 'الاسم الثاني مطلوب!',
                'email.required' => 'الايميل مطلوب!',
                'degree.required' => 'الدرجة مطلوبة!',
                'source.required' => 'مصدر الشهادة مطلوب!',
            ]);
            if ($validator->fails()) {
                foreach($validator->messages()->getMessages() as $key=>$msg)
                return back()->with('error', $msg[0]); 
            }
            $input = $request->all();
            Certificate::where('id', $id)->update([
                'fname'=> $input['fname'],
                'lname'=> $input['lname'],
                'email'=> $input['email'],
                'degree'=> $input['degree'],
                'source'=> $input['source']
            ]);
            return back()->with('success', 'تم تحديث الشهادة بنجاح');
        } catch(\Exception $ex){
            return back()->with('error', $ex->getMessage());
        }
    }
}