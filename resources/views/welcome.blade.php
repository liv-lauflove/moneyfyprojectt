<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home Page</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body>

    <!-- NAVBAR -->
    <nav>
        <nav class="relative flex items-center justify-between sm:h-16 px-10 bg-[#0b2250] text-white border-b border-white/10">
        <div class="flex items-center flex-1 md:absolute md:inset-y-0 md:left-0 md:ml-24">
            <div class="flex items-center justify-between w-full md:w-auto">
                <a href="" aria-label="Home">
                    <img src="https://www.svgrepo.com/show/491978/gas-costs.svg" height="40" width="40" />
                </a>
            <div class="-mr-2 flex items-center md:hidden">
                <button type="button" id="main-menu" aria-label="Main menu" aria-haspopup="true" class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 focus:text-gray-500 transition duration-150 ease-in-out">
                    <svg stroke="currentColor" fill="none" viewBox="0 0 24 24" class="h-6 w-6"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path></svg>
                </button>
            </div>
        </div>
        </div>
        <div class="hidden md:flex md:space-x-10 md:ml-32">
            <a href="#Features"
                class="font-medium text-sm text-white hover:text-blue-200 transition duration-150 ease-in-out">Features</a>
            <a href="#About"
                class="font-medium text-sm text-white hover:text-blue-200 transition duration-150 ease-in-out">About</a>
            <a href="#Testimonials"
                class="font-medium text-sm text-white hover:text-blue-200 transition duration-150 ease-in-out">Testimonials</a>
        </div>
        <div class="hidden md:absolute md:flex md:items-center md:justify-end md:inset-y-0 md:right-24">
            <span class="inline-flex">
                <a href="/login" class="inline-flex items-center px-4 py-1.5 text-sm leading-6 font-medium text-white border border-white/40 rounded-md hover:bg-white/10 transition duration-150 ease-in-out">
                Log In
                </a>
            </span>
            <span class="inline-flex rounded-md shadow ml-2">
                <a href="/signup" class="inline-flex items-center px-4 py-1.5 text-sm leading-6 font-medium rounded-md text-white bg-[#2563eb] hover:bg-[#1d4ed8] transition duration-150 ease-in-out">
                Get started
                </a>
            </span>
        </div>
        </nav>
    </nav>

    <!-- HERO SECTION -->
    <section class="px-10 md:px-24 py-20 bg-[#0b2250] text-white">
        <div class="max-w-7xl mx-auto flex flex-col md:flex-row items-center justify-between space-y-10 md:space-y-0">

        <!-- Text Content -->
        <div class="md:w-1/2">
            <h1 class="text-5xl md:text-7xl font-semibold leading-snug mb-8 max-w-xl">
                Take control of <br />
                your money <br />
                today
            </h1>
            <p class="text-base md:text-lg text-gray-300 mb-8 max-w-xl">
            Track every income and expense. Monefy makes it simple to <br />
            see where your money goes and build better financial habits. <br />
            </p>
            <a href="#" class="bg-[#2563eb] hover:bg-[#1d4ed8] text-white text-sm font-medium px-5 py-2 rounded-md transition duration-200">
            Get Started 
            </a>
        </div>

        <!-- Hero Image -->
        <div class="md:w-1/2">
            <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSzJOBc888horStIw5v_cpA6OOGG39NMeDgEg&s" alt="Hero Image" class="rounded-lg shadow-lg w-full" />
        </div>
        </div>
    </section>

    <!-- SECTION (LAYOUT) -->
    <section class="py-20 px-4 bg-[#f5ebdc]">
        <div class="container mx-auto max-w-7xl">
        <!-- Section Header -->
        <div class="text-center max-w-3xl mx-auto mb-16">
            <h2 class="text-4xl md:text-5xl font-bold mb-4 text-gray-900">
            All the tools you need to track and understand your money
            </h2>
            <p class="text-black text-sm md:text-base">
            From recording income to analyzing expenses, everything is designed to give you financial clarity.
            </p>
        </div>
        
        <!-- 3 Cards Grid -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-10">
            <!-- Card 1 -->
            <div class="group">
            <div class="relative overflow-hidden rounded-xl mb-4">
                <img
                src="GAMBAR-1.jpg"
                alt="Record your income and expenses"
                class="w-full h-48 object-cover object-center rounded-xl"
                />
            </div>
            <div class="text-center">
                <h3 class="text-2xl md:text-3xl font-semibold text-gray-900">
                Record your income<br />
                    and expenses
                </h3>
                <p class="text-black mt-2 text-sm">
                Log every transaction in one place to keep your <br /> finances organized.
                </p>
            </div>
            </div>

            <!-- Card 2 -->
            <div class="group">
            <div class="relative overflow-hidden rounded-xl mb-4">
                <img
                src="GAMBAR-2.jpg"
                alt="Monitor where money goes"
                class="w-full h-48 object-cover object-center rounded-xl"
                />
            </div>
            <div class="text-center">
                <h3 class="text-2xl md:text-3xl font-semibold text-gray-900">
                Monitor where<br />
                    money goes
                </h3>
                <p class="text-black mt-2 text-sm">
                Review your transaction history to understand <br /> your spending patterns.
                </p>
            </div>
            </div>

            <!-- Card 3 -->
            <div class="group">
            <div class="relative overflow-hidden rounded-xl mb-4">
                <img
                src="GAMBAR-3.jpg"
                alt="Visualize your financial progress"
                class="w-full h-48 object-cover object-center rounded-xl"
                />
            </div>
            <div class="text-center">
                <h3 class="text-2xl md:text-3xl font-semibold text-gray-900">
                Monitor where<br />
                money goes
                </h3>
                <p class="text-black mt-2 text-sm">
                See clear charts and summaries to make smarter <br /> financial decisions.
                </p>
            </div>
            </div>
        </div>
        </div>
    </section>

    <!-- STATS SECTION -->
    <div class="px-10 md:px-24 py-20 bg-[#013374]">
        <div class="max-w-7xl mx-auto">
        <div class="flex flex-col md:flex-row md:items-start md:justify-between">
            <h2 class="mt-8 text-3xl md:text-4xl font-semibold text-white md:w-1/2 text-left">
                Numbers that speak<br />for themselves
            </h2>
            <p class="mt-1 md:mt-0 text-[14px] md:text-[16px] leading-snug text-white/80 md:w-1/2 text-left">
                Thousands of users trust Monefy to manage their money. See <br/> 
                what our community has accomplished together.
            </p>
        </div>

        <dl class="mt-14 grid grid-cols-1 md:grid-cols-3 md:divide-x md:divide-white/40 divide-solid">
            <div class="flex flex-col items-start px-6 py-4 border-l border-white/40">
                <dd class="text-6xl font-extrabold text-white">50K+</dd>
                <dt class="mt-3 text-sm text-white/80">Active users</dt>
            </div>

            <div class="flex flex-col items-start px-6 py-4">
                <dd class="text-6xl font-extrabold text-white">$2B</dd>
                <dt class="mt-3 text-sm text-white/80">Tracked annually</dt>
            </div>
            
            <div class="flex flex-col items-start px-6 py-4">
                <dd class="text-6xl font-extrabold text-white">25%</dd>
                <dt class="mt-3 text-sm text-white/80">Average savings rate</dt>
            </div>
        </dl>
        </div>
    </div>


    <!-- Testimonials section -->
    <section class="bg-white py-16 px-8">
        <div class="max-w-6xl mx-auto">
            <h2 class="mb-2 text-4xl sm:text-5xl font-semibold text-gray-900 text-left">Real stories</h2>
            <p class="text-sm text-black mb-12 text-left"> What users are saying </p>

            <div class="grid gap-16 md:grid-cols-2">

                <!-- JOHN DOE -->
                <div class="p-0 text-left">
                    <div class="flex items-center justify-start space-x-1 mb-4 text-black">
                        <svg class="w-4 h-4 fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                        fill="currentColor" stroke="currentColor">
                        <path
                            d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z">
                        </path>
                        </svg>

                        <svg class="w-4 h-4 fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                        fill="currentColor" stroke="currentColor">
                        <path
                            d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z">
                        </path>
                        </svg>

                        <svg class="w-4 h-4 fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                        fill="currentColor" stroke="currentColor">
                        <path
                            d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z">
                        </path>
                        </svg>
                        
                        <svg class="w-4 h-4 fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                        fill="currentColor" stroke="currentColor">
                        <path
                            d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z">
                        </path>
                        </svg>

                        <svg class="w-4 h-4 fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                        fill="currentColor" stroke="currentColor">
                        <path
                            d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z">
                        </path>
                        </svg>
                    </div>

                    <p class="text-[15px] leading-relaxed text-black mb-6">
                        "I stopped guessing about my money and started knowing. Finance Tracker showed me exactly where every dollar was going,
                        and I cut my spending by a third without feeling deprived."
                    </p>

                
                    <div class="flex items-center gap-3">
                        <img src="https://i.pravatar.cc/48?img=12"
                            alt="John Doe avatar"
                            class="w-10 h-10 rounded-full">
                        <div>
                        <p class="text-sm font-semibold text-black">John Doe</p>
                        <p class="text-xs text-gray-black">Freelance designer</p>
                        </div>
                    </div>
                </div>
                

                <!-- JANE SMITH -->
                <div class="p-0 text-left">
                <!-- Stars on top, black (5 bintang) -->
                    <div class="flex items-center justify-start space-x-1 mb-4 text-black">
                        <svg class="w-4 h-4 fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                        fill="currentColor" stroke="currentColor">
                        <path
                            d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z">
                        </path>
                        </svg>

                        <svg class="w-4 h-4 fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                        fill="currentColor" stroke="currentColor">
                        <path
                            d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z">
                        </path>
                        </svg>

                        <svg class="w-4 h-4 fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                        fill="currentColor" stroke="currentColor">
                        <path
                            d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z">
                        </path>

                        </svg>
                        <svg class="w-4 h-4 fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                        fill="currentColor" stroke="currentColor">
                        <path
                            d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z">
                        </path>
                        </svg>

                        <svg class="w-4 h-4 fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                        fill="currentColor" stroke="currentColor">
                        <path
                            d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z">
                        </path>
                        </svg>
                    </div>

                    <!-- Paragraf Jane Smith -->
                    <p class="text-[15px] leading-relaxed text-black mb-6">
                        "Running a business means juggling a lot. This app lets me see my income and expenses in one place,
                        which saves me hours every month and keeps me honest about what's actually working."
                    </p>

                    <!-- Jane Smith: avatar + nama + role + logo -->
                    <div class="flex items-center gap-3">
                        <img src="https://i.pravatar.cc/48?img=32"
                            alt="Jane Smith avatar"
                            class="w-10 h-10 rounded-full">
                        <div>
                            <p class="text-sm font-semibold text-black">Jane Smith</p>
                            <p class="text-xs text-black">Small business owner</p>
                        </div>                       
                    </div>
                </div>

                <!-- pagination dots -->
                <div class="mt-10 flex items-center space-x-2">
                    <span class="w-2 h-2 rounded-full bg-black"></span>
                    <span class="w-2 h-2 rounded-full bg-gray-300"></span>
                    <span class="w-2 h-2 rounded-full bg-gray-300"></span>
                </div>

                <!-- Panah -->
                <div class="mt-10 flex justify-end">
                <div class="flex items-center space-x-3">
                    <!-- button panah kiri untuk navigasi, digambar pakai SVG. -->
                    <button type="button"
                    class="flex items-center justify-center w-10 h-10 border border-gray-300 rounded-md text-black bg-white shadow-sm">
                    <svg xmlns="http://www.w3.org/2000/svg"
                        class="w-4 h-4"
                        viewBox="0 0 20 20"
                        fill="none"
                        stroke="currentColor"
                        stroke-width="1.5">
                        <path d="M11.5 5L7 9.5L11.5 14" stroke-linecap="round" stroke-linejoin="round" />
                    </svg>
                    </button>

                    <!-- tombol panah kanan untuk ke item berikutnya -->
                    <button type="button"
                    class="flex items-center justify-center w-10 h-10 border border-gray-300 rounded-md text-black bg-white shadow-sm">
                    <svg xmlns="http://www.w3.org/2000/svg"
                        class="w-4 h-4"
                        viewBox="0 0 20 20"
                        fill="none"
                        stroke="currentColor"
                        stroke-width="1.5">
                        <path d="M8.5 5L13 9.5L8.5 14" stroke-linecap="round" stroke-linejoin="round" />
                    </svg>
                    </button>
                </div>
                </div>
            </div>
        </div>
    </section>

    <!-- CTA -->
    <section class="bg-[#f5f0e9] py-16 px-8">
    <div class="max-w-6xl mx-auto">
        <div class="rounded-2xl w-full mx-auto px-10 py-12 flex flex-col items-center justify-center gap-y-4 bg-gradient-to-b from-[#006ba6] to-[#00466e]">
        <h3
            class="text-3xl md:text-4xl lg:text-5xl max-w-xl lg:max-w-3xl mx-auto font-bold text-white text-center">
            Start managing your <br/>
            money now</h3>
        <p
            class="text-base md:text-lg lg:text-xl text-center text-gray-100 dark:text-gray-200">
            Join thousands of users who've taken control of their finances. Sign up in seconds <br/>
            and start tracking today.</p>
        <button
            class="relative mt-3 bg-blue-600 hover:bg-blue-700 px-4 py-1.5 rounded text-xs md:text-sm font-medium text-white">
            Get Started
        </button>
        </div>
    </section>
    </div>

    <!-- FOOTER -->
    <div class="bg-[#071b4a] text-slate-200">
        <div class="max-w-6xl mx-auto px-8 py-12 grid gap-32 md:grid-cols-3 sm:grid-cols-2 md:ml-16">
            <div class="p-5 md:p-0 space-y-6">
                <h3 class="text-2xl font-semibold text-white">Moneyfy</h3>
                <div class="space-y-1 text-sm">
                <p class="font-semibold text-slate-100">Address</p>
                <p class="text-slate-300">Level 1, 12 Sample St, Sydney NSW 2000</p>
            </div>

            <div class="space-y-1 text-sm">
                <p class="font-semibold text-slate-100">Contact</p>
                <a href="tel:18001234567" class="block text-slate-300 hover:text-white">1800 123 4567</a>
                <a href="mailto:support@financetracker.com" class="block text-slate-300 hover:text-white">
                    support@financetracker.com
                </a>
            </div>
            </div>

           <div class="p-5 md:p-0">
                <a class="block text-sm text-slate-200 hover:text-white" href="/#">About us</a>
                <a class="mt-2 block text-sm text-slate-200 hover:text-white" href="/#">Features</a>
                <a class="mt-2 block text-sm text-slate-200 hover:text-white" href="/#">Pricing</a>
                <a class="mt-2 block text-sm text-slate-200 hover:text-white" href="/#">Blog</a>
                <a class="mt-2 block text-sm text-slate-200 hover:text-white" href="/#">Help center</a>
            </div>

            <div class="p-5 md:p-0">
                <a class="block text-sm text-slate-200 hover:text-white" href="/#">Security</a>
                <a class="mt-2 block text-sm text-slate-200 hover:text-white" href="/#">Status</a>
                <a class="mt-2 block text-sm text-slate-200 hover:text-white" href="/#">Careers</a>
                <a class="mt-2 block text-sm text-slate-200 hover:text-white" href="/#">Contact us</a>
                <a class="mt-2 block text-sm text-slate-200 hover:text-white" href="/#">Integrations</a>
            </div>
        </div>
    </div>

    <div class="bg-gray-100 pt-2">
        <div class="flex pb-5 px-3 m-auto pt-5 border-t text-gray-800 text-sm flex-col
        max-w-screen-lg items-center">
            <div class="md:flex-auto md:flex-row-reverse mt-2 flex-row flex">
                <a href="/#" class="w-6 mx-1">
                    <svg class="fill-current cursor-pointer text-gray-500 hover:text-indigo-600" width="100%" height="100%"
                        viewBox="0 0 24 24" version="1.1" xmlns="http://www.w3.org/2000/svg"
                        xmlns:xlink="http://www.w3.org/1999/xlink" xml:space="preserve" xmlns:serif="http://www.serif.com/"
                        style="fill-rule: evenodd; clip-rule: evenodd; stroke-linejoin: round; stroke-miterlimit: 2;">
                        <path id="Twitter" d="M24,12c0,6.627 -5.373,12 -12,12c-6.627,0 -12,-5.373 -12,-12c0,-6.627
                    5.373,-12 12,-12c6.627,0 12,5.373 12,12Zm-6.465,-3.192c-0.379,0.168
                    -0.786,0.281 -1.213,0.333c0.436,-0.262 0.771,-0.676
                    0.929,-1.169c-0.408,0.242 -0.86,0.418 -1.341,0.513c-0.385,-0.411
                    -0.934,-0.667 -1.541,-0.667c-1.167,0 -2.112,0.945 -2.112,2.111c0,0.166
                    0.018,0.327 0.054,0.482c-1.754,-0.088 -3.31,-0.929
                    -4.352,-2.206c-0.181,0.311 -0.286,0.674 -0.286,1.061c0,0.733 0.373,1.379
                    0.94,1.757c-0.346,-0.01 -0.672,-0.106 -0.956,-0.264c-0.001,0.009
                    -0.001,0.018 -0.001,0.027c0,1.023 0.728,1.877 1.694,2.07c-0.177,0.049
                    -0.364,0.075 -0.556,0.075c-0.137,0 -0.269,-0.014 -0.397,-0.038c0.268,0.838
                    1.048,1.449 1.972,1.466c-0.723,0.566 -1.633,0.904 -2.622,0.904c-0.171,0
                    -0.339,-0.01 -0.504,-0.03c0.934,0.599 2.044,0.949 3.237,0.949c3.883,0
                    6.007,-3.217 6.007,-6.008c0,-0.091 -0.002,-0.183 -0.006,-0.273c0.413,-0.298
                    0.771,-0.67 1.054,-1.093Z"></path>
                    </svg>
                </a>
                <a href="/#" class="w-6 mx-1">
                    <svg class="fill-current cursor-pointer text-gray-500 hover:text-indigo-600" width="100%" height="100%"
                        viewBox="0 0 24 24" version="1.1" xmlns="http://www.w3.org/2000/svg"
                        xmlns:xlink="http://www.w3.org/1999/xlink" xml:space="preserve" xmlns:serif="http://www.serif.com/"
                        style="fill-rule: evenodd; clip-rule: evenodd; stroke-linejoin: round; stroke-miterlimit: 2;">
                        <path id="Facebook" d="M24,12c0,6.627 -5.373,12 -12,12c-6.627,0 -12,-5.373 -12,-12c0,-6.627
                    5.373,-12 12,-12c6.627,0 12,5.373
                    12,12Zm-11.278,0l1.294,0l0.172,-1.617l-1.466,0l0.002,-0.808c0,-0.422
                    0.04,-0.648 0.646,-0.648l0.809,0l0,-1.616l-1.295,0c-1.555,0 -2.103,0.784
                    -2.103,2.102l0,0.97l-0.969,0l0,1.617l0.969,0l0,4.689l1.941,0l0,-4.689Z"></path>
                    </svg>
                </a>
                <a href="/#" class="w-6 mx-1">
                    <svg class="fill-current cursor-pointer text-gray-500 hover:text-indigo-600" width="100%" height="100%"
                        viewBox="0 0 24 24" version="1.1" xmlns="http://www.w3.org/2000/svg"
                        xmlns:xlink="http://www.w3.org/1999/xlink" xml:space="preserve" xmlns:serif="http://www.serif.com/"
                        style="fill-rule: evenodd; clip-rule: evenodd; stroke-linejoin: round; stroke-miterlimit: 2;">
                        <g id="Layer_1">
                            <circle id="Oval" cx="12" cy="12" r="12"></circle>
                            <path id="Shape" d="M19.05,8.362c0,-0.062 0,-0.125 -0.063,-0.187l0,-0.063c-0.187,-0.562
                        -0.687,-0.937 -1.312,-0.937l0.125,0c0,0 -2.438,-0.375 -5.75,-0.375c-3.25,0
                        -5.75,0.375 -5.75,0.375l0.125,0c-0.625,0 -1.125,0.375
                        -1.313,0.937l0,0.063c0,0.062 0,0.125 -0.062,0.187c-0.063,0.625 -0.25,1.938
                        -0.25,3.438c0,1.5 0.187,2.812 0.25,3.437c0,0.063 0,0.125
                        0.062,0.188l0,0.062c0.188,0.563 0.688,0.938 1.313,0.938l-0.125,0c0,0
                        2.437,0.375 5.75,0.375c3.25,0 5.75,-0.375 5.75,-0.375l-0.125,0c0.625,0
                        1.125,-0.375 1.312,-0.938l0,-0.062c0,-0.063 0,-0.125
                        0.063,-0.188c0.062,-0.625 0.25,-1.937 0.25,-3.437c0,-1.5 -0.125,-2.813
                        -0.25,-3.438Zm-4.634,3.927l-3.201,2.315c-0.068,0.068 -0.137,0.068
                        -0.205,0.068c-0.068,0 -0.136,0 -0.204,-0.068c-0.136,-0.068 -0.204,-0.204
                        -0.204,-0.34l0,-4.631c0,-0.136 0.068,-0.273 0.204,-0.341c0.136,-0.068
                        0.272,-0.068 0.409,0l3.201,2.316c0.068,0.068 0.136,0.204
                        0.136,0.34c0.068,0.136 0,0.273 -0.136,0.341Z" style="fill: rgb(255, 255, 255);"></path>
                        </g>
                    </svg>
                </a>
                <a href="/#" class="w-6 mx-1">
                    <svg class="fill-current cursor-pointer text-gray-500 hover:text-indigo-600" width="100%" height="100%"
                        viewBox="0 0 24 24" version="1.1" xmlns="http://www.w3.org/2000/svg"
                        xmlns:xlink="http://www.w3.org/1999/xlink" xml:space="preserve" xmlns:serif="http://www.serif.com/"
                        style="fill-rule: evenodd; clip-rule: evenodd; stroke-linejoin: round; stroke-miterlimit: 2;">
                        <path id="Shape" d="M7.3,0.9c1.5,-0.6 3.1,-0.9 4.7,-0.9c1.6,0 3.2,0.3 4.7,0.9c1.5,0.6 2.8,1.5
                    3.8,2.6c1,1.1 1.9,2.3 2.6,3.8c0.7,1.5 0.9,3 0.9,4.7c0,1.7 -0.3,3.2
                    -0.9,4.7c-0.6,1.5 -1.5,2.8 -2.6,3.8c-1.1,1 -2.3,1.9 -3.8,2.6c-1.5,0.7
                    -3.1,0.9 -4.7,0.9c-1.6,0 -3.2,-0.3 -4.7,-0.9c-1.5,-0.6 -2.8,-1.5
                    -3.8,-2.6c-1,-1.1 -1.9,-2.3 -2.6,-3.8c-0.7,-1.5 -0.9,-3.1 -0.9,-4.7c0,-1.6
                    0.3,-3.2 0.9,-4.7c0.6,-1.5 1.5,-2.8 2.6,-3.8c1.1,-1 2.3,-1.9
                    3.8,-2.6Zm-0.3,7.1c0.6,0 1.1,-0.2 1.5,-0.5c0.4,-0.3 0.5,-0.8 0.5,-1.3c0,-0.5
                    -0.2,-0.9 -0.6,-1.2c-0.4,-0.3 -0.8,-0.5 -1.4,-0.5c-0.6,0 -1.1,0.2
                    -1.4,0.5c-0.3,0.3 -0.6,0.7 -0.6,1.2c0,0.5 0.2,0.9 0.5,1.3c0.3,0.4 0.9,0.5
                    1.5,0.5Zm1.5,10l0,-8.5l-3,0l0,8.5l3,0Zm11,0l0,-4.5c0,-1.4 -0.3,-2.5
                    -0.9,-3.3c-0.6,-0.8 -1.5,-1.2 -2.6,-1.2c-0.6,0 -1.1,0.2 -1.5,0.5c-0.4,0.3
                    -0.8,0.8 -0.9,1.3l-0.1,-1.3l-3,0l0.1,2l0,6.5l3,0l0,-4.5c0,-0.6 0.1,-1.1
                    0.4,-1.5c0.3,-0.4 0.6,-0.5 1.1,-0.5c0.5,0 0.9,0.2 1.1,0.5c0.2,0.3 0.4,0.8
                    0.4,1.5l0,4.5l2.9,0Z"></path>
                    </svg>
                </a>
                <a href="/#" class="w-6 mx-1">
                    <svg class="fill-current cursor-pointer text-gray-500 hover:text-indigo-600" width="100%" height="100%"
                        viewBox="0 0 24 24" version="1.1" xmlns="http://www.w3.org/2000/svg"
                        xmlns:xlink="http://www.w3.org/1999/xlink" xml:space="preserve" xmlns:serif="http://www.serif.com/"
                        style="fill-rule: evenodd; clip-rule: evenodd; stroke-linejoin: round; stroke-miterlimit: 2;">
                        <path id="Combined-Shape" d="M12,24c6.627,0 12,-5.373 12,-12c0,-6.627 -5.373,-12 -12,-12c-6.627,0
                    -12,5.373 -12,12c0,6.627 5.373,12 12,12Zm6.591,-15.556l-0.722,0c-0.189,0
                    -0.681,0.208 -0.681,0.385l0,6.422c0,0.178 0.492,0.323
                    0.681,0.323l0.722,0l0,1.426l-4.675,0l0,-1.426l0.935,0l0,-6.655l-0.163,0l-2.251,8.081l-1.742,0l-2.222,-8.081l-0.168,0l0,6.655l0.935,0l0,1.426l-3.74,0l0,-1.426l0.519,0c0.203,0
                    0.416,-0.145 0.416,-0.323l0,-6.422c0,-0.177 -0.213,-0.385
                    -0.416,-0.385l-0.519,0l0,-1.426l4.847,0l1.583,5.704l0.042,0l1.598,-5.704l5.021,0l0,1.426Z"></path>
                    </svg>
                </a>
            </div>
            <div class="my-5">© Copyright 2020. All Rights Reserved.</div>
        </div>
    </div>

<!-- Credit: Componentity.com -->

</body>
</html>   