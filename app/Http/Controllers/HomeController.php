<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\gaji;
use Session;
use View;
use DataTables;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('index',['active'=>'home']);
    }
    
    public function gaji()
    {   
       
        $data = gaji::all();
        return view('gaji',['active'=>'gaji','data_gaji'=>$data]);
    }
    public function get_gaji()
    {   
        
        return Datatables::of( gaji::all())
        ->addIndexColumn()
        ->addColumn('jamsostek', function($row){
            
               return ($row->gapok * 2 / 100);
       })
       ->editColumn('telat', function($row){
           
              return ($row->telat * 50000);
       })
       
       ->addColumn('pph21', function($row){
           
              return ($row->gapok * 1 / 100);
       })
       
       ->editColumn('absen', function($row){
          
              return ($row->absen * 200000);
       })
       
       ->addColumn('pensi', function($row){
           
              return ($row->gapok * 2 / 100);
       })
       ->addColumn('bpjs', function($row){
           
              return ($row->gapok * 2 / 100);
       })
       ->addColumn('button', function($row){
           
              return '<div class="table-data-feature">
              <button onclick="edit_data('. $row->id .',\''. $row->nama.'\','. $row->gapok.','. $row->telat.','. $row->absen.')" class="item" data-toggle="tooltip" data-placement="top" title="" data-original-title="Edit">
                  <i class="zmdi zmdi-edit"></i>
              </button>
            </div>';
       })->rawColumns(['button' => 'button'])
        ->make(true);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function post(Request $request){
        if(!empty($request->id)){
            DB::table('gajis_tables')
            ->where('id', $request->id)
            ->update([
                'nama' => $request->nama,
                'gapok' => $request->gapok,
                'telat' => $request->telat,
                'absen' => $request->absen
            ]);
        
            $response = array(
                'status' => 'success',
                'msg' => 'Success Updating data.',
            );
            Session::flash('success', 'Success Updating data.');
        }else{
            $gaji = new gaji;
            $gaji->nama = $request->nama;
            $gaji->gapok = $request->gapok;
            $gaji->telat = $request->telat;
            $gaji->absen = $request->absen;
            $gaji->save();
           
            $response = array(
                'status' => 'success',
                'msg' => 'Success adding data.',
            );
            Session::flash('success', 'Success adding data.');
        }
        return response()->json($response); 
     }
}
