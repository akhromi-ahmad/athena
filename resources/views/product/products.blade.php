<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Products</title>
</head>

<body>
    <h1 class="text-3xl font-bold underline">Hello world!</h1>
    <div class="flex justify-center">
        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Nesciunt officiis odit amet voluptates consequatur,
            repellendus, molestias nemo deleniti non quisquam at accusamus. Quisquam veritatis nam numquam doloremque
            odit expedita? Quos?</p>
    </div>
    <div class="flex justify-center">
        <form action="{{ route('user.logout') }}" method="POST">
            @csrf
            <button type="submit" class="text-red-600 underline cursor-pointer hover:text-red-400">
                Logout
            </button>
        </form>
    </div>
</body>

</html>
