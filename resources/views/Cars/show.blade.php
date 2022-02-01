@extends('layouts.app')

@section('content')
    <div class="mx-auto w-5/6 py-24">
        <div class="text-center">
            <h1 class="text-5xl uppercase bold">{{ $car->name }}</h1>
        </div>
        <div class="w-5/6 py-10">
            <div class="m-auto">
                <span class="uppercase text-blue-700 font-bold text-xs italic">
                    Founded: {{ $car->founded }}
                </span>
                <p class="text-lg text-gray-800 text-justify">{{ $car->description }}</p>
                <br>
                <table class="table-auto">
                    <thead>
                        <tr class="bg-blue-100">
                            <th class="w-1/4 border-4 border-gray-500">
                                Model</th>
                            <th class="w-1/4 border-4 border-gray-500">
                                Engines</th>
                            <th class="w-1/4 border-4 border-gray-500">
                                Date</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($car->carMode as $model)
                            <tr>
                                <td class="border-4 border-gray-500">
                                    {{ $model->model_name }}
                                </td>
                                <td class="border-4 border-gray-500">
                                    @foreach ($car->engines as $engine)
                                        @if ($model->id == $engine->model_id)
                                            {{ $engine->engine_name }}
                                        @endif
                                    @endforeach
                                </td>
                                <td class="border-4 border-gray-500">
                                    {{ date('d-m-Y',strtotime($car->productionDate->created_at))}}
                                </td>
                            </tr>
                        @empty
                            <p>no car models found</p>
                        @endforelse
                    </tbody>
                </table>
                <p class="text-left">
                    Product Types:
                    @forelse ($car->products as $product)
                        {{ $product->name }}
                    @empty

                    @endforelse
                </p>
                <hr class="mt-4 mb-8 text-purple-900">
            </div>

        </div>
    </div>
@endsection
