<?php

namespace App\Http\Controllers;

use App\Account;
use App\Fund;
use App\Fundfields;
use Illuminate\Http\Request;
use \Illuminate\Support\Facades\Validator;
use Barryvdh\DomPDF\Facade as PDF;
class FundController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $drivers = Fund::all();
        return view('fundaccount.index', compact('drivers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('fundaccount.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator =Validator::make($request->except('_token'),
            [
                'name'=>'required',
                'from' =>'required',
                'to'=>'required'
            ],
            [
             'name.required'=>'حقل الاسم مطلوب',
             'from.required'=>'حقل من مطلوب',
             'to.required'=>'حقل الي مطلوب',

            ]);
        if($validator->fails()){
            $messages = $validator->messages();
            return redirect()->back()->withErrors($validator);
        }
        Fund::create($request->except('_token'));
        return redirect(url('admin/fund'));
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function storefields(Request $request ,$id)
    {
        $felids = $request->except('_token');
        $balance = 0;
        foreach($felids['fund'] as $felid){
            $newbalance = &$balance;
           if(!is_null($felid[1]) && $felid[2]=='debt')
           {
               $newbalance +=$felid[1];
           }
            elseif(!is_null($felid[1]) && $felid[2]=='credit')
            {
                $newbalance -=$felid[1];
            }
            $count = count($felid);
            if($count < 3 && $felid[1] != null){
                return redirect()->back()->withErrors($felid[0]);
            }
            Fundfields::create([
                'name'=>$felid[0],
                'balance'=>$newbalance ? $newbalance : 0,
                'amount'=>$felid[1] ? $felid[1] : 0 ,
                'debit'=>isset($felid[2])&&$felid[2]=='debt'? $felid[1] : 0,
                'credit'=>isset($felid[2])&&$felid[2]=='credit'? $felid[1] : 0,
                'fundaccount'=>$id,
            ]);
        }
        Fundfields::create([
            'name'=>'اجمالي',
            'balance'=>$balance,
            'amount'=>$balance ,
            'debit'=>$balance,
            'fundaccount'=>$id,
        ]);
        $fundaccount = Fundfields::where('fundaccount',$id);
        $name = Fund::find($id);
        $pdf = PDF::loadView('pdf.fundaccount',['fundaccounts'=>$fundaccount->get()]);

        return  $pdf->download('fundaccount.pdf');

       //  redirect(url('admin/fund'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Fund  $fund
     * @return \Illuminate\Http\Response
     */
    public function fieldsfill(Fund $id)
    {
        $funddetails = $id->fundfields;
        if(empty($funddetails->toArray())){
            return view('fundaccount.createfunddetial',['fund'=>$id]);
        }
        return view('fundaccount.fundaccountfeld',['id'=>$id,'fund'=>$funddetails]);
    }

    public function printfundaccount($id)
    {
        $fundaccount = Fundfields::where('fundaccount',$id);
        $name = Fund::find($id);
        $pdf = PDF::loadView('pdf.newpdf',['fundaccounts'=>$fundaccount->get()]);

        return  $pdf->download('fundaccount.pdf');
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Fund  $fund
     * @return \Illuminate\Http\Response
     */
    public function edit(Fund $fund)
    {
        $funddetails = $fund->fundfields()->get();
        return view('fundaccount.editfunddetial',['fund'=>$fund,'funddetails'=>$funddetails]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Fund  $fund
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Fund $fund)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Fund  $fund
     * @return \Illuminate\Http\Response
     */
    public function destroy(Fund $fund)
    {
        //
    }
}
