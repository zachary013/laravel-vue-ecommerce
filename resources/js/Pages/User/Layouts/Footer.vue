<template>
    <!--
      Heads up! 👋
    
      This component comes with some `rtl` classes. Please remove them if they are not needed in your project.
    
      Plugins:
        - @tailwindcss/forms
    -->

    <footer class="bg-primary-700">
        <div class="mx-auto max-w-screen-xl px-4 py-16 sm:px-6 lg:px-8">


            <div class="mt-16 grid grid-cols-1 gap-8 sm:grid-cols-2 lg:grid-cols-4">
                <div class="text-center sm:text-left">
                    <p class="text-lg font-medium text-primary-100">About Us</p>

                    <ul class="mt-8 space-y-4 text-sm">
                        <li>
                            <a class="text-primary-400 transition hover:text-primary-300" href="#">
                                Company History
                            </a>
                        </li>

                        <li>
                            <a class="text-primary-400 transition hover:text-primary-300" href="#"> Meet the Team </a>
                        </li>

                        <li>
                            <a class="text-primary-400 transition hover:text-primary-300" href="#">
                                Employee Handbook
                            </a>
                        </li>

                        <li>
                            <a class="text-primary-400 transition hover:text-primary-300" href="#"> Careers </a>
                        </li>
                    </ul>
                </div>

                <div class="text-center sm:text-left">
                    <p class="text-lg font-medium text-primary-100">Our Services</p>

                    <ul class="mt-8 space-y-4 text-sm">
                        <li>
                            <a class="text-primary-400 transition hover:text-primary-300" href="#">
                                Web Development
                            </a>
                        </li>

                        <li>
                            <a class="text-primary-400 transition hover:text-primary-300" href="#"> Web Design </a>
                        </li>

                        <li>
                            <a class="text-primary-400 transition hover:text-primary-300" href="#"> Marketing </a>
                        </li>

                        <li>
                            <a class="text-primary-400 transition hover:text-primary-300" href="#"> Google Ads </a>
                        </li>
                    </ul>
                </div>

                <div class="text-center sm:text-left">
                    <p class="text-lg font-medium text-primary-100">Resources</p>

                    <ul class="mt-8 space-y-4 text-sm">
                        <li>
                            <a class="text-primary-400 transition hover:text-primary-300" href="#"> Online Guides </a>
                        </li>

                        <li>
                            <a class="text-primary-400 transition hover:text-primary-300" href="#">
                                Conference Notes
                            </a>
                        </li>

                        <li>
                            <a class="text-primary-400 transition hover:text-primary-300" href="#"> Forum </a>
                        </li>

                        <li>
                            <a class="text-primary-400 transition hover:text-primary-300" href="#"> Downloads </a>
                        </li>

                        <li>
                            <a class="text-primary-400 transition hover:text-primary-300" href="#">
                                Upcoming Events
                            </a>
                        </li>
                    </ul>
                </div>

                <div class="text-center sm:text-left">
                    <p class="text-lg font-medium text-primary-100">Helpful Links</p>

                    <ul class="mt-8 space-y-4 text-sm">
                        <li>
                            <a class="text-primary-400 transition hover:text-primary-300" href="#"> FAQs </a>
                        </li>

                        <li>
                            <a class="text-primary-400 transition hover:text-primary-300" href="#"> Support </a>
                        </li>

                        <li>
                            <a class="group flex justify-center gap-1.5 ltr:sm:justify-start rtl:sm:justify-end"
                                href="#">
                                <span class="text-primary-400 transition group-hover:text-primary-300"> Live Chat
                                </span>

                                <span class="relative flex h-2 w-2">
                                    <span
                                        class="absolute inline-flex h-full w-full animate-ping rounded-full bg-primary-500 opacity-75"></span>
                                    <span class="relative inline-flex size-2 rounded-full bg-primary-400"></span>
                                </span>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>

            <div class="mt-16">
                <ul class="flex justify-center gap-6 sm:justify-end">
                    <li>
                        <a href="#" rel="noreferrer" target="_blank"
                            class="text-primary-500 transition hover:text-primary-400">
                            <span class="sr-only">Facebook</span>
                            <svg class="h-6 w-6" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                                <path fill-rule="evenodd"
                                    d="M22 12c0-5.523-4.477-10-10-10S2 6.477 2 12c0 4.991 3.657 9.128 8.438 9.878v-6.987h-2.54V12h2.54V9.797c0-2.506 1.492-3.89 3.777-3.89 1.094 0 2.238.195 2.238.195v2.46h-1.26c-1.243 0-1.63.771-1.63 1.562V12h2.773l-.443 2.89h-2.33v6.988C18.343 21.128 22 16.991 22 12z"
                                    clip-rule="evenodd" />
                            </svg>
                        </a>
                    </li>

                    <li>
                        <a href="#" rel="noreferrer" target="_blank"
                            class="text-primary-500 transition hover:text-primary-400">
                            <span class="sr-only">Whatsapp</span>
                            <svg class="h-6 w-6" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                                <path
                                    d="M 12.011719 2 C 6.5057187 2 2.0234844 6.478375 2.0214844 11.984375 C 2.0204844 13.744375 2.4814687 15.462563 3.3554688 16.976562 L 2 22 L 7.2324219 20.763672 C 8.6914219 21.559672 10.333859 21.977516 12.005859 21.978516 L 12.009766 21.978516 C 17.514766 21.978516 21.995047 17.499141 21.998047 11.994141 C 22.000047 9.3251406 20.962172 6.8157344 19.076172 4.9277344 C 17.190172 3.0407344 14.683719 2.001 12.011719 2 z M 12.009766 4 C 14.145766 4.001 16.153109 4.8337969 17.662109 6.3417969 C 19.171109 7.8517969 20.000047 9.8581875 19.998047 11.992188 C 19.996047 16.396187 16.413812 19.978516 12.007812 19.978516 C 10.674812 19.977516 9.3544062 19.642812 8.1914062 19.007812 L 7.5175781 18.640625 L 6.7734375 18.816406 L 4.8046875 19.28125 L 5.2851562 17.496094 L 5.5019531 16.695312 L 5.0878906 15.976562 C 4.3898906 14.768562 4.0204844 13.387375 4.0214844 11.984375 C 4.0234844 7.582375 7.6067656 4 12.009766 4 z M 8.4765625 7.375 C 8.3095625 7.375 8.0395469 7.4375 7.8105469 7.6875 C 7.5815469 7.9365 6.9355469 8.5395781 6.9355469 9.7675781 C 6.9355469 10.995578 7.8300781 12.182609 7.9550781 12.349609 C 8.0790781 12.515609 9.68175 15.115234 12.21875 16.115234 C 14.32675 16.946234 14.754891 16.782234 15.212891 16.740234 C 15.670891 16.698234 16.538109 16.247641 16.697266 15.678711 C 16.856266 15.109711 16.856422 14.597578 16.796875 14.515625 C 16.737375 14.433625 16.5305 14.352953 16.279297 14.232422 C 16.028297 14.111422 14.9305 13.563156 14.701172 13.474609 C 14.471172 13.386609 14.291297 13.345078 14.111328 13.597656 C 13.931328 13.850656 13.463922 14.432375 13.330078 14.611328 C 13.196078 14.791328 13.0625 14.816406 12.810547 14.695312 C 12.559547 14.574312 11.733781 14.313062 10.837891 13.486328 C 10.081891 12.812328 9.5802656 11.947828 9.4550781 11.695312 C 9.3290781 11.442312 9.4956094 11.289266 9.6074219 11.168945 C 9.7194219 11.048945 9.8411406 10.884281 9.9609375 10.748047 C 10.080938 10.611047 10.202547 10.454219 10.318359 10.271484 C 10.433359 10.088484 10.471922 9.9570469 10.548828 9.7675781 C 10.625828 9.5785781 10.5895 9.4305 10.537109 9.3085938 C 10.484109 9.1865938 10.021578 8.0515 9.7988281 7.5839844 C 9.6418281 7.2599844 9.4385625 7.4405469 9.1972656 7.5605469 C 8.9772656 7.6705469 8.6435625 7.375 8.4765625 7.375 z" />
                            </svg>
                        </a>
                    </li>

                    <li>
                        <a href="#" rel="noreferrer" target="_blank"
                            class="text-primary-500 transition hover:text-primary-400">
                            <span class="sr-only">Linkedin</span>
                            <svg class="h-6 w-6" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                                <path
                                    d="M19 0h-14c-2.75 0-5 2.25-5 5v14c0 2.75 2.25 5 5 5h14c2.75 0 5-2.25 5-5v-14c0-2.75-2.25-5-5-5zm-11 19h-3v-10h3zm-1.5-11.75c-.966 0-1.75-.784-1.75-1.75s.784-1.75 1.75-1.75 1.75.784 1.75 1.75-.784 1.75-1.75 1.75zm13.5 11.75h-3v-5c0-1.103-.897-2-2-2s-2 .897-2 2v5h-3v-10h3v1.432c.919-.86 2.175-1.432 3.5-1.432 2.481 0 4.5 2.019 4.5 4.5v5.5z" />
                            </svg>
                        </a>
                    </li>
                </ul>
            </div>

            <p class="mt-12 text-center text-sm text-primary-500 lg:text-right">
                Copyright &copy; 2023. Company Name. All rights reserved.
            </p>
        </div>
    </footer>
</template>

<script>
export default {
    name: 'Footer',
};
</script>
