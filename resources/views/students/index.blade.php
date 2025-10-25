@extends('layout.app2')
@section('title')
    all students
@endsection
@section('content')
    <div class="w-full h-[88%] bg-gray-200 flex items-center justify-center">
        <div class="w-[90%] h-5/6 bg-white rounded-xl pt-3 flex flex-col items-center">
            <div class="w-[90%] h-1/5 flex justify-between items-center border-b">
                <a href="{{route('students.create')}}" class="px-10 py-3 rounded-xl font-light text-white bg-gray-800">add student +</a>
                <h2 class="text-xl">students</h2>
            </div>
            <div class="w-[90%] h-3/5 flex flex-col justify-center">
                <table class="w-full min-h-full border border-gray-400">
                    <thead>
                    <tr class="h-12 border border-gray-400 border-b-2 border-b-gray-400">
                        <td class="text-center">field</td>
                        <td class="text-center">email</td>
                        <td class="text-center">name</td>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($students as $student)
                        <tr>
                            <td class="text-center">
                                <form action="{{route('student.field',compact('student'))}}" method="get">
                                    @csrf
                                    <button type="submit" class="text-green-600 cursor-pointer">{{$student->field->title}}</button>
                                </form>
                            </td>
                            <td class="text-center">{{$student->email}}</td>
                            <td class="text-center">{{$student->name}}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
            <div class="mt-5">{{$students->links()}}</div>
        </div>
@endsection
