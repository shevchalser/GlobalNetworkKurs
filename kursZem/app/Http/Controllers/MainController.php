<?php

namespace App\Http\Controllers;

use App\Models\Workout;
use App\Models\MovesList;
use App\Models\workout_details;
use App\Models;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class MainController extends Controller
{
    public function home(){
        $workoutlist = new Workout();
        if(Auth::check()){
            $id = Auth::user()->id;
            return view('home',['workoutlist'=>$workoutlist->where('user','=',$id)->get()]);
        }
        return view('home');
    }

    public function about() {
        return view('about');
    }

    public function workoutadd() {
        $data = Workout::create([
            'user'=>Auth::user()->id,
            'name'=>'новая тренировка',
            'creationDate'=>Carbon::now()
        ]);
        return view('workoutadd',['wo'=>$data]);
    }

    public function workoutadd_proc($id, Request $req){
        $workout = Workout::find($id);
        $workout->name = $req->input('woname');
        $workout->save();
        return redirect(route('workoutaddone',$workout->id));
    }

    public function workoutaddone($id){
        $workout = Workout::find($id);
        $wd = DB::select(DB::raw('select ml.name, wd.sets, wd.reps, wd.workout, wd.id from workout_details wd
                                        left join moves_lists ml on wd.move=ml.id
                                        where workout = :id'),array('id' => $id));
        $wd_count =  DB::select(DB::raw('select count(move)+1 as move from workout_details
                                               where workout = :id'),array('id' => $id));
        return view('workoutaddone')->with('wd', $wd)->with('wo', $workout)->with('move', $wd_count);
    }

    public function workoutaddvar($id){
        $workout = Workout::find($id);
        $movelist = DB::select(DB::raw("select name from moves_lists"));
        return view('workoutaddvar')->with('movelist',$movelist)->with('woid',$id);
    }

    public function woAddVars($id, Request $req){
        $workout = Workout::find($id);
        $move = DB::select(DB::raw('select distinct id from moves_lists
                                               where name = :name'),array('name' => $req->input('name')));

        $wd = workout_details::create([
            'workout'=>$id,
            'move'=>$move[0]->id,
            'sets'=>$req['sets'],
            'reps'=>$req['reps']
        ]);
        return redirect(route('workoutaddone', $workout->id));
    }
    public function reg() {
        return view('reg');
    }

    public function login() {
        return view('login');
    }

    public function logout()
    {
        auth("web")-> logout();
        return redirect(route("home"));
    }

    public function register_proc(Request $request){
        $data = $request->validate([
            "name" => ["required","string"],
            "email"=>["required","email","string","unique:users,email"],
            "passw"=>["required","confirmed"]
        ]);

        $user = User::create([
            "name"=>$data["name"],
            "email"=>$data["email"],
            "password"=>bcrypt($data["passw"])
        ]);

        if($user){
            auth("web")->login($user);
        }
        return redirect(route("home"));
    }

    public function login_proc(Request $request){
        $data = $request->validate([
            "email"=>["required","email","string"],
            "password"=>["required"]
        ]);
        if(auth("web")->attempt($data)){
            return redirect(route("home"));
        }
        return redirect(route("login"))->withErrors(["email"=>"Пользователь не найден или данные введены неверно"]);
    }

    public function MovesList() {
        $moveList = new Models\MovesList();
        return view('workout',['workout'=> $moveList->all()]);
    }

    public function workout($id) {
        $query = DB::select(DB::raw("select ml.name, wd.sets, wd.reps from workout_details wd
                                            left join moves_lists ml on wd.move=ml.id
                                            where wd.workout=:variable"), array('variable' => $id));
        return view('workout',['wdt'=>$query]);
    }

}
