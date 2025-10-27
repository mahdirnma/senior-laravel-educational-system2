@php use Illuminate\Support\Facades\Auth; @endphp
    <!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>
    @vite('resources/css/app.css')
</head>
<body>
<div class="w-svw h-svh">
    <div class="w-full h-[12%] flex items-center flex-row-reverse pr-12 text-xl">
        @auth('teachers')
            <h1 class="font-bold text-xl">teachers panel</h1>
        @endauth
        @auth('students')
            <h1 class="font-bold text-xl">students panel</h1>
        @endauth
        @auth('admin')
            <h1 class="font-bold text-xl">admin panel</h1>
        @endauth

        <div class="w-5/6 h-full flex items-center justify-center">
            <nav>
                <ul class="flex flex-row-reverse">
                    @if(Auth::guard('teachers')->check() || Auth::guard('admin')->check())
                        <li class="w-44 h-full flex justify-center items-center font-mono text-balance"><a href="{{route('courses.index')}}">courses</a></li>
                        <li class="w-44 h-full flex justify-center items-center font-mono text-balance"><a href="{{route('teachers.index')}}">teachers</a></li>
                    @endif
                    @auth('admin')
                            <li class="w-44 h-full flex justify-center items-center font-mono text-balance"><a href="{{route('students.index')}}">students</a></li>
                    @endauth
                        {{--
                                            @auth('teachers')
                                                <li class="w-44 h-full flex justify-center items-center font-mono text-balance"><a href="{{route('courses.index')}}">courses</a></li>
                                                <li class="w-44 h-full flex justify-center items-center font-mono text-balance"><a href="{{route('teachers.index')}}">teachers</a></li>
                                            @endauth
                                            @auth('students')
                                                <li class="w-44 h-full flex justify-center items-center font-mono text-balance"><a href="{{route('student.profile')}}">student's lessons</a></li>
                                            @endauth
                        --}}
                    <li class="w-44 h-full flex justify-center items-center font-mono text-balance"><a href="{{route('lessons.index')}}">lessons</a></li>
                    @if(Auth::guard('students')->check())
                        <li class="w-44 h-full flex justify-center items-center font-mono text-balance"><a href="{{route('student.profile')}}">student's lessons</a></li>
                    @endif
                </ul>
            </nav>
        </div>
        @auth('teachers')
            <form action="{{route('teacher.logout')}}" method="post">
                @csrf
                <button type="submit" class="text-red-700 font-bold cursor-pointer"><- logout</button>
            </form>
        @endauth
        @auth('students')
            <form action="{{route('student.logout')}}" method="post">
                @csrf
                <button type="submit" class="text-red-700 font-bold cursor-pointer"><- logout</button>
            </form>
        @endauth
        @auth('admin')
            <form action="{{route('admin.logout')}}" method="post">
                @csrf
                <button type="submit" class="text-red-700 font-bold cursor-pointer"><- logout</button>
            </form>
        @endauth
    </div>
    @yield('content')
</div>
</body>
</html>
