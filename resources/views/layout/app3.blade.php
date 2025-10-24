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
        <h1 class="font-bold text-xl">lessons</h1>
        <div class="w-5/6 h-full flex items-center justify-center">
            @auth('teachers')
            <nav>
                <ul class="flex flex-row-reverse">
                    <li class="w-44 h-full flex justify-center items-center font-mono text-balance"><a href="{{route('teachers.all')}}">all teachers</a></li>
                    <li class="w-44 h-full flex justify-center items-center font-mono text-balance"><a href="{{route('courses.index')}}">courses</a></li>
                    <li class="w-44 h-full flex justify-center items-center font-mono text-balance"><a href="{{route('lessons')}}">all lessons</a></li>
                </ul>
            </nav>
            @endauth
            @auth('students')
            <nav>
                <ul class="flex flex-row-reverse">
                    <li class="w-44 h-full flex justify-center items-center font-mono text-balance"><a href="{{route('lessons')}}">all lessons</a></li>
                    <li class="w-44 h-full flex justify-center items-center font-mono text-balance"><a href="{{route('student.lessons.profile')}}">student's lessons</a></li>
                </ul>
            </nav>
            @endauth
        </div>
        @auth('students')
            <form action="{{route('student.logout')}}" method="post">
                @csrf
                <button type="submit" class="text-red-700 font-bold cursor-pointer"><- logout</button>
            </form>
        @endauth
        @auth('teachers')
            <form action="{{route('teacher.logout')}}" method="post">
                @csrf
                <button type="submit" class="text-red-700 font-bold cursor-pointer"><- logout</button>
            </form>
        @endauth
    </div>
    @yield('content')
</div>
</body>
</html>
