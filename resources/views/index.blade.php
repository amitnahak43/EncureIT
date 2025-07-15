<!DOCTYPE html>
<html>
<head>
    <title>Posts</title>
</head>
<body>

<h2>Create New Post</h2>

@if(session('success'))
    <p style="color:green;">{{ session('success') }}</p>
@endif

<form action="{{ route('posts.store') }}" method="POST">
    @csrf
    <label>First Name:</label>
    <input type="text" name="first_name" required><br><br>

    <label>Last Name:</label>
    <input type="text" name="last_name" required><br><br>

    <button type="submit">Submit</button>
</form>

<hr>

<h2>All Posts</h2>
<table border="1" cellpadding="5">
    <tr>
        <th>ID</th>
        <th>First Name</th>
        <th>Last Name</th>
        <th>Execution Time</th>
    </tr>
    @foreach($posts as $post)
    <tr>
        <td>{{ $post->id }}</td>
        <td>{{ $post->first_name }}</td>
        <td>{{ $post->last_name }}</td>
        <td>{{ number_format($post->execution_time, 6) }} sec</td>
    </tr>
    @endforeach
</table>

</body>
</html>
