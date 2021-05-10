<?php

namespace App\Http\Controllers;
use App\Models\tache;
use App\Models\active;
use App\Models\completed;

use Illuminate\Http\Request;

class TacheController extends Controller
{
    //

    public function alltache()
    {
        $alltache=tache::all();
        $activetache=active::all();
        $completedtache=completed::all();

        return view('tache')->with(['alltache' => $alltache,'activetache' => $activetache, 'completedtache'=> $completedtache]);
    }



    public function addtache(Request $request)
    {
            $t=new tache;
            $a=new active;

                $t->tache=$request->tache;
                $t->etat=0;
                $t->save();

                $a->active=$request->tache;
                $a->save();
            
            return redirect()->route('alltache.page');

    }



    public function ajout_completed_tache(Request $request)
    {

      $tache=tache::find($request->tache_id );

        if($tache->etat==0)
        {                  
            $completed= new completed;
            $completed->id=$request->tache_id;
            $completed->completed=$tache->tache;
            $completed->save();

            $tache->etat=1;
            $tache->save();

            $active=active::find($request->tache_id );
            $active->delete();

        }
        else{
            $active= new active;
            $active->id=$request->tache_id;
            $active->active=$tache->tache;
            $active->save();

            $tache->etat=0;
            $tache->save();

            $completed=completed::find($request->tache_id );
            $completed->delete();

        }

        return response()->json();
                
        
    }



    public function supprimer_tache(Request $request)
    {

        $tache=tache::find($request->tache_id );

        if($tache->etat==0)
        {                  
            $active=active::find($request->tache_id );
            $active->delete();

            $tache->delete();

        }
        else{

            $completed=completed::find($request->tache_id );
            $completed->delete();

            $tache->delete();

        }

        return response()->json();

    }


    public function supprimer_all(Request $request)
    {
        $completed=completed::all();
        foreach($completed as $completed)
        {
            $completed->delete();        
        }

        $tache=tache::where("etat","=",1)->get();
        foreach($tache as $tache)
        {
            $tache->delete();        
        }

        return response()->json();
    }



}
