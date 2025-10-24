@extends('layout.app2')
@section('title')
    add course
@endsection
@section('content')
    <div class="w-full h-[88%] bg-gray-200 flex items-center justify-center">
        <div class="w-[90%] h-5/6 bg-white rounded-xl pt-3 flex flex-col items-center">
            <div class="w-[90%] h-1/5 flex justify-end items-center border-b">
                <h2 class="text-xl">add course</h2>
            </div>
            <div class="flex w-full h-4/5">
                <form action="{{route('courses.store')}}" method="post" class="w-full h-full flex flex-row-reverse">
                    @csrf
                    <div class="w-1/2 h-full flex flex-col items-end pr-20 relative">
                        <div class="w-5/6 h-auto flex flex-row-reverse justify-between pt-4 mb-6">
                            <label for="title" class="font-semibold ml-5">: title</label>
                            <input type="text" name="title" value="{{old('title')}}" id="title" class="w-2/5 h-8 rounded outline-0 p-2 border border-gray-400">
                            @error('title')
                                <p class="text-red-700">{{$message}}</p>
                            @enderror
                        </div>
                        <div class="w-5/6 h-auto flex flex-row-reverse justify-between pt-4 mb-6">
                            <label for="description" class="font-semibold ml-5">: description</label>
                            <textarea name="description" id="description" cols="10" rows="10" class="w-2/5 h-32 rounded outline-0 p-2 border border-gray-400">{{old('description')}}</textarea>
                            @error('description')
                                <p class="text-red-700">{{$message}}</p>
                            @enderror
                        </div>
                        <div class="w-5/6 h-auto flex flex-row-reverse justify-between pt-4 mb-6">
                            <label for="year" class="font-semibold ml-5">: year</label>
                            <select name="year" id="year" class="w-2/5 h-8 rounded outline-0 px-2 border border-gray-400">
                                @for($i=2020;$i<2040;$i++)
                                    <option value="{{$i}}">{{$i}}</option>
                                @endfor
                            </select>
                            @error('year')
                            <p class="text-red-700">{{$message}}</p>
                            @enderror
                        </div>
                        <input type="submit" value="Add" class="absolute bottom-2 -left-10 text-white bg-gray-700 py-3 px-7 cursor-pointer rounded">
                    </div>
                    <div class="w-1/2 h-full flex flex-col items-end pr-20">
                        <div class="w-5/6 h-auto flex flex-row-reverse justify-between pt-4 mb-6">
                            <label for="start_date" class="font-semibold ml-5">: start date</label>
                            <input type="date" name="start_date" value="{{old('start_date')}}" id="start_date" class="w-2/5 h-8 rounded outline-0 p-2 border border-gray-400">
                            @error('start_date')
                            <p class="text-red-700">{{$message}}</p>
                            @enderror
                        </div>
                        <div class="w-5/6 h-auto flex flex-row-reverse justify-between pt-4 mb-6">
                            <label for="end_date" class="font-semibold ml-5">: end date</label>
                            <input type="date" name="end_date" value="{{old('end_date')}}" id="end_date" class="w-2/5 h-8 rounded outline-0 p-2 border border-gray-400">
                            @error('end_date')
                            <p class="text-red-700">{{$message}}</p>
                            @enderror
                        </div>
                    </div>
                </form>
            </div>
        </div>
@endsection
