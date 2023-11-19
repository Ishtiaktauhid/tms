<?php

namespace App\Http\Controllers\Backend;
use App\Http\Controllers\Controller;
use App\Models\Reservation;
use Illuminate\Http\Request;
use Exception;
use File;

class ReservationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $reservation=Reservation::paginate(10);
        return view('backend.reservation.index',compact('reservation'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $reservation=Reservation::get();
        return view('backend.reservation.create',compact('reservation'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try{
            $reservation=New Reservation();
            $reservation->team_id=$request->team_id;
            $reservation->sports_type=$request->sports_type;
            $reservation->start_time=$request->start_time;
            $reservation->end_time=$request->end_time;
           
            if($reservation->save())
            return redirect()->route('reservation.index')->with('success','Successfully saved');
        else 
            return redirect()->back()->withInput()->with('error','Please try again');

        }catch(Exception $e){
             dd($e);
            return redirect()->back()->withInput()->with('error','Please try again');
        }
        
    }

    /**
     * Display the specified resource.
     */
    public function show(Reservation $reservation)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $reservation=Reservation::find(encryptor('decrypt',$id));
        return view('backend.reservation.edit',compact('reservation'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Reservation $reservation)
    {
        try{
            $reservation=Reservation::findOrFail(encryptor('decrypt',$id));
            $reservation->team_id=$request->team_id;
            $reservation->sports_type=$request->sports_type;
            $reservation->start_time=$request->start_time;
            $reservation->end_time=$request->end_time;
            $reservation->reservation_date=$request->reservation_date;
           
            if($reservation->save())
            return redirect()->route('reservation.index')->with('success','Successfully saved');
        else 
            return redirect()->back()->withInput()->with('error','Please try again');

        }catch(Exception $e){
            // dd($e);
            return redirect()->back()->withInput()->with('error','Please try again');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $reservation=Reservation::find(encryptor('decrypt',$id));
        $reservation->delete();
        return back();
    }
}
