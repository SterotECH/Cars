@extends('layouts.app')

@section('content')
@foreach ($cars as $car)
    {{ $car['name'] }}
@endforeach
<div class="m-auto w-4/5 py-24">
    <div class="text-center">
        <h1 class="text-5xl uppercase bold">cars</h1>
    </div>

    <div class="pt-10">
        <a href="cars/create" class="border-b-2 pb-2 border-dashed italic text-gray-500">
        Add a new Car &rarr;</a>
    </div>
    <div class="w-5/6 py-10">
        @foreach ($cars as $car)
        <div class="m-auto">
            <div class="float-right">
                <a href="cars//edit" class="border-b-2 pb-2 italic text-green-800">&larr;Edit</a>
                <form action="/cars/" method="post" class="pt-3">
                @csrf
                @method('DELETE')
                <button type="submit" class="border-b-2 pb-2 italic text-red-500">
                    Delete &Proportion;
                </button>
                </form>
            </div>
            <span class="uppercase text-blue-700 font-bold text-xs italic">
                Founded:
            </span>

            <h2 class="text-gray-700 text-5xl py-6"></h2>

            <p class="text-lg text-gray-800"></p>
            <hr class="mt-4 mb-8 text-purple-900">

        </div>
        @endforeach

    </div>
</div>
@endsection
