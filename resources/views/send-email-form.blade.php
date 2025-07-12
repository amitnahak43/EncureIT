<html>
    <head>
        <title>Send Mail</title>
    </head>
    <body>
        <h3>Send Test Email</h3>

        @if(session('success'))
            <p style"color: green;">{{ session('success') }}</p>
        @endif
        <form method="POST" action="{{ route('send.email') }}">
            @csrf
            Email : <input type="email" name="email" placeholder="please enter your email ID">
            Message : <textarea name="message" rows="5" required></textarea>
            <button type="submit">Submit</button>
        </form>
    </body>
<html>