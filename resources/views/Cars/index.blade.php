@extends('layouts.app')

@section('content')
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
                <a href="cars/{{ $car->id }}/edit" class="border-b-2 pb-2 italic text-green-800">&larr;Edit</a>
                <form action="/cars/{{ $car->id }}" method="post" class="pt-3">
                @csrf
                @method('DELETE')
                <button type="submit" class="border-b-2 pb-2 italic text-red-700">
                    Delete &Proportion;
                </button>
                </form>
            </div>
            <span class="uppercase text-blue-700 font-bold text-xs italic">
                Founded: {{ $car->founded }}
            </span>

            <h2 class="text-gray-700 text-5xl py-6 hover:text-gray-500">
                <a href="/cars/{{ $car->id }}">{{ $car->name }}</h2>
                </a>
            <p class="text-lg text-gray-800">{{ substr($car->description,0,100) }} ...</p>
            @unless ($car->created_at !== $car->updated_at)
                <small>
                    Updated at: <span class="text-red-600">{{ $car->updated_at }}</span>
                </small>
            @endunless
            <hr class="mt-4 mb-8 text-purple-900">

        </div>
        @endforeach

    </div>
</div>
@endsection
