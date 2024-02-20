<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/style.css">
    <script src="https://kit.fontawesome.com/7e8c971f5e.js" crossorigin="anonymous"></script>
</head>

<body>
    <header class="fixed w-full top-0 z-50 border-b bg-white/80 backdrop-blur-xl overflow-hidden">
        <nav class="py-4 px-4 sm:px-16 space-x-2 flex justify-between items-center">
            <span class="sm:hidden font-sans font-bold text-xl text-blue-500">ToDoList</span>
            <div class="hidden sm:flex items-center grow">
                <span class="font-sans font-bold text-xl text-blue-500">ToDoList</span>
                <div class=" w-full px-16">
                    <div class="relative w-full">

                        <div class="absolute top-1/2 left-3 -translate-y-1/2 pointer-events-none ">
                            <i class="fa-solid fa-magnifying-glass"></i>
                        </div>
                        <input placeholder="Search.." class="w-full focus:outline-blue-500
                        h-10 rounded-full px-10 bg-slate-100" type="text">
                    </div>
                </div>
            </div>
            <div class=" flex items-center justify-end text-lg  text-slate-500 space-x-10">
                <div class="hidden sm:block group cursor-pointer hover:text-blue-700">
                    <div class="relative h-full w-full *:absolute  *:top-1/2 *:-translate-x-1/2  *:-translate-y-1/2 *:left-1/2">
                        <div class=" bg-slate-100 duration-200 rounded-full p-0 group-hover:p-7 group-active:bg-slate-300"></div>
                        <i class="z-10 fa-solid fa-compass "></i>
                    </div>
                </div>
                <div class="hidden sm:block group cursor-pointer hover:text-blue-700">
                    <div class="relative h-full w-full *:absolute *:top-1/2  *:-translate-x-1/2  *:-translate-y-1/2 *:left-1/2">
                        <div class="-z-10 bg-slate-100 duration-200 rounded-full p-0 group-hover:p-7 group-active:bg-slate-300"></div>
                        <i class="fa-regular fa-user"></i>
                    </div>
                </div>
                <div class="sm:hidden">
                    <i class="fa-solid fa-magnifying-glass"></i>
                </div>
                <img src="img/dog.jpg" width="200" height="200" alt="" class="rounded-full w-8 h-8">
            </div>
        </nav>
    </header>

    <div class="sm:hidden z-50 h-10 border-t overflow-hidden bg-white bottom-0 fixed w-full text-lg text-center *:flex-grow *:basis-0 *:min-w-0 text-slate-500 flex *:py-2">
        <div class="group/b-user hover:text-blue-700">
            <div class="relative h-full w-full *:absolute *:top-1/2 z-0 *:-translate-x-1/2  *:-translate-y-1/2 *:left-1/2">
                <div class=" bg-slate-100 duration-200 rounded-full p-0 group-hover/b-user:p-10 group-active/b-user:bg-slate-300"></div>
                <i class="fa-solid fa-compass"></i>
            </div>
        </div>
        <div class="group/b-user hover:text-blue-700">
            <div class="relative h-full w-full *:absolute *:top-1/2 z-0 *:-translate-x-1/2  *:-translate-y-1/2 *:left-1/2">
                <div class=" bg-slate-100 duration-200 rounded-full p-0 group-hover/b-user:p-10 group-active/b-user:bg-slate-300"></div>
                <i class="fa-regular fa-user"></i>
            </div>
        </div>
    </div>
    <main class="sm:flex flex-wrap sm:divide-none divide-y  sm:*:basis-1/2 lg:*:basis-1/3 *:px-4  *:py-2 sm:*:mt-0 sm:mx-14 sm:mt-24 mt-20">
        <article class="group sm:rounded-lg duration-200 hover:bg-slate-50 flex flex-col space-y-2 cursor-pointer">
            <div class="flex items-center justify-between">
                <img src="img/dog.jpg" width="200" height="200" alt="" class="rounded-full w-10 h-10 hover:brightness-90 duration-150">
                <div class="flex flex-col grow">
                    <div class="flex *:px-2">
                        <h3 class="font-medium grow">Progress of making roblox game..</h3>
                        <div class="sm:group-hover:block group/b-more sm:hidden hover:text-blue-700">
                            <div class="relative h-full w-full *:absolute *:top-1/2 z-0 *:-translate-x-1/2  *:-translate-y-1/2 *:left-1/2">
                                <div class=" bg-slate-200 duration-200 rounded-full p-0 group-hover/b-more:p-4 group-active/b-more:bg-slate-300"></div>
                                <i class="fa-solid fa-ellipsis"></i>
                            </div>
                        </div>
                    </div>
                    <h4 class="px-2 text-sm text-slate-500 "><span class="hover:underline underline-offset-4">@doogykidding</span></4>
                </div>
            </div>
            <div class="text-sm text-center font-medium">12% or 1/23 of progress</div>
            <div class="h-2 relative rounded-lg">
                <div class="h-full w-5/6 bg-sky-500 rounded-md">
                </div>
            </div>
            <img src="img/thum.jpg" width="200" height="200" alt="" class=" rounded-lg w-full h-auto">
            <div class="mb-0 flex justify-around items-center text-slate-600">
                <div class="hover:text-blue-700 flex group/b-like items-center space-x-3">
                    <div class="relative *:absolute *:top-1/2 z-0 *:-translate-x-1/2  *:-translate-y-1/2 *:left-1/2">
                        <div class=" bg-slate-200 duration-200 rounded-full p-0 group-hover/b-like:p-4 group-active/b-like:bg-slate-300"></div>
                        <i class="fa-regular fa-comment-dots"></i>
                    </div>
                    <span class="text-sm z-10">1k</span>
                </div>
                <div class="hover:text-pink-600 flex group/b-like items-center space-x-3">
                    <div class="relative *:absolute *:top-1/2 z-0 *:-translate-x-1/2  *:-translate-y-1/2 *:left-1/2 text-lg">
                        <div class=" bg-slate-200 duration-200 rounded-full p-0 group-hover/b-like:p-4 group-active/b-like:bg-slate-300"></div>
                        <input type="checkbox" class="opacity-0 peer z-10">
                        <div class="peer-checked:hidden">
                            <i class="fa-regular fa-heart"></i>
                            <span class="text-sm z-10">13k</span>
                        </div>
                        <div class="hidden peer-checked:block peer-checked:text-pink-600">
                            <i class="fa-solid fa-heart"></i>
                            <span class="text-sm z-10">13k</span>
                        </div>
                    </div>
                </div>

            </div>
        </article>
    </main>
</body>

</html>