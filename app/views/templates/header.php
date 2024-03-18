<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ToDoList - Discover</title>
    <link rel="stylesheet" href="css/style.css">
    <script src="https://kit.fontawesome.com/7e8c971f5e.js" crossorigin="anonymous"></script>
</head>

<body>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <script>
        jQuery || document.write('<script src="js/jquery-3.7.1.min.js"><\/script>')
    </script>
    <script src="js/core.js"></script>
    <header id="nav" class="fixed w-full top-0 z-20 border-b bg-white/80 backdrop-blur-xl">

        <nav class="relative h-16 ">
            <div id="search" class="hidden text-lg w-full px-5 items-center space-x-6 absolute z-30 top-1/2 -translate-x-1/2  -translate-y-1/2 left-1/2">
                <div id="search-cls-btn" class="cursor-pointer group hover:text-blue-700">
                    <div class="pointer-events-none relative h-full w-full ">
                        <div class=" bg-slate-100 duration-200 rounded-full p-0 group-hover:p-5 group-active:bg-slate-200 absolute  top-1/2 -translate-x-1/2  -translate-y-1/2 left-1/2">
                        </div>
                        <i class="fa-solid fa-arrow-left relative"></i>
                    </div>
                </div>
                <div class="relative w-full">

                    <div class="absolute top-1/2 left-3 -translate-y-1/2 pointer-events-none ">
                        <i class="fa-solid fa-magnifying-glass"></i>
                    </div>
                    <input id="search-input" placeholder="Search.." class="w-full focus:outline-none
                        h-10 rounded-full px-10 bg-slate-100" type="text">
                </div>
            </div>
            <div id="menu" class="h-full py-4 px-4 sm:px-16 space-x-2 flex justify-between items-center">
                <span class="sm:hidden font-sans font-bold text-xl text-blue-500">ToDoList</span>
                <div class="hidden sm:flex items-center grow">
                    <span class="font-sans font-bold text-xl text-blue-500">ToDoList</span>
                    <div class=" w-full mx-16 relative">
                        <div class="relative w-full z-10">

                            <div class="absolute top-1/2 left-3 -translate-y-1/2 pointer-events-none ">
                                <i class="fa-solid fa-magnifying-glass"></i>
                            </div>
                            <input id="search-lg" placeholder="Search.." class="w-full focus:outline-none
                        h-10 rounded-full px-10 bg-slate-100" type="text">
                            <div id="search-lg-result" class="hidden max-h-64 overflow-y-auto *:px-4 *:py-4 bg-white drop-shadow-lg absolute w-full rounded-xl *:duration-200 *:cursor-pointer">
                                <div class="first:*:pr-2 hover:bg-slate-100 active:bg-slate-200">
                                    <span class="text-xl">
                                        <i class="fa-solid fa-magnifying-glass"></i>
                                    </span>
                                    <span class="">Make money from</span>
                                </div>
                                <div class="first:*:pr-2 hover:bg-slate-100 active:bg-slate-200">
                                    <span class="text-xl">
                                        <i class="fa-solid fa-clock-rotate-left"></i>
                                    </span>
                                    <span class="">Make money from</span>
                                    <span class="text-xl float-right text-slate-400 hover:text-blue-700 group pointer-events-auto">
                                        <div class="pointer-events-none relative h-full w-full ">
                                            <div class=" bg-slate-200 duration-200 rounded-full p-0 group-hover:p-4 group-active:bg-slate-300 absolute  top-1/2 -translate-x-1/2  -translate-y-1/2 left-1/2">
                                            </div>
                                            <span class="relative">
                                                <i class="fa-solid fa-xmark"></i>
                                            </span>
                                        </div>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class=" flex items-center justify-end text-lg  text-slate-500 space-x-10">
                    <div id="explore-btn" class="hidden duration-200 px-4 py-1 rounded-full sm:flex hover:bg-slate-100 active:bg-slate-200 first:*:pr-2 items-center group cursor-pointer hover:text-blue-700">
                        <div class="pointer-events-none relative h-full w-full text-xl">
                            <i class=" fa-solid fa-compass "></i>
                        </div>
                        <div class=" text-base pointer-events-none">Discover</div>
                    </div>
                    <div id="user-btn" class="hidden duration-200 px-4 py-1 rounded-full sm:flex hover:bg-slate-100 active:bg-slate-200 first:*:pr-2 items-center group cursor-pointer hover:text-blue-700">
                        <div class="pointer-events-none relative h-full w-full text-xl">
                            <i class="fa-regular fa-user"></i>
                        </div>
                        <div class="text-base pointer-events-none">Profile</div>
                    </div>
                    <div class="sm:hidden group cursor-pointer hover:text-blue-700">
                        <div class="relative h-full w-full *:absolute *:top-1/2  *:-translate-x-1/2  *:-translate-y-1/2 *:left-1/2">
                            <div class="-z-10 bg-slate-100 duration-200 rounded-full p-0 group-hover:p-5 group-active:bg-slate-200">
                            </div>
                            <i id="search-btn" class="fa-solid fa-magnifying-glass"></i>
                        </div>
                    </div>
                    <img src="img/dog.jpg" width="200" height="200" alt="" class="rounded-full w-8 h-8 hover:brightness-90 duration-150 cursor-pointer">
                </div>
            </div>
        </nav>
    </header>
    <div id="floating-menu" class="size-full absolute top-0 z-50 pointer-events-none">

    </div>
    <div id="menu-bottom" class="sm:hidden *:cursor-pointer z-40 h-10 border-t overflow-hidden bg-white bottom-0 fixed w-full text-lg text-center *:flex-grow *:basis-0 *:min-w-0 text-slate-500 flex *:py-2">
        <div id="explore-btn" class="group/b-user hover:text-blue-700">
            <div class=" pointer-events-none relative h-full w-full *:absolute *:top-1/2 z-0 *:-translate-x-1/2  *:-translate-y-1/2 *:left-1/2">
                <div class=" bg-slate-100 duration-200 rounded-full p-0 group-hover/b-user:p-10 group-active/b-user:bg-slate-200">
                </div>
                <i class="fa-solid fa-compass"></i>
            </div>
        </div>
        <div id="user-btn" class="group/b-user hover:text-blue-700">
            <div class="pointer-events-none relative h-full w-full *:absolute *:top-1/2 z-0 *:-translate-x-1/2  *:-translate-y-1/2 *:left-1/2">
                <div class=" bg-slate-100 duration-200 rounded-full p-0 group-hover/b-user:p-10 group-active/b-user:bg-slate-200">
                </div>
                <i class="fa-regular fa-user"></i>
            </div>
        </div>
    </div>
    <div id="more-menu" class="hidden fixed z-50 bg-black/50 bottom-0 size-full">
        <div class="*:cursor-pointer bg-white rounded-t-3xl pt-10 *:px-6 *:py-2 text-xl absolute w-full">
            <div class="hover:bg-slate-100 duration-200 active:bg-slate-200 first:*:pr-2">
                <span><i class="fa-solid fa-font-awesome"></i></span> <span class="text-lg">Report</span>
            </div>
            <div class="hover:bg-slate-100 duration-200 active:bg-slate-200 first:*:pr-2">
                <span><i class="fa-solid fa-ban"></i></span> <span class="text-lg">Block</span>
            </div>
        </div>
    </div>
    <div id="search-result" class="hidden mt-16 *:px-4 *:py-2 *:duration-200 *:cursor-pointer">
        <div class="first:*:pr-2 hover:bg-slate-100 active:bg-slate-200">
            <span class="text-xl">
                <i class="fa-solid fa-magnifying-glass"></i>
            </span>
            <span class="">Make money from</span>
        </div>
        <div class="first:*:pr-2 hover:bg-slate-100 active:bg-slate-200">
            <span class="text-xl">
                <i class="fa-solid fa-magnifying-glass"></i>
            </span>
            <span class="">Make money from</span>
        </div>
        <div class="first:*:pr-2 hover:bg-slate-100 active:bg-slate-200">
            <span class="text-xl">
                <i class="fa-solid fa-magnifying-glass"></i>
            </span>
            <span class="">Make money from</span>
        </div>
        <div class="first:*:pr-2 hover:bg-slate-100 active:bg-slate-200">
            <span class="text-xl">
                <i class="fa-solid fa-clock-rotate-left"></i>
            </span>
            <span class="">Make money from</span>
            <span class="text-xl float-right text-slate-400 hover:text-blue-700 group pointer-events-auto">
                <div class="pointer-events-none relative h-full w-full ">
                    <div class=" bg-slate-200 duration-200 rounded-full p-0 group-hover:p-4 group-active:bg-slate-300 absolute  top-1/2 -translate-x-1/2  -translate-y-1/2 left-1/2">
                    </div>
                    <span class="relative">
                        <i class="fa-solid fa-xmark"></i>
                    </span>
                </div>
            </span>
        </div>
    </div>