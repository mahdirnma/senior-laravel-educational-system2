@extends('layout.app2')
@section('title')
    all teachers
@endsection
@section('content')
    <div class="w-full h-[88%] bg-gray-200 flex items-center justify-center">
        <div class="w-[90%] h-5/6 bg-white rounded-xl pt-3 flex flex-col items-center">
            <div class="w-[90%] h-1/5 flex justify-between items-center border-b">

                <h2 class="text-xl">teachers</h2>
            </div>
            <div class="w-[90%] h-3/5 flex flex-col justify-center">
                <table class="w-full min-h-full border border-gray-400">
                    <thead>
                    <tr class="h-12 border border-gray-400 border-b-2 border-b-gray-400">
                        <td class="text-center">branch</td>
                        <td class="text-center">unitNumber</td>
                        <td class="text-center">description</td>
                        <td class="text-center">title</td>
                    </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td class="text-center">{{$field->branch}}</td>
                            <td class="text-center">{{$field->unitNumber}}</td>
                            <td class="text-center">{{$field->description}}</td>
                            <td class="text-center">{{$field->title}}</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
@endsection
