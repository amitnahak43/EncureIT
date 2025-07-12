<html>
    <head>
        <title>Create Data</title>
    </head>
    <body>
    @if(session('success'))
        <p style"color: green;">{{ session('success') }}</p>
    @endif
    <form method="POST" action="{{ route('posts.store') }}">
        @csrf
        <input type="text" name="first_name" placeholder="please enter your last name">
        <input type="text" name="last_name" placeholder="please enter your last name">
        <button type="submit">Create</button>
    </form>
    </body>
<html>