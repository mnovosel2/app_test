<html>
    <head></head>

    <body>

        <ul>

            @foreach($users as $user)

                <li>

                <p>
                {{$user->email}}
                </p>




                </li>

            @endforeach

        </ul>

    </body>
</html>