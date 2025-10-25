@extends('layout.app2')
@section('title')
    all teachers
@endsection
@section('content')
    <div class="w-full h-[88%] bg-gray-200 flex items-center justify-center">
        <div class="w-[90%] h-5/6 bg-white rounded-xl pt-3 flex flex-col items-center">
            <div class="w-[90%] h-1/5 flex justify-between items-center border-b">
                @auth('admin')
                    <a href="{{route('teachers.create')}}" class="px-10 py-3 rounded-xl font-light text-white bg-gray-800">add teacher +</a>
                @endauth
                <h2 class="text-xl">teachers</h2>
            </div>
            <div class="w-[90%] h-3/5 flex flex-col justify-center">
                <table class="w-full min-h-full border border-gray-400">
                    <thead>
                    <tr class="h-12 border border-gray-400 border-b-2 border-b-gray-400">
{{--
                        <td class="text-center">delete</td>
                        <td class="text-center">update</td>
--}}
                        <td class="text-center">field</td>
                        <td class="text-center">email</td>
                        <td class="text-center">name</td>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($teachers as $teacher)
                        <tr>
{{--
                            <td class="text-center">
                                <form action="{{route('courses.destroy',compact('course'))}}" method="post">
                                    @csrf
                                    @method('delete')
                                    <button type="submit" class="text-green-600 cursor-pointer">delete</button>
                                </form>
                            </td>
                            <td class="text-center">
                                <form action="{{route('courses.edit',compact('course'))}}" method="get">
                                    @csrf
                                    @can('manage-courses',compact('course'))
                                        <button type="submit" class="text-cyan-600 cursor-pointer">update</button>
                                    @endcan
                                </form>
                            </td>
--}}
                            <td class="text-center">
                                <form action="{{route('teacher.field',compact('teacher'))}}" method="get">
                                    @csrf
                                    <button type="submit" class="text-green-600 cursor-pointer">{{$teacher->field->title}}</button>
                                </form>
                            </td>
                            <td class="text-center">{{$teacher->email}}</td>
                            <td class="text-center">{{$teacher->name}}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
            <div class="mt-5">{{$teachers->links()}}</div>
        </div>
@endsection
