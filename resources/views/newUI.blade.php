<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <link rel="apple-touch-icon" sizes="76x76" href="./assets/img/apple-icon.png" />
        <link rel="icon" type="image/png" href="./assets/img/favicon.png" />
        <title>{{ config('app.name', 'Laravel') }}</title>
        <!--     Fonts and icons     -->
        <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
        @vite(['resources/css/app.css', 'resources/js/app.js'])
        <script>
            // On page load or when changing themes, best to add inline in `head` to avoid FOUC
            if (localStorage.getItem('color-theme') === 'dark' || (!('color-theme' in localStorage) && window.matchMedia('(prefers-color-scheme: dark)').matches)) {
                document.documentElement.classList.add('dark');
            } else {
                document.documentElement.classList.remove('dark')
            }
        </script>
        <!-- Font Awesome Icons -->
        <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
        <!-- Nucleo Icons -->
        <link href="./assets/css/nucleo-icons.css" rel="stylesheet" />
        <link href="./assets/css/nucleo-svg.css" rel="stylesheet" />
        <!-- Popper -->
    {{--    <script src="https://unpkg.com/@popperjs/core@2"></script>--}}
        <!-- Main Styling -->
        <link href="./assets/css/argon-dashboard-tailwind.css?v=1.0.1" rel="stylesheet" />
    </head>
    
    <body class="m-0 font-sans text-base antialiased font-normal dark:bg-slate-900 leading-default bg-gray-50 text-slate-500">
        <div class="absolute w-full bg-blue-500 dark:hidden min-h-75"></div>

        <!-- sidenav  -->
        <aside class="fixed inset-y-0 flex-wrap items-center justify-between block w-full p-0 my-4 overflow-y-auto antialiased transition-transform duration-200 -translate-x-full bg-white border-0 shadow-xl dark:shadow-none dark:bg-slate-850 max-w-64 ease-nav-brand z-990 xl:ml-6 rounded-2xl xl:left-0 xl:translate-x-0" aria-expanded="false">
            <div class="h-19">
                <i class="absolute top-0 right-0 p-4 opacity-50 cursor-pointer fas fa-times dark:text-white text-slate-400 xl:hidden" sidenav-close></i>
                <a class="block px-8 py-6 m-0 text-sm whitespace-nowrap dark:text-white text-slate-700" href="https://demos.creative-tim.com/argon-dashboard-tailwind/pages/dashboard.html" target="_blank">
                    <img src="./assets/img/logo-ct-dark.png" class="inline h-full max-w-full transition-all duration-200 dark:hidden ease-nav-brand max-h-8" alt="main_logo" />
                    <img src="./assets/img/logo-ct.png" class="hidden h-full max-w-full transition-all duration-200 dark:inline ease-nav-brand max-h-8" alt="main_logo" />
                    <span class="ml-1 font-semibold transition-all duration-200 ease-nav-brand">Argon Dashboard 2</span>
                </a>
            </div>

            <hr class="h-px mt-0 bg-transparent bg-gradient-to-r from-transparent via-black/40 to-transparent dark:bg-gradient-to-r dark:from-transparent dark:via-white dark:to-transparent" />

            <div class="items-center block w-auto max-h-screen overflow-auto h-sidenav grow basis-full">
                <ul class="flex flex-col pl-0 mb-0">
                    <li class="mt-0.5 w-full">
                        <a class="py-2.7 bg-blue-500/13 dark:text-white dark:opacity-80 text-sm ease-nav-brand my-0 mx-2 flex items-center whitespace-nowrap rounded-lg px-4 font-semibold text-slate-700 transition-colors" href="./pages/dashboard.html">
                            <div class="mr-2 flex h-8 w-8 items-center justify-center rounded-lg bg-center stroke-0 text-center xl:p-2.5">
                                <i class="relative top-0 text-sm leading-normal text-blue-500 ni ni-tv-2"></i>
                            </div>
                            <span class="ml-1 duration-300 opacity-100 pointer-events-none ease">Dashboard</span>
                        </a>
                    </li>

                    <li class="mt-0.5 w-full">
                        <a class=" dark:text-white dark:opacity-80 py-2.7 text-sm ease-nav-brand my-0 mx-2 flex items-center whitespace-nowrap px-4 transition-colors" href="./pages/tables.html">
                            <div class="mr-2 flex h-8 w-8 items-center justify-center rounded-lg bg-center stroke-0 text-center xl:p-2.5">
                                <i class="relative top-0 text-sm leading-normal text-orange-500 ni ni-calendar-grid-58"></i>
                            </div>
                            <span class="ml-1 duration-300 opacity-100 pointer-events-none ease">Tables</span>
                        </a>
                    </li>

                    <li class="mt-0.5 w-full">
                        <a class=" dark:text-white dark:opacity-80 py-2.7 text-sm ease-nav-brand my-0 mx-2 flex items-center whitespace-nowrap px-4 transition-colors" href="./pages/billing.html">
                            <div class="mr-2 flex h-8 w-8 items-center justify-center rounded-lg bg-center fill-current stroke-0 text-center xl:p-2.5">
                                <i class="relative top-0 text-sm leading-normal text-emerald-500 ni ni-credit-card"></i>
                            </div>
                            <span class="ml-1 duration-300 opacity-100 pointer-events-none ease">Billing</span>
                        </a>
                    </li>

                    <li class="mt-0.5 w-full">
                        <a class=" dark:text-white dark:opacity-80 py-2.7 text-sm ease-nav-brand my-0 mx-2 flex items-center whitespace-nowrap px-4 transition-colors" href="./pages/virtual-reality.html">
                            <div class="mr-2 flex h-8 w-8 items-center justify-center rounded-lg bg-center stroke-0 text-center xl:p-2.5">
                                <i class="relative top-0 text-sm leading-normal text-cyan-500 ni ni-app"></i>
                            </div>
                            <span class="ml-1 duration-300 opacity-100 pointer-events-none ease">Virtual Reality</span>
                        </a>
                    </li>

                    <li class="mt-0.5 w-full">
                        <a class=" dark:text-white dark:opacity-80 py-2.7 text-sm ease-nav-brand my-0 mx-2 flex items-center whitespace-nowrap px-4 transition-colors" href="./pages/rtl.html">
                            <div class="mr-2 flex h-8 w-8 items-center justify-center rounded-lg bg-center stroke-0 text-center xl:p-2.5">
                                <i class="relative top-0 text-sm leading-normal text-red-600 ni ni-world-2"></i>
                            </div>
                            <span class="ml-1 duration-300 opacity-100 pointer-events-none ease">RTL</span>
                        </a>
                    </li>

                    <li class="w-full mt-4">
                        <h6 class="pl-6 ml-2 text-xs font-bold leading-tight uppercase dark:text-white opacity-60">Account pages</h6>
                    </li>

                    <li class="mt-0.5 w-full">
                        <a class=" dark:text-white dark:opacity-80 py-2.7 text-sm ease-nav-brand my-0 mx-2 flex items-center whitespace-nowrap px-4 transition-colors" href="./pages/profile.html">
                            <div class="mr-2 flex h-8 w-8 items-center justify-center rounded-lg bg-center stroke-0 text-center xl:p-2.5">
                                <i class="relative top-0 text-sm leading-normal text-slate-700 ni ni-single-02"></i>
                            </div>
                            <span class="ml-1 duration-300 opacity-100 pointer-events-none ease">Profile</span>
                        </a>
                    </li>

                    <li class="mt-0.5 w-full">
                        <a class=" dark:text-white dark:opacity-80 py-2.7 text-sm ease-nav-brand my-0 mx-2 flex items-center whitespace-nowrap px-4 transition-colors" href="./pages/sign-in.html">
                            <div class="mr-2 flex h-8 w-8 items-center justify-center rounded-lg bg-center stroke-0 text-center xl:p-2.5">
                                <i class="relative top-0 text-sm leading-normal text-orange-500 ni ni-single-copy-04"></i>
                            </div>
                            <span class="ml-1 duration-300 opacity-100 pointer-events-none ease">Sign In</span>
                        </a>
                    </li>

                    <li class="mt-0.5 w-full">
                        <a class=" dark:text-white dark:opacity-80 py-2.7 text-sm ease-nav-brand my-0 mx-2 flex items-center whitespace-nowrap px-4 transition-colors" href="./pages/sign-up.html">
                            <div class="mr-2 flex h-8 w-8 items-center justify-center rounded-lg bg-center stroke-0 text-center xl:p-2.5">
                                <i class="relative top-0 text-sm leading-normal text-cyan-500 ni ni-collection"></i>
                            </div>
                            <span class="ml-1 duration-300 opacity-100 pointer-events-none ease">Sign Up</span>
                        </a>
                    </li>
                </ul>
            </div>

            <div class="mx-4">
                <!-- load phantom colors for card after: -->
                <p class="invisible hidden text-gray-800 text-red-500 text-red-600 text-blue-500 bg-gray-500/30 bg-cyan-500/30 bg-emerald-500/30 bg-orange-500/30 bg-red-500/30 after:bg-gradient-to-tl after:from-zinc-800 after:to-zinc-700 dark:bg-gradient-to-tl dark:from-slate-750 dark:to-gray-850 after:from-blue-700 after:to-cyan-500 after:from-orange-500 after:to-yellow-500 after:from-green-600 after:to-lime-400 after:from-red-600 after:to-orange-600 after:from-slate-600 after:to-slate-300 text-emerald-500 text-cyan-500 text-slate-400"></p>
                <div class="relative flex flex-col min-w-0 break-words bg-transparent border-0 shadow-none rounded-2xl bg-clip-border" sidenav-card>
                    <img class="w-1/2 mx-auto" src="./assets/img/illustrations/icon-documentation.svg" alt="sidebar illustrations" />
                    <div class="flex-auto w-full p-4 pt-0 text-center">
                        <div class="transition-all duration-200 ease-nav-brand">
                            <h6 class="mb-0 dark:text-white text-slate-700">Need help?</h6>
                            <p class="mb-0 text-xs font-semibold leading-tight dark:text-white dark:opacity-60">Please check our docs</p>
                        </div>
                    </div>
                </div>
                <a href="https://www.creative-tim.com/learning-lab/tailwind/html/quick-start/argon-dashboard/" target="_blank" class="inline-block w-full px-8 py-2 mb-4 text-xs font-bold leading-normal text-center text-white capitalize transition-all ease-in rounded-lg shadow-md bg-slate-700 bg-150 hover:shadow-xs hover:-translate-y-px">Documentation</a>
                <!-- pro btn  -->
                <a class="inline-block w-full px-8 py-2 text-xs font-bold leading-normal text-center text-white align-middle transition-all ease-in bg-blue-500 border-0 rounded-lg shadow-md select-none bg-150 bg-x-25 hover:shadow-xs hover:-translate-y-px" href="https://www.creative-tim.com/product/argon-dashboard-pro-tailwind?ref=sidebarfree" target="_blank">Upgrade to pro</a>
            </div>
        </aside>
        <!-- end sidenav -->

        <main class="relative h-full max-h-screen transition-all duration-200 ease-in-out xl:ml-68 rounded-xl">

            <!-- Navbar -->
            <nav class="flex flex-wrap items-center justify-between px-0 py-2 mx-6 transition-all ease-in duration-250 rounded-2xl lg:flex-nowrap lg:justify-start sticky top-[1%] backdrop-saturate-200 backdrop-blur-2xl dark:bg-slate-850/80 dark:shadow-dark-blur bg-[hsla(0,0%,100%,0.8)] shadow-blur z-110" navbar-main="" navbar-scroll="true">
                <div class="flex items-center justify-between w-full px-4 py-1 mx-auto flex-wrap-inherit">
                    <nav>
                        <!-- breadcrumb -->
                        <ol class="flex flex-wrap pt-1 mr-12 bg-transparent rounded-lg sm:mr-16">
                            <li class="text-sm leading-normal">
                                <a class="text-gray-500 dark:text-white dark:opacity-50" href="javascript:;">Pages</a>
                            </li>
                            <li class="text-sm pl-2 capitalize leading-normal text-gray-500 dark:text-white before:float-left before:pr-2 before:text-gray-500 before:content-['/']" aria-current="page">Dashboard</li>
                        </ol>
                        <h6 class="mb-0 font-bold text-gray-500 dark:text-white capitalize">Dashboard</h6>
                    </nav>

                    <div class="flex items-center mt-2 grow sm:mt-0 sm:mr-6 md:mr-0 lg:flex lg:basis-auto">
                        <div class="flex items-center md:ml-auto md:pr-4"></div>
                        <ul class="flex flex-row justify-end pl-0 mb-0 list-none md-max:w-full">
                            <li class="flex items-center">
                              <x-toogle/>
                            </li>
                            <li class="flex items-center">

                            </li>
        {{--                    sidebar responsif--}}
                            <li class="flex items-center pl-4 xl:hidden">
                                <a href="javascript:;" class="block p-0 text-sm dark:text-white transition-all ease-nav-brand" sidenav-trigger>
                                    <div class="w-4.5 overflow-hidden">
                                        <i class="ease mb-0.75 relative block h-0.5 rounded-sm bg-gray-500 dark:bg-white transition-all"></i>
                                        <i class="ease mb-0.75 relative block h-0.5 rounded-sm bg-gray-500 dark:bg-white transition-all"></i>
                                        <i class="ease relative block h-0.5 rounded-sm bg-gray-500 dark:bg-white transition-all"></i>
                                    </div>
                                </a>
                            </li>
        {{--                    end sidebar responsif--}}
                            <li class="relative flex items-center pr-2">
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
            <!-- end Navbar -->

            <!-- conten -->
            <div class="w-full px-6 py-6 mx-auto min-h-screen">
                <!-- conten -->
            </div>

            <footer class="pt-4 mb-8">
                    <div class="w-full px-6 mx-auto">
                        <div class="flex flex-wrap items-center -mx-3 lg:justify-between">
                            <div class="w-full max-w-full px-3 mt-0 mb-6 shrink-0 lg:mb-0 lg:w-1/2 lg:flex-none">
                                <div class="text-sm leading-normal text-center text-slate-500 lg:text-left">
                                    ©
                                    <script>
                                        document.write(new Date().getFullYear() + ",");
                                    </script>
                                    made with <i class="fa fa-heart"></i> by
                                    <a href="https://www.creative-tim.com" class="font-semibold text-slate-700 dark:text-white" target="_blank">Creative Tim</a>
                                    for a better web.
                                </div>
                            </div>
                            <div class="w-full max-w-full px-3 mt-0 shrink-0 lg:w-1/2 lg:flex-none">
                                <ul class="flex flex-wrap justify-center pl-0 mb-0 list-none lg:justify-end">
                                    <li class="nav-item">
                                        <a href="https://www.creative-tim.com" class="block px-4 pt-0 pb-1 text-sm font-normal transition-colors ease-in-out text-slate-500" target="_blank">Creative Tim</a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="https://www.creative-tim.com/presentation" class="block px-4 pt-0 pb-1 text-sm font-normal transition-colors ease-in-out text-slate-500" target="_blank">About Us</a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="https://creative-tim.com/blog" class="block px-4 pt-0 pb-1 text-sm font-normal transition-colors ease-in-out text-slate-500" target="_blank">Blog</a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="https://www.creative-tim.com/license" class="block px-4 pt-0 pb-1 pr-0 text-sm font-normal transition-colors ease-in-out text-slate-500" target="_blank">License</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </footer>
            <!-- end conten -->
        </main>
    </body>
    <!-- plugin for charts  -->
    <script src="./assets/js/plugins/chartjs.min.js" async></script>
    <!-- plugin for scrollbar  -->
    <script src="./assets/js/plugins/perfect-scrollbar.min.js" async></script>
    <!-- main script file  -->
    <script src="./assets/js/argon-dashboard-tailwind.js?v=1.0.1" async></script>
</html>
