<main id="main-content">
    <div class="px-4 sm:mx-14 flex sm:mt-24 mt-24 items-center justify-between">
        <h1 class="text-xl font-bold">Latests</h1>
        <div class="relative ">
            <div id="filter" class="flex justify-around *:pointer-events-none hover:bg-slate-100 active:bg-slate-200 duration-200 bg-white w-32 px-2 py-2 rounded-r-xl rounded-l-xl border cursor-pointer">
                <div>Latests</div>
                <div><i class="fa-solid fa-chevron-down"></i></div>
            </div>
            <div id="filter-options" class="hidden overflow-hidden *:duration-200 absolute drop-shadow-lg *:px-4 *:py-1 first:*:pt-2 last:*:pb-2 rounded-lg  z-20 *:block active:*:bg-slate-200 hover:*:bg-slate-100 bg-white w-full left-0 -translate-x-0 top-0 translate-y-12">
                <a href="\discover\latests">
                    Latests
                </a>
                <a href="\discover\populars">
                    Populars
                </a>
                <a href="\discover\suggests">
                    Suggests
                </a>
            </div>
        </div>
        <div class="hidden hover:*:bg-slate-600 *:duration-200  *:bg-slate-500 drop-shadow-lg *:cursor-pointer *:py-1 text-white *:px-4 first:*:rounded-l-full last:*:rounded-r-full">
            <a href="discover\latests">
                Latests
            </a>
            <a href="discover\populars">
                Populars
            </a>
            <a href="discover\suggests">
                Suggests
            </a>
        </div>
    </div>
    <div class="border-t border-slate-100 mt-8 sm:mx-14 mx-4">
    </div>
    <div class="sm:flex flex-wrap sm:divide-none divide-y  sm:*:basis-1/2 lg:*:basis-1/3 *:px-4  *:py-2 sm:mx-14 mt-8">
        <?php for ($i = 0; $i < count($data); $i++) :
            $user_data = $this->model('User')->getOne($data[$i]["user_id"]);
            $datas = $data[$i];
        ?>

            <article class="group sm:rounded-lg duration-200 hover:bg-slate-50 flex flex-col space-y-2 cursor-pointer">
                <div class="flex items-center justify-between">
                    <img src="img/<?php echo $user_data["profile_pic"] ?>" width="200" height="200" alt="" class="rounded-full w-10 h-10 hover:brightness-90 duration-150">
                    <div class="flex flex-col grow">
                        <div class="flex *:px-2">
                            <h3 class="font-medium grow"><?php echo $datas["title"] ?></h3>
                            <div id="card-more-btn" class=" group/b-more  hover:text-blue-700">
                                <div class="relative pointer-events-none h-full w-full *:absolute *:top-1/2 z-0 *:-translate-x-1/2  *:-translate-y-1/2 *:left-1/2">
                                    <div class=" bg-slate-200 duration-200 rounded-full p-0 group-hover/b-more:p-4 group-active/b-more:bg-slate-300">
                                    </div>
                                    <i class="fa-solid fa-ellipsis"></i>
                                </div>
                            </div>
                        </div>
                        <a href="<?php echo $user_data["user"] ?>" class="block">
                            <h4 class="px-2 text-sm text-slate-500 "><span class="hover:underline underline-offset-4">@<?php echo $user_data["user"] ?></span></4>
                        </a>
                    </div>
                </div>
                <?php
                $child_completed_count = $datas["child_completed_count"];
                $child_count = $datas["child_count"];
                $percentage = number_format($child_completed_count / $child_count * 100, 1);
                ?>
                <div class="text-sm text-center font-medium"><?php echo $percentage . "% or " . $datas["child_completed_count"] . "/" . $datas["child_count"] ?> of progress</div>
                <div class="h-2 relative rounded-lg">
                    <div style="width: <?php echo $percentage ?>%;" class="h-full bg-sky-500 rounded-md">
                    </div>
                </div>
                <img src="img/thum.jpg" width="200" height="200" alt="" class=" rounded-lg w-full h-auto">
                <div class="mb-0 flex justify-around items-center text-slate-600 h-7 *:h-full *:w-14 *:justify-center">
                    <div class="hover:text-blue-700 flex group/b-like items-center space-x-3">
                        <div class="relative text-lg *:absolute *:top-1/2 z-0 *:-translate-x-1/2  *:-translate-y-1/2 *:left-1/2">
                            <div class=" bg-slate-200 duration-200 rounded-full p-0 group-hover/b-like:p-4 group-active/b-like:bg-slate-300">
                            </div>
                            <i class="fa-regular fa-comment-dots"></i>
                        </div>
                        <span class="text-sm z-10"><?php echo $datas["comment_count"] ?></span>
                    </div>
                    <div data-id="<?php echo $datas["id"] ?>" id="like-btn" class="select-none hover:text-pink-600 cursor-pointer flex group/b-like items-center space-x-3">
                        <div class=" relative pointer-events-none *:absolute *:top-1/2 z-0 *:-translate-x-1/2  *:-translate-y-1/2 *:left-1/2 text-lg">
                            <div class=" bg-slate-200 duration-200 rounded-full p-0 group-hover/b-like:p-4 group-active/b-like:bg-slate-300">
                            </div>
                            <i class=" fa-regular fa-heart"></i>
                        </div>

                        <span class="text-sm z-10 pointer-events-none"><?php echo $datas["like_count"] ?></span>
                    </div>

                </div>
            </article>
        <?php endfor ?>
    </div>

</main>