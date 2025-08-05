<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home Page</title>
    <script src="https://unpkg.com/@tailwindcss/browser@4"></script>
</head>

<body class="bg-[#FFFFFF] text-black min-h-screen">

    <div class="container flex w-full">
        <div class="sidebar fixed left-0 top-0 h-full w-64">
            @include('.components.sidebar')
        </div>

        <div class="flex flex-col flex-grow items-center justify-center p-4 ml-64">
            <div class="p-4 rounded-lg w-full mt-14 ml-15">
                @yield('content')
            </div>
        </div>
    </div>
    <script>
        fetch('/api/login', {
                method: 'POST',
                body: JSON.stringify({
                    email,
                    password
                }),
                headers: {
                    'Content-Type': 'application/json'
                }
            })
            .then(response => response.json())
            .then(data => {
                if (data.token) {
                    localStorage.setItem('token', data.token); // Store token
                }
            });
        fetch('/api/protected-endpoint', {
            method: 'GET',
            headers: {
                'Authorization': 'Bearer ' + localStorage.getItem('token')
            }
        });
    </script>
</body>

</html>
