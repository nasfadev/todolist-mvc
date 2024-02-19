<!DOCTYPE html>
<html lang="en" class="h-full">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/style.css">
</head>

<body class="h-full bg-slate-50">
    <div class="h-full px-2 space-y-8 flex flex-col justify-center items-center ">
        <h1 class="text-4xl text-center ">
            Login to <span class="font-bold text-blue-500">ToDoList</span>
        </h1>
        <form method="post" class="bg-white border p-5 w-full md:w-80  shadow-md flex flex-col space-y-5 rounded-md" action="">
            <div class="relative w-full">
                <input placeholder=" " class="duration-100 text-slate-500 focus:outline-none w-full focus:text-slate-500 focus:border-blue-600 focus:ring-0 border peer  h-10 rounded-md  border-slate-300 p-3" name="username" type="text">
                <label class="peer-placeholder-shown:text-slate-500 peer-placeholder-shown:text-base text-sm p-1 peer-focus:-translate-x-1 -translate-x-1 peer-focus:text-sm peer-focus:text-blue-600 text-slate-500 peer-placeholder-shown:top-1/2 peer-placeholder-shown:-translate-y-1/2 peer-focus:-translate-y-1/4 peer-focus:top-[-25%] bg-white ease-out duration-300 absolute top-[-25%] left-3 transform -translate-y-1/4 pointer-events-none">Username</label>
            </div>
            <div class="relative w-full">
                <input placeholder=" " class="duration-100 text-slate-500 focus:outline-none w-full focus:text-slate-500 focus:border-blue-600 focus:ring-0 border peer  h-10 rounded-md  border-slate-300 p-3" name="password" type="password">
                <label class="peer-placeholder-shown:text-slate-500 peer-placeholder-shown:text-base text-sm p-1 peer-focus:-translate-x-1 -translate-x-1 peer-focus:text-sm peer-focus:text-blue-600 text-slate-500 peer-placeholder-shown:top-1/2 peer-placeholder-shown:-translate-y-1/2 peer-focus:-translate-y-1/4 peer-focus:top-[-25%] bg-white ease-out duration-300 absolute top-[-25%] left-3 transform -translate-y-1/4 pointer-events-none">Password</label>
            </div>
            <div class="relative w-full flex items-center space-x-3">
                <input checked type="checkbox" class="duration-100 w-4 h-4 border-slate-600" name="" id="">

                <label class="text-slate-400">Remember me</label>
            </div>
            <div class="relative w-full">
                <input type="submit" value="Login" class="bg-blue-600 text-slate-100 w-full py-2 rounded-md cursor-pointer duration-150 hover:bg-blue-700">
            </div>
            <div class="relative w-full">
                <a href="" class="text-slate-400 hover:text-slate-500 duration-150 underline underline-offset-4">Don't have an account?</a>
            </div>
        </form>
    </div>
</body>

</html>