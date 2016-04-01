<!DOCTYPE html>
<html>
    <head>
        <title>Runetek Revision Logs</title>

        <link href="https://fonts.googleapis.com/css?family=Lato:100" rel="stylesheet" type="text/css">
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">

        <style>
            html, body {
                height: 100%;
            }

            body {
                margin: 0;
                padding: 0;
                width: 100%;
                display: table;
                font-weight: 100;
                font-family: 'Lato';
            }

            .container {
                text-align: center;
                display: table-cell;
                vertical-align: middle;
            }

            .content {
                text-align: center;
                display: inline-block;
            }

            .title {
                font-size: 48px;
            }

            p {
                font-size: 24px;
            }

            a {
                text-decoration: none;
            }
        </style>
    </head>
    <body>
        <div class="container">
            <div class="content">
                <div class="title">Revision Logs</div>

                <p>
                    <a href="/revisions">
                        View posted logs
                    </a>
                </p>

                <p>
                    @if (Auth::check())
                        Hello, {{ Auth::user()->username }}!
                    @else
                        <a href="/auth/login">Login/Register</a>
                    @endif
                </p>
            </div>
        </div>
    </body>
</html>
