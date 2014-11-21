<html>
    <head>


    </head>
    <body>

        <h2>Register form</h2>

        <form action="/api/account/registration" method="POST" name="registration-data" enctype="multipart/form-data">

            <input type="text" name="email" placeholder="Email..." id="email"/>

            <input type="password" name="password" placeholder="Password..." id="password"/>
            
            <input type="file" name="avatar" id="avatar"/>

            <input type="submit" id="sbn-btn"/>

        </form>


    </body>
</html>