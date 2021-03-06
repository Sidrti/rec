<!DOCTYPE HTML>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

    <!-- Styles -->
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">

    @livewireStyles

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>


    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-2.2.4.min.js" integrity="sha256-BbhdlvQf/xTY9gja0Dq3HiwQF8LaCRTXxZKRutelT44=" crossorigin="anonymous"></script>
    <script src="http://code.jquery.com/jquery-1.11.0.min.js"></script>

    <!-- Bootstrap files (jQuery first, then Popper.js, then Bootstrap JS) -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js" type="text/javascript"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="/css/header.css">

    <script type="text/javascript">
    
        $(document).ready(function() {

            // Prevent closing from click inside dropdown
            $(document).on('click', '.dropdown-menu', function(e) {
                e.stopPropagation();
            });

            // make it as accordion for smaller screens
            if ($(window).width() < 992) {
                $('.dropdown-menu a').click(function(e) {
                    e.preventDefault();
                    if ($(this).next('.submenu').length) {
                        $(this).next('.submenu').toggle();
                    }
                    $('.dropdown').on('hide.bs.dropdown', function() {
                        $(this).find('.submenu').hide();
                    })
                });
            }

        });
    </script>

</head>

<body class="bg-light">
    <div class="row mt-3 mb-3">
        <div class="col-md-2">
            <img src='/images/logo.png' alt="Website Logo" class="logo_image ml-5"/>
        </div>
        <div class="col-md-6">
            <marquee id="marqNews"></marquee>
        </div>
        <div class="col-md-2">
            <img src='/images/wallet.svg' alt="wallet" class="wallet_image pt-1"/>
        </div>
        <div class="col-md-2 d-flex">
            <img class="profile_image" src='/images/user.svg' alt="user"/>
            <div class="pt-1">
                <div class="flex justify-between">

                    <!-- Settings Dropdown -->
                    <div class="hidden sm:flex sm:items-center sm:ml-6">
                        <x-jet-dropdown align="right" width="48">
                            <x-slot name="trigger">
                                @if (Laravel\Jetstream\Jetstream::managesProfilePhotos())
                                <button class="flex text-sm border-2 border-transparent rounded-full focus:outline-none focus:border-gray-300 transition duration-150 ease-in-out">
                                    <img class="h-8 w-8 rounded-full object-cover" src="{{ Auth::user()->profile_photo_url }}" alt="{{ Auth::user()->name }}" />
                                </button>
                                @else
                                <button class="flex items-center text-sm font-medium text-gray-500 hover:text-gray-700 hover:border-gray-300 focus:outline-none focus:text-gray-700 focus:border-gray-300 transition duration-150 ease-in-out">
                                    <div>Hi! {{ Auth::user()->name }}</div>

                                    <div class="ml-1">
                                        <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                            <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                        </svg>
                                    </div>
                                </button>
                                @endif
                            </x-slot>

                            <x-slot name="content">
                                <!-- Account Management -->
                                <div class="block px-4 py-2 text-xs text-gray-400">
                                    {{ __('Manage Account') }}
                                </div>

                                <x-jet-dropdown-link href="{{ route('profile.show') }}">
                                    {{ __('Profile') }}
                                </x-jet-dropdown-link>

                                @if (Laravel\Jetstream\Jetstream::hasApiFeatures())
                                <x-jet-dropdown-link href="{{ route('api-tokens.index') }}">
                                    {{ __('API Tokens') }}
                                </x-jet-dropdown-link>
                                @endif

                                <div class="border-t border-gray-100"></div>

                                <!-- Team Management -->
                                @if (Laravel\Jetstream\Jetstream::hasTeamFeatures())
                                <div class="block px-4 py-2 text-xs text-gray-400">
                                    {{ __('Manage Team') }}
                                </div>

                                <!-- Team Settings -->
                                <x-jet-dropdown-link href="{{ route('teams.show', Auth::user()->currentTeam->id) }}">
                                    {{ __('Team Settings') }}
                                </x-jet-dropdown-link>

                                @can('create', Laravel\Jetstream\Jetstream::newTeamModel())
                                <x-jet-dropdown-link href="{{ route('teams.create') }}">
                                    {{ __('Create New Team') }}
                                </x-jet-dropdown-link>
                                @endcan

                                <div class="border-t border-gray-100"></div>

                                <!-- Team Switcher -->
                                <div class="block px-4 py-2 text-xs text-gray-400">
                                    {{ __('Switch Teams') }}
                                </div>

                                @foreach (Auth::user()->allTeams() as $team)
                                <x-jet-switchable-team :team="$team" />
                                @endforeach

                                <div class="border-t border-gray-100"></div>
                                @endif

                                <!-- Authentication -->
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf

                                    <x-jet-dropdown-link href="{{ route('logout') }}" onclick="event.preventDefault();
                                                            this.closest('form').submit();">
                                        {{ __('Logout') }}
                                    </x-jet-dropdown-link>
                                </form>
                            </x-slot>
                        </x-jet-dropdown>
                    </div>

                    <!-- Hamburger -->
                    <div class="-mr-2 flex items-center sm:hidden">
                        <button @click="open = ! open" class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 focus:text-gray-500 transition duration-150 ease-in-out">
                            <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                                <path :class="{'hidden': open, 'inline-flex': ! open }" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                                <path :class="{'hidden': ! open, 'inline-flex': open }" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                            </svg>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- ========================= SECTION CONTENT ========================= -->

    <div class="container-fluid" style="padding-right:0px !important;padding-left:0px !important">

        <nav class="navbar navbar-expand-lg navbar-dark bg-primary">

            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#main_nav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="main_nav">

                <ul class="navbar-nav">
                    <li class="nav-item active">
                        <a class="nav-link" href="#">Dashboard </a>

                    </li>
                    <li class="nav-item dropdown"><a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown"> Management </a>
                        <ul class="dropdown-menu">
                            <li>
                                <a class="dropdown-item  dropdown-item-color dropdown-toggle"> Api Details </a>
                                <ul class="submenu dropdown-menu">
                                    <li><a class="dropdown-item dropdown-item-color" href="">API Balances</a></li>
                                    <li><a class="dropdown-item dropdown-item-color" href="{{url('ApiInfo')}}">API Codes</a></li>
                                    <li><a class="dropdown-item dropdown-item-color" href="{{url('ApiSettings')}}">API Settings</a></li>
                                </ul>
                            </li>
                            <li><a class="dropdown-item dropdown-item-color" href="{{url('OperatorList')}}"> My Operators </a></li>
                            <li>
                                <a class="dropdown-item dropdown-item-color dropdown-toggle" href="#"> Package </a>
                                <ul class="submenu dropdown-menu">
                                    <li><a class="dropdown-item dropdown-item-color" href="{{url('ManagePackage')}}">Manage Package</a></li>
                                    <li><a class="dropdown-item dropdown-item-color" href="{{ url('DefaultPackage') }}">Set Default Package</a></li>
                                </ul>
                            </li>
                            <li><a class="dropdown-item dropdown-item-color" href="{{url('AmountFilter')}}"> Filter - Amount Wise </a></li>
                            <li>
                                <a class="dropdown-item  dropdown-item-color dropdown-toggle" href="#"> Filter State- Wise </a>
                                <ul class="submenu dropdown-menu">
                                    <li><a class="dropdown-item dropdown-item-color" href="">States Master</a></li>
                                    <li><a class="dropdown-item dropdown-item-color" href="">Filter Setting</a></li>
                                </ul>
                            </li>
                            <li><a class="dropdown-item dropdown-item-color" href="{{url('APITrailSettings')}}"> Fail Switching</a></li>
                            <li><a class="dropdown-item dropdown-item-color" href="{{url('News')}}"> News </a></li>
                            <li><a class="dropdown-item dropdown-item-color" href="#"> Change Password </a></li>
                            <li><a class="dropdown-item dropdown-item-color" href="{{url('SmsSettings')}}"> SMS Api </a></li>
                        </ul>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown"> Accounts </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item dropdown-item-color" href="{{url('AccountList')}}"> Accounts </a></li>
                            <li><a class="dropdown-item dropdown-item-color" href="{{url('AccountCapping')}}"> Accounts Capping </a></li>
                            <li><a class="dropdown-item dropdown-item-color" href="{{url('MoveAccount')}}"> Promote/Demote </a></li>
                        </ul>
                    </li>
                    <li class="nav-item dropdown"><a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown"> Recharges </a>
                        <ul class="dropdown-menu">
                        <li><a class="dropdown-item dropdown-item-color" href="{{url('recharge')}}"> Recharges </a></li>
                            <li><a class="dropdown-item dropdown-item-color" href="{{url('RechargeList')}}"> Recharge Search </a></li>
                            <li><a class="dropdown-item dropdown-item-color" href="#"> Recharge Report </a></li>
                            <li><a class="dropdown-item dropdown-item-color" href="#"> Tickets Report </a></li>
                            <li><a class="dropdown-item dropdown-item-color" href="#"> Bulk Re-Try </a></li>
                        </ul>
                    </li>
                    <li class="nav-item"><a class="nav-link" href="#"> Money Transfer </a></li>
                    <li class="nav-item dropdown"><a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown"> Payment Req </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item dropdown-item-color" href="#"> Payment Request </a></li>
                            <li><a class="dropdown-item dropdown-item-color" href="{{url('MyBankAccount')}}"> My Bank Acc </a></li>
                        </ul>
                    </li>
                    <li class="nav-item dropdown"><a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown"> Reports </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item dropdown-item-color dropdown-toggle" href="#"> Account Report </a>
                                <ul class="submenu dropdown-menu">
                                    <li><a class="dropdown-item dropdown-item-color" href="">My Ledger </a></li>
                                    <li><a class="dropdown-item dropdown-item-color" href="">Stock Transfer Report</a></li>
                                </ul>
                            </li>
                            <li><a class="dropdown-item  dropdown-item-color dropdown-toggle" href="#"> Recharge Reports </a>
                                <ul class="submenu dropdown-menu">
                                    <li><a class="dropdown-item dropdown-item-color" href="">Day Status Report</a></li>
                                    <li><a class="dropdown-item dropdown-item-color" href="">Referral/ Deductions</a></li>
                                </ul>
                            </li>
                            <li><a class="dropdown-item dropdown-item-color dropdown-toggle" href="#"> LongCode Server </a>
                                <ul class="submenu dropdown-menu">
                                    <li><a class="dropdown-item dropdown-item-color" href="">LongCode Server</a></li>
                                </ul>
                            </li>
                            <li><a class="dropdown-item dropdown-item-color" href="#"> API Received Report </a></li>
                            <li><a class="dropdown-item dropdown-item-color" href="#"> API Sent Report </a></li>
                        </ul>

                    </li>
                    <li class="nav-item dropdown"><a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown"> Utility Reports </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item dropdown-item-color" href="#"> Pending recharges </a></li>
                            <li><a class="dropdown-item dropdown-item-color" href="#"> API Earning </a></li>
                            <li><a class="dropdown-item dropdown-item-color" href="#"> User Wise Earning </a></li>
                            <li><a class="dropdown-item dropdown-item-color" href="#"> Operators Closing </a></li>
                            <li><a class="dropdown-item dropdown-item-color" href="#"> ALL Refunds Report </a></li>
                        </ul>
                    </li>

            </div> <!-- navbar-collapse.// -->

            <!-- Responsive Navigation Menu -->
            <div :class="{'block': open, 'hidden': ! open}" class="hidden sm:hidden">
                <div class="pt-2 pb-3 space-y-1">
                    <x-jet-responsive-nav-link href="{{ route('dashboard') }}" :active="request()->routeIs('dashboard')">
                        {{ __('Dashboard') }}
                    </x-jet-responsive-nav-link>
                </div>

                <!-- Responsive Settings Options -->
                <div class="pt-4 pb-1 border-t border-gray-200">
                    <div class="flex items-center px-4">
                        <div class="flex-shrink-0">
                            <img class="h-10 w-10 rounded-full" src="{{ Auth::user()->profile_photo_url }}" alt="{{ Auth::user()->name }}" />
                        </div>

                        <div class="ml-3">
                            <div class="font-medium text-base text-gray-800">{{ Auth::user()->name }}</div>
                            <div class="font-medium text-sm text-gray-500">{{ Auth::user()->email }}</div>
                        </div>
                    </div>

                    <div class="mt-3 space-y-1">
                        <!-- Account Management -->
                        <x-jet-responsive-nav-link href="{{ route('profile.show') }}" :active="request()->routeIs('profile.show')">
                            {{ __('Profile') }}
                        </x-jet-responsive-nav-link>

                        @if (Laravel\Jetstream\Jetstream::hasApiFeatures())
                        <x-jet-responsive-nav-link href="{{ route('api-tokens.index') }}" :active="request()->routeIs('api-tokens.index')">
                            {{ __('API Tokens') }}
                        </x-jet-responsive-nav-link>
                        @endif

                        <!-- Authentication -->
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf

                            <x-jet-responsive-nav-link href="{{ route('logout') }}" onclick="event.preventDefault();
                                                this.closest('form').submit();">
                                {{ __('Logout') }}
                            </x-jet-responsive-nav-link>
                        </form>

                        <!-- Team Management -->
                        @if (Laravel\Jetstream\Jetstream::hasTeamFeatures())
                        <div class="border-t border-gray-200"></div>

                        <div class="block px-4 py-2 text-xs text-gray-400">
                            {{ __('Manage Team') }}
                        </div>

                        <!-- Team Settings -->
                        <x-jet-responsive-nav-link href="{{ route('teams.show', Auth::user()->currentTeam->id) }}" :active="request()->routeIs('teams.show')">
                            {{ __('Team Settings') }}
                        </x-jet-responsive-nav-link>

                        <x-jet-responsive-nav-link href="{{ route('teams.create') }}" :active="request()->routeIs('teams.create')">
                            {{ __('Create New Team') }}
                        </x-jet-responsive-nav-link>

                        <div class="border-t border-gray-200"></div>

                        <!-- Team Switcher -->
                        <div class="block px-4 py-2 text-xs text-gray-400">
                            {{ __('Switch Teams') }}
                        </div>

                        @foreach (Auth::user()->allTeams() as $team)
                        <x-jet-switchable-team :team="$team" component="jet-responsive-nav-link" />
                        @endforeach
                        @endif
                    </div>
                </div>
            </div>

        </nav>

    </div><!-- container //  -->

</body>
<script>
    FetchNewsinMarq();

    function FetchNewsinMarq() {

        $.ajax({
          type: 'POST',
          url: 'header',
          data: {
            "_token": "{{ csrf_token() }}",
           
          },

          success: function(data) 
          {
            var tempData='';

              for(var i=0;i<data.length;i++){
                tempData = tempData+'****'+data[i];
              }
              
            document.getElementById('marqNews').innerHTML = tempData;
          }
        });
    }
    
  </script>

</html>
