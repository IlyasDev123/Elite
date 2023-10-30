<!DOCTYPE html>
<html>

<head>
    <title>{{ $data['subject'] }}</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">

    <style>
        body {
            font-family: 'Poppins', Arial, sans-serif;
            background-color: #f7f7f7;
            margin: 0;
            padding: 0;
        }

        .container {
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
            background-color: #ffffff;
            border-radius: 5px;
            box-shadow: 0px 2px 5px rgba(0, 0, 0, 0.1);
        }

        .logo {
            text-align: center;
            margin-bottom: 20px;
        }

        .logo img {
            max-width: 150px;
        }

        .content {
            font-size: 14px;
        }

        .greeting {
            font-size: 24px;
            margin-bottom: 10px;
        }

        .code {
            font-size: 18px;
            font-weight: bold;
        }

        .instructions {
            margin-bottom: 20px;
        }

        .contact {
            font-size: 14px;
            text-align: center;
            margin-top: 20px;
            color: #777777;
        }

        .footer {
            font-size: 12px;
            text-align: center;
            margin-top: 20px;
            color: #777777;
        }
    </style>
</head>

<body>
    <table class="container" cellpadding="0" cellspacing="0" border="0" align="center">
        <tbody style="
    background: #FFFFFF;
    border-radius: 6px;
">
            <tr>
                <td>
                    <table class="logo" cellpadding="0" cellspacing="0" border="0" align="center"
                        style="background-color: #e1e6ef;width: 100%;padding: 38px 0px;border-radius: 6px 6px 0px 0px;">
                        <tbody>
                            <tr>
                                <td>
                                    <img src="http://127.0.0.1:8000/images/logo.png'" alt="Logo">
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </td>
            </tr>
            <tr>
                <td class="content" style="text-align: center;">
                    <p>
                        <span class="code"
                            style="
    font-family: 'Poppins';
    font-style: normal;
    font-weight: 600;
    font-size: 20px;
    line-height: 72px;
    text-align: center;
    letter-spacing: -1px;

    color: #151513;
    display: block;
    margin-top: 30px;
">{{ $data['content'] }}
                            {{ $data['file'] }}

                        </span>
                    </p>

                    <p
                        style="
    font-family: 'Inter';
    font-style: normal;
    font-weight: 400;
    font-size: 14px;
    line-height: 24px;
/* or 171% */
    text-align: center;

/* text/light */
    color: #808191;
    margin: 0px;
">
                        @foreach ($data['files'] as $file)
                            <li>{{ $file->attachment }}</li>
                        @endforeach

                        {{-- <a download="Source" href="{{ Storage::url($data['file']) }}"
                            title="{{ $data['file'] }}">Download</a> --}}

                        This email is automatically sent and doesn’t receive responses.
                    </p>
                    <p
                        style="
    font-family: 'Inter';
    font-style: normal;
    font-weight: 400;
    font-size: 14px;
    line-height: 24px;
/* or 171% */
    text-align: center;

/* text/light */
    color: #808191;
    margin: 0;
">
                        Need help? Contact us at <a href="mailto:contact@EasyTask.com"
                            style="
    color: #DEAC00;
    text-decoration: none;
">contact@elite.com</a>.</p>
                    <p class="footer"
                        style="
    background: #FDF8EA;
    border-radius: 0px 0px 6px 6px;
    padding: 18px 0px;
    margin: 0;
    margin-top: 50px;
">
                        © Copyright elite 2023, All Rights Reserved.</p>
                </td>
            </tr>
        </tbody>
    </table>
</body>

</html>
