@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif


<form class="flex" action="{{ route('logine') }}" method="POST">
    @csrf

    email:<input type="email" name="email"><br>

    password:<input type="password" name="password"><br>

    <button
        class="mr-3 rounded bg-pink px-5 text-white shadow-sm shadow-pink/50 transition-all hover:shadow-md hover:shadow-pink/50"
        data-ripple-light="true">Button</button>
</form>
