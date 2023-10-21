<div class="bg-gray-50 rounded-full border-b-2 border-indigo-600 dark:border-white/10 py-[22px] px-7 flex items-center justify-between">
    <div class="flex items-center gap-2">
        <button type="button" class="text-black dark:text-white" @click="$store.app.toggleSidebar()">
            <svg class="w-6 h-6" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor">
                <path fill-rule="evenodd" d="M3 6.75A.75.75 0 013.75 6h16.5a.75.75 0 010 1.5H3.75A.75.75 0 013 6.75zM3 12a.75.75 0 01.75-.75H12a.75.75 0 010 1.5H3.75A.75.75 0 013 12zm0 5.25a.75.75 0 01.75-.75h16.5a.75.75 0 010 1.5H3.75a.75.75 0 01-.75-.75z" clip-rule="evenodd" />
            </svg>
        </button>
        <div class="hidden sm:block">
            <nav aria-label="breadcrumb" class="w-full py-1 px-2">
                <ol class="flex space-x-3">
                    <li class="flex items-center">
                        {{ __('Connectés en tant que') }}
                    </li>
                    <span class="text-blue-700 font-bold">{{Auth::user()->name}}</span>
                </ol>
            </nav>
        </div>
    </div>
    <div class="flex items-center gap-5">
        <div class="flex items-center gap-2">
            {{--photo de profil--}}
            <div class="profile" x-data="dropdown" @click.outside="open = false">
                <button type="button" class="flex items-center gap-1.5 xl:gap-0" @click="toggle()">
                    <img class="h-7 w-7 rounded-full xl:mr-2" src="{{asset('assets/images/avatar.png')}}" alt="photo">
                    <span class="fw-medium hidden xl:block">{{ Auth::user()->name }}</span>
                    <svg class="w-4 h-4" width="32" height="32" viewBox="0 0 32 32" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M6.70711 11.2929C6.51957 11.1054 6.26522 11 6 11C5.73478 11 5.48043 11.1054 5.29289 11.2929C5.10536 11.4804 5 11.7348 5 12C5 12.2652 5.10536 12.5196 5.29289 12.7071L15.2929 22.7071C15.6834 23.0976 16.3166 23.0976 16.7071 22.7071L26.7071 12.7071C26.8946 12.5196 27 12.2652 27 12C27 11.7348 26.8946 11.4804 26.7071 11.2929C26.5196 11.1054 26.2652 11 26 11C25.7348 11 25.4804 11.1054 25.2929 11.2929L16 20.5858L6.70711 11.2929Z" fill="currentColor"></path>
                    </svg>
                </button>
                <ul x-cloak x-show="open" x-transition x-transition.duration.300ms>
                    <li>
                        <div class="flex items-center !p-1">
                            <div class="flex-none">
                                <img class="h-7 w-7 rounded-full object-cover" src="{{asset('assets/images/avatar.png')}}" alt="image">
                            </div>
                            <div class="pl-2">
                                <h4 class="text-sm text-black dark:text-white font-medium leading-none">{{ Auth::user()->name }}</h4>
                                <a href="mailto:{{ Auth::user()->email }}" class="text-black/40 dark:text-white/40 hover:text-black dark:hover:text-white text-xs">
                                    <span>{{ Auth::user()->email }}</span>
                                </a>
                            </div>
                        </div>
                    </li>
                    <li class="h-px bg-black/5 block my-1"></li>
                    <li>
                        <x-dropdown-link href="{{ route('profile.edit') }}">
                            <svg class="w-4 h-4 mr-2" width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" clip-rule="evenodd" d="M10.5302 2.01101C9.32209 1.5 8 1.5 8 1.5C6.67791 1.5 5.46975 2.01101 5.46975 2.01101C4.30319 2.50442 3.40381 3.40381 3.40381 3.40381C2.50442 4.30319 2.01101 5.46975 2.01101 5.46975C1.5 6.67791 1.5 8 1.5 8C1.5 9.32209 2.01101 10.5302 2.01101 10.5302C2.50442 11.6968 3.40381 12.5962 3.40381 12.5962C3.47292 12.6653 3.54362 12.732 3.61524 12.7963C3.64144 12.8255 3.6712 12.8518 3.70408 12.8744C4.54254 13.5968 5.46975 13.989 5.46975 13.989C6.67791 14.5 8 14.5 8 14.5C9.32208 14.5 10.5302 13.989 10.5302 13.989C11.2699 13.6762 11.9021 13.2001 12.2658 12.8936C12.3187 12.8625 12.3646 12.8225 12.402 12.776C12.527 12.6654 12.5962 12.5962 12.5962 12.5962C13.4956 11.6968 13.989 10.5302 13.989 10.5302C14.5 9.32208 14.5 8 14.5 8C14.5 6.67791 13.989 5.46975 13.989 5.46975C13.4956 4.30319 12.5962 3.40381 12.5962 3.40381C11.6968 2.50442 10.5302 2.01101 10.5302 2.01101ZM5.85931 13.068C5.37768 12.8643 4.94974 12.5786 4.63779 12.3395C5.16504 11.5463 5.90752 11.0906 5.90752 11.0906C6.87031 10.4996 8 10.5 8 10.5C9.12969 10.5 10.0925 11.0906 10.0925 11.0906C10.6986 11.4626 11.1259 11.9997 11.3592 12.3466C10.7364 12.816 10.1407 13.068 10.1407 13.068C9.1193 13.5 8 13.5 8 13.5C6.8807 13.5 5.85931 13.068 5.85931 13.068ZM5.3844 10.2383C5.3844 10.2383 5.68577 10.0534 6.16384 9.8687C6.06604 9.79515 5.97038 9.71302 5.87868 9.62132C5.87868 9.62132 5 8.74264 5 7.5C5 7.5 5 6.25736 5.87868 5.37868C5.87868 5.37868 6.75736 4.5 8 4.5C8 4.5 9.24264 4.5 10.1213 5.37868C10.1213 5.37868 11 6.25736 11 7.5C11 7.5 11 8.74264 10.1213 9.62132C10.1213 9.62132 10.0184 9.72419 9.83332 9.85954C10.0931 9.957 10.3591 10.0809 10.6156 10.2383C10.6156 10.2383 11.4536 10.7527 12.1025 11.6545C12.3591 11.3557 12.7899 10.7982 13.068 10.1407C13.068 10.1407 13.5 9.1193 13.5 8C13.5 8 13.5 6.8807 13.068 5.85931C13.068 5.85931 12.6506 4.87238 11.8891 4.11091C11.8891 4.11091 11.1276 3.34945 10.1407 2.93201C10.1407 2.93201 9.1193 2.5 8 2.5C8 2.5 6.8807 2.5 5.85931 2.93201C5.85931 2.93201 4.87238 3.34945 4.11091 4.11091C4.11091 4.11091 3.34945 4.87238 2.93201 5.85931C2.93201 5.85931 2.5 6.8807 2.5 8C2.5 8 2.5 9.1193 2.93201 10.1407C2.93201 10.1407 3.27305 10.947 3.90091 11.6643C4.20734 11.236 4.70631 10.6545 5.3844 10.2383ZM9.41421 8.91421C8.82843 9.5 8 9.5 8 9.5C7.17157 9.5 6.58579 8.91421 6.58579 8.91421C6 8.32843 6 7.5 6 7.5C6 6.67157 6.58579 6.08579 6.58579 6.08579C7.17157 5.5 8 5.5 8 5.5C8.82843 5.5 9.41421 6.08579 9.41421 6.08579C10 6.67157 10 7.5 10 7.5C10 8.32843 9.41421 8.91421 9.41421 8.91421Z" fill="currentcolor"></path>
                            </svg>
                            {{ __('Profile') }}
                        </x-dropdown-link>
                    </li>
                    <li class="h-px bg-black/5 block my-1"></li>
                    <li>
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <x-dropdown-link class="hover:text-red-500" href="{{ route('logout') }}" onclick="event.preventDefault(); this.closest('form').submit();">
                                <svg class="w-4 h-4 mr-2" width="32" height="32" viewBox="0 0 32 32" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M25.5858 16L21.0433 20.5425C20.8557 20.7301 20.75 20.9848 20.75 21.25C20.75 21.266 20.7504 21.282 20.7512 21.298C20.7631 21.5464 20.8671 21.7813 21.0429 21.9571C21.2304 22.1446 21.4848 22.25 21.75 22.25C22.0152 22.25 22.2696 22.1446 22.4571 21.9571L27.7071 16.7071C27.8946 16.5196 28 16.2652 28 16C28 15.7348 27.8946 15.4804 27.7071 15.2929L22.4572 10.043C22.2696 9.85536 22.0152 9.75 21.75 9.75C21.4848 9.75 21.2304 9.85536 21.0429 10.0429C20.8554 10.2304 20.75 10.4848 20.75 10.75C20.75 11.0152 20.8554 11.2696 21.0429 11.4571L25.5858 16Z" fill="currentcolor"></path>
                                    <path d="M13 17H27C27.5523 17 28 16.5523 28 16C28 15.4477 27.5523 15 27 15H13C12.4477 15 12 15.4477 12 16C12 16.5523 12.4477 17 13 17Z" fill="currentcolor"></path>
                                    <path d="M6 6H13C13.5523 6 14 5.55228 14 5C14 4.44772 13.5523 4 13 4H6C5.17157 4 4.58579 4.58579 4.58579 4.58579C4 5.17157 4 6 4 6V26C4 26.8284 4.58579 27.4142 4.58579 27.4142C5.17157 28 6 28 6 28H13C13.5523 28 14 27.5523 14 27C14 26.4477 13.5523 26 13 26H6V6Z" fill="currentcolor"></path>
                                </svg>
                                {{ __('Déconnexion') }}
                            </x-dropdown-link>
                        </form>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>
