<?php

namespace App\Http\Controllers;

use App\Models\Car;
use Illuminate\Http\Request;

class CarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cars = Car::all()->toArray();
        // $cars = json_decode($cars);
        // $cars = Car::where('name', '=', 'Audi')->get();
        // $cars = Car::chunk(2,function ($cars){
        //     foreach($cars as $car){
        //         print_r($car);
        //     }
        // });
        // #dd($cars);
        // $cars = Car::where('name', '=','BMW')->firstOrFail();
        // print_r(Car::where('name','=','Audi')->count());
        // print_r(Car::sum('founded'));
        var_dump($cars);
        return view('Cars.index', ['cars' => $cars]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('cars.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        /**
        *
        * an old method of saving to the database it works but length for me
        * @method ['OLD METHOD']
        $car = new Car;
        $car->name = $request->input('name');
        $car->founded = $request->input('founded');
        $car->description = $request->input('description');
        $car->save();
        */


        /**
         *
         * prefered way pf saving to the database it is concise and simple don't use if you don't understand Associative Arrays and make sure to add
         * @property fillable to the Model Class else this method won't work
         */
        $car = Car::create([
            'name' => $request->input('name'),
            'founded' => $request->input('founded'),
            'description' => $request->input('description')
        ]);

        return redirect('/cars');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $car = Car::find($id)->first();
        // dd($car);

        return view('Cars.edit')->with('car', $car);
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
        $car = Car::where('id',$id)->update([
            'name' => $request->input('name'),
            'founded' => $request->input('founded'),
            'description' => $request->input('description')
        ]);

        return redirect('/cars');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Car $car)
    {
        // $car = Car::find($id)->first();
        $car->delete();
        return redirect('/cars');
    }
}
