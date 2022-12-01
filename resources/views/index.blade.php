<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Laravel</title>
    <!-- Fonts -->
    <link href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
    <!-- Styles -->
    @vite('resources/css/app.css')

</head>




<body class="flex min-h-screen w-full items-center justify-center bg-bgColor">

    <div class="m-4 w-full rounded bg-white p-6 shadow-lg lg:w-3/4 lg:max-w-lg">
        <a href="{{ route('logine') }}">login</a>
        <a href="{{ route('auth') }}">Register</a>
     
        <div class="mb-4">
            <h2 class="text-uppercase text-3xl font-bold">Todo List</h2>
            <hr class="mt-4 mb-6">
            <form class="flex" action="{{route('store')}}" method="POST">
                @csrf
                <input
                    class=" text-neutral-darker mr-4 w-full appearance-none rounded border py-2 px-3 shadow outline-none hover:border-neutral"
                    placeholder="ex: Anghessel mo3an" name="task">
    
                <button
                    class="mr-3 rounded bg-pink px-5 text-white shadow-sm shadow-pink/50 transition-all hover:shadow-md hover:shadow-pink/50"
                    data-ripple-light="true">Button</button>
            </form>
        </div>
        <div>
            <h2 class="text-1xl mb-2 font-bold">Incompleted: </h2>
                 @foreach ( $todo_completed as $todocmp)
                     
                <div class="mb-4 flex flex-col rounded-lg border-2 border-neutral p-4 pb-2">
                    <div class="flex items-center">
                        <p class="text-neutral-darkest w-full">{{$todocmp->task}}</p>
                        <form method="post" action="{{route('updated',['todo' => $todocmp->id ])}}">

                            @csrf
                            @method('PUT')
                        
                            <button type="submit"
                                class="ml-4 mr-2 flex-shrink-0 rounded border-2 border-success p-2 text-success hover:bg-success hover:text-white">Done</button>
                        </form>

                        <form method="post" action="{{route('deleted',['todo' => $todocmp->id])}}">
                            @csrf
                            @method('DELETE')
                     
                            <button type="submit"
                                class="ml-2 flex-shrink-0 rounded border-2 border-error p-2 text-error hover:bg-error hover:text-white">Remove</button>
                        </form>
                    </div>
                    <span
                        class="ml-auto mt-2 text-sm text-black/50"></span>

                </div>
                @endforeach

            <h2 class="text-1xl mb-2 mt-10 font-bold">Completed: </h2>
            @foreach ($todo_incompleted as $todoin)
                
       
                <div class="mb-4 flex flex-col rounded-lg border-2 border-neutral p-4 pb-2">
                    <div class="flex items-center">
                        <p class="w-full text-success line-through">{{$todoin->task}}</p>

                        <form method="post" action="{{route('updated',['todo' => $todoin->id ])}}">
                            @csrf
                            @method('PUT')
                    
                            <button type="submit"
                                class="ml-4 mr-2 flex-shrink-0 rounded border-2 border-success p-2 text-success hover:bg-success hover:text-white">Done</button>
                        </form>
                        <form method="post" action="">
                     
                            <button type="submit"
                                class="ml-2 flex-shrink-0 rounded border-2 border-error p-2 text-error hover:bg-error hover:text-white">Remove</button>
                        </form>
                    </div>
                    <span class="ml-auto mt-2 text-sm text-black/50">Created:
                        </span>
                </div>
                @endforeach


        </div>
    </div>
</body>

</html>
