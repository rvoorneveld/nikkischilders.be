<!doctype html>
<html class="text-white antialiased leading-tight" lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">

    <title>Nikki Schilders - Wellness & Massages</title>

    <meta name="description" content="Nikki Schilders - Wellness & Massages">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    {{--<link href="images/favicon.jpg" type="images/x-icon" rel="shortcut icon">--}}
    <link rel="stylesheet" href="/css/app.css">
</head>

<body class="min-h-screen leading-relaxed tracking-wide">
    @if (Session::has('success.reservation'))
        @component('notification', ['type' => 'success',])
            <p class="font-bold">Reservering geslaagd</p>
            <p class="text-sm">De reservering is met succes ontvangen!</p>
        @endcomponent
    @endif
    <nav class="heading flex items-center justify-between flex-wrap bg-blue-900 p-6">
        <a href="/" class="flex items-center flex-shrink-0 text-white mr-6 text-xl sm:text-2xl md:text-3xl lg:text-4xl">
            <span class="tracking-wide font-black uppercase italic">Nikki</span>
            &nbsp;
            <span class="tracking-tighter font-hairline lowercase">Schilders</span>
        </a>
        <div class="block lg:hidden">
            <button id="script-toggle-button" class="flex items-center px-3 py-2 border rounded text-red-200 border-red-400 hover:text-white hover:border-white">
                <svg class="fill-current h-3 w-3" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><title>Menu</title><path d="M0 3h20v2H0V3zm0 6h20v2H0V9zm0 6h20v2H0v-2z"/></svg>
            </button>
        </div>
        <div class="pt-1 w-full block flex-grow lg:flex lg:items-center lg:w-auto">
            <div class="script-toggle text-sm lg:flex-grow hidden lg:block">
                @foreach($treatments as $treatment)
                <a href="#{{ \Illuminate\Support\Str::slug($title = $treatment->getTitle()) }}" class="block lg:inline-block mt-3 mx-4 lg:mt-0 text-blue-200 hover:text-white text-xl lg:text-base">
                    {{ $title }}
                </a>
                @endforeach
                <a href="#contact" class="block lg:inline-block mt-3 mx-4 lg:mt-0 text-blue-200 hover:text-white text-xl lg:text-base">
                    Contact
                </a>
            </div>
            <div class="script-toggle hidden mt-12 mb-6 lg:m-0 lg:block">
                <a href="#book" class="cursor-pointer rounded font-bold text-white bg-red-500 px-12 py-4 hover:bg-red-600 text-xl lg:text-base">Reserveren</a>
            </div>
        </div>
    </nav>

    <div class="w-full relative text-white bg-fixed object-cover" style="background-image: url('images/nikki.jpg'); min-height: 400px; background-position: 50% 50%;">
        <div class="absolute ml-32 mt-16">
            <h1 class="text-xl sm:text-2xl md:text-3xl lg:text-4xl heading font-extrabold uppercase object-none object-center">
                Lorum ipsum
            </h1>
            <h3 class="text-base heading font-hairline tracking-widest">
                Lorum ipsum dolar sit amet
            </h3>
            <h2 class="text-base heading font-extrabold mt-8">
                &ldquo;consectetur adipiscing elit<br>
                Sed tincidunt libero id luctus gravida&rdquo;
            </h2>
        </div>
    </div>
    <div class="bg-red-600 text-white">
        <div class="container flex flex-wrap md:mx-auto">
            <div class="w-full md:w-1/2 md:text-right p-6">
                <h1 class="text-3xl heading italic font-extrabold uppercase">
                    Lorum ipsum
                    <br>Dolar sit amet
                </h1>
                <h2 class="text-sm heading italic font-extrabold text-red-300">
                    &ldquo;consectetur adipiscing elit<br>
                    Sed tincidunt libero id luctus gravida&rdquo;
                </h2>
            </div>
            <div class="w-full md:w-1/2 text-left p-6">
                <p class="mb-6">
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed tincidunt libero id luctus gravida. Aliquam ut lobortis eros.
                    Integer a malesuada lorem, eget convallis est.
                </p>
                <p class="mt-6">
                    Phasellus nibh eros, condimentum ac justo sed, bibendum finibus arcu. In justo eros, accumsan ac mauris ac, suscipit gravida mauris.
                    Nam massa mi, dignissim non elementum sit amet, dictum in sem. Nunc accumsan id leo eget porttitor. Maecenas eget tincidunt velit.
                    Nullam quis quam tristique, pretium massa dictum, maximus est. Etiam libero urna, rhoncus in odio blandit, laoreet commodo elit.
                </p>
            </div>
        </div>
    </div>

    @foreach($treatments as $key => $treatment)
        <div class="promotion flex flex-row flex-wrap-reverse {{ (1&$key) ? 'flex-row-reverse' : '' }} bg-gray-100">
            <div class="relative w-full md:w-1/2 text-left px-4 md:px-8 lg:px-16 text-black hover:bg-gray-200">
                <a id="{{ \Illuminate\Support\Str::slug($title = $treatment->getTitle()) }}"></a>
                <h2 class="text-3xl heading italic font-extrabold uppercase mt-4 md:mt-8 lg:mt-16">{{ $title }}</h2>
                <h3 class="text-gray-400 text-2xl">
                    &euro; <span class="tracking-wider">{{ $treatment->getPrice() }}</span>
                </h3>
                <p class="my-6 w-full xl:1/2">
                    {{ $treatment->getDescription() }}
                </p>
                <div class="lg:absolute bottom-0 left-0 right-0 mb-6 lg:mb-10 text-center">
                    <a href="#book" class="rounded border-2 border-red-500 text-red-500 bg-white px-10 py-2 hover:bg-red-500 hover:text-white">
                        Reserveren
                    </a>
                </div>
            </div>
            <div class="w-full md:w-1/2">
                <img class="w-full" alt="" src="https://placekitten.com/640/360">
            </div>
        </div>
    @endforeach

    <a id="contact"></a>
    <div class="mx-auto flex flex-wrap flex-row p-6 bg-red-600">
        <div class="flex-1 p-6">

        </div>
        <div class="flex-1 p-6">
            <p class="mb-6">
                Vragen, opmerkingen of feedback? Contact mij via onderstaande kanalen.<br>
                Ik reageer ASAP!
            </p>
            <p>
                T: <a href="tel:+32468047774" class="hover:underline hover:text-red-200">0468 047 774</a><br>
                E: <a href="mailto:support@nikkischilders.be" class="hover:underline hover:text-red-200">support@nikkischilders.be</a><br>
            </p>
        </div>
    </div>
    <div class="text-center font-hairline text-sm mx-auto p-6 bg-red-600 text-red-300">
        <a class="inline-block" href="https://www.facebook.com/nikki.schilders" target="_blank">
            <svg class="icon" xmlns="http://www.w3.org/2000/svg" width="80" height="80" viewBox="0 0 46 46" role="img" aria-labelledby="facebook-icon">
                <title id="facebook-icon">Facebook</title>
                <path d="M18.896 20.12h1.758v-1.708c0-.753.02-1.915.566-2.635.576-.762 1.368-1.28 2.73-1.28 2.218 0 3.15.316 3.15.316l-.438 2.605s-.73-.212-1.417-.212c-.684 0-1.296.245-1.296.93v1.985h2.803l-.194 2.547h-2.61v8.84h-3.297v-8.84h-1.758V20.12z"/>
            </svg>
        </a>

        <a class="inline-block"  href="https://twitter.com/nikkischilders" target="_blank">
            <svg class="icon" xmlns="http://www.w3.org/2000/svg" width="80" height="80" viewBox="0 0 46 46" role="img" aria-labelledby="twitter-icon">
                <title id="twitter-icon">Twitter</title>
                <path d="M31.52 17.716c-.627.278-1.302.466-2.008.55.722-.432 1.275-1.116 1.536-1.933-.676.4-1.422.69-2.22.847-.637-.68-1.546-1.103-2.552-1.103-1.93 0-3.494 1.565-3.494 3.495 0 .273.03.54.09.796-2.904-.146-5.48-1.536-7.205-3.653-.3.52-.473 1.12-.473 1.76 0 1.212.617 2.28 1.555 2.908-.576-.017-1.115-.176-1.587-.436v.043c0 1.694 1.205 3.107 2.805 3.427-.295.082-.603.123-.923.123-.225 0-.444-.02-.657-.062.445 1.388 1.736 2.4 3.266 2.425-1.196.94-2.704 1.498-4.34 1.498-.283 0-.562-.013-.835-.046 1.55.99 3.385 1.568 5.36 1.568 6.43 0 9.944-5.323 9.944-9.94 0-.153-.003-.306-.01-.454.684-.492 1.278-1.108 1.745-1.81"/>
            </svg>
        </a>

        <a class="inline-block"  href="https://www.instagram.com/nikkischilders/?hl=nl" target="_blank">
            <svg class="icon" xmlns="http://www.w3.org/2000/svg" width="80" height="80" viewBox="0 0 46 46" role="img" aria-labelledby="instagram-icon">
                <title id="instagram-icon">Instagram</title>
                <path d="M29.76 29.03v-7.373h-1.537c.152.48.23.975.23 1.49 0 .958-.243 1.838-.73 2.647-.485.807-1.146 1.447-1.98 1.918-.834.47-1.744.705-2.73.705-1.495 0-2.773-.514-3.835-1.543-1.062-1.027-1.593-2.27-1.593-3.726 0-.517.076-1.013.228-1.49H16.21v7.373c0 .2.065.37.2.5.13.14.296.2.494.2H29.07c.188 0 .352-.06.488-.2s.202-.3.202-.49zm-3.233-6.064c0-.94-.343-1.743-1.03-2.406-.686-.664-1.515-.996-2.486-.996-.96 0-1.78.332-2.47.996-.68.663-1.03 1.466-1.03 2.406 0 .942.35 1.743 1.03 2.407s1.51.996 2.48.996c.975 0 1.8-.34 2.49-1s1.03-1.47 1.03-2.41zm3.233-4.097v-1.88c0-.22-.076-.4-.23-.56-.15-.158-.336-.235-.556-.235h-1.98c-.22 0-.406.08-.558.233-.15.155-.228.34-.228.552v1.876c0 .22.076.404.228.556s.337.23.558.23h1.98c.22 0 .406-.078.557-.23.16-.15.23-.338.23-.558zm1.98-2.37v12.99c0 .61-.22 1.14-.66 1.58-.44.44-.967.66-1.582.66H16.502c-.614 0-1.142-.22-1.582-.66-.44-.44-.66-.97-.66-1.586V16.5c0-.614.22-1.142.66-1.582.44-.44.967-.66 1.582-.66h12.996c.615 0 1.14.22 1.582.66.44.44.66.967.66 1.58z"/>
            </svg>
        </a>
    </div>
    <div class="text-center font-hairline text-sm mx-auto p-6 bg-red-600 text-red-300">
        Handcrafted by <a class="hover:underline hover:text-red-200" target="_blank" href="https://www.webathletes.nl">Webathletes</a> &copy; {{ date('Y') }}
    </div>
    @component('modal', ['name' => 'book',])
        <h1 class="heading text-2xl sm:text-3xl mb-2 lg:mb-6">Reserveer een behandeling</h1>
        @if(false === empty($errors->all()))
            <div class="bg-red-100 border-t-4 border-red-500 rounded-b text-red-700 px-4 py-3 shadow-md mt-2 mb-4" role="alert">
                <div class="flex">
                    <div class="py-1">
                        <svg class="rounded-full border-2 border-red-500 fill-current h-6 w-6 text-red-500 mr-4 mt-2" role="button" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><title>Close</title><path d="M14.348 14.849a1.2 1.2 0 0 1-1.697 0L10 11.819l-2.651 3.029a1.2 1.2 0 1 1-1.697-1.697l2.758-3.15-2.759-3.152a1.2 1.2 0 1 1 1.697-1.697L10 8.183l2.651-3.031a1.2 1.2 0 1 1 1.697 1.697l-2.758 3.152 2.758 3.15a1.2 1.2 0 0 1 0 1.698z"/></svg>
                    </div>
                    <div>
                        <p class="font-bold">Reservering niet geslaagd</p>
                        <p class="text-sm">Vul alle velden in om uw reservering te maken.</p>
                    </div>
                </div>
            </div>
        @endif
        <form class="w-full" method="post" action="/">
            {{ csrf_field() }}
            <div class="flex flex-wrap -mx-3 lg:mb-6">
                <div class="w-full md:w-1/2 px-3">
                    <label class="block uppercase tracking-wide text-gray-400 text-xs font-bold mb-1" for="firstName">
                        Voornaam
                    </label>
                    <input name="firstName" class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white" id="firstName" type="text" value="{{ old('firstName') }}">
                    @if($errors->first($key ='firstName'))
                        <p class="text-red-400 text-sm italic -mt-2 mb-2">{{ $errors->first($key) }}</p>
                    @endif
                </div>
                <div class="w-full md:w-1/2 px-3">
                    <label class="block uppercase tracking-wide text-gray-400 text-xs font-bold mb-1" for="lastName">
                        Achternaam
                    </label>
                    <input name="lastName" class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="lastName" type="text" value="{{ old('lastName') }}">
                    @if($errors->first($key = 'lastName'))
                        <p class="text-red-400 text-sm italic -mt-2 mb-2">{{ $errors->first($key) }}</p>
                    @endif
                </div>
            </div>
            <div class="flex flex-wrap -mx-3 lg:mb-6">
                <div class="w-full md:w-1/2 px-3">
                    <label class="block uppercase tracking-wide text-gray-400 text-xs font-bold mb-1" for="emailAddress">
                        E-mailadres
                    </label>
                    <input name="emailAddress" class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="emailAddress" type="email" value="{{ old('emailAddress') }}">
                    @if($errors->first($key = 'emailAddress'))
                        <p class="text-red-400 text-sm italic -mt-2 mb-2">{{ $errors->first($key) }}</p>
                    @endif
                </div>
                <div class="w-full md:w-1/2 px-3">
                    <label class="block uppercase tracking-wide text-gray-400 text-xs font-bold mb-1" for="phoneNumber">
                        Telefoonnummer
                    </label>
                    <input name="phoneNumber" class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="phoneNumber" type="tel" value="{{ old('phoneNumber') }}">
                    @if($errors->first($key = 'phoneNumber'))
                        <p class="text-red-400 text-sm italic -mt-2 mb-2">{{ $errors->first($key) }}</p>
                    @endif
                </div>
            </div>
            <div class="flex flex-wrap -mx-3 lg:mb-6">
                <div class="relative w-full md:w-1/2 px-3">
                    <label class="appearance-none block uppercase tracking-wide text-gray-400 text-xs font-bold mb-1" for="availability">
                        Datum
                    </label>
                    <select name="availability" class="block appearance-none w-full bg-gray-200 border border-gray-200 text-gray-700 py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500 mb-3" id="dateTime" value="{{ old('dateTime') }}">
                        @foreach($availabilities as $availability)
                            <option value="{{ old('availability', $availability->id) }}">{{ $availability->getDateTime() }}</option>
                        @endforeach
                    </select>
                    <div class="pointer-events-none absolute inset-y-0 right-0 mr-3 mt-6 flex items-center px-2 text-gray-700">
                        <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"/></svg>
                    </div>
                </div>
                <div class="relative w-full md:w-1/2 px-3">
                    <label class="appearance-none block uppercase tracking-wide text-gray-400 text-xs font-bold mb-1" for="treatment">
                        Behandeling
                    </label>
                    <select name="treatment" class="block appearance-none w-full bg-gray-200 border border-gray-200 text-gray-700 py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500 mb-3" id="treatment">
                        @foreach($treatments as $treatment)
                            <option value="{{ old('treatment', $treatment->id) }}">{{ $treatment->getTitle() }}</option>
                        @endforeach
                    </select>
                    <div class="pointer-events-none absolute inset-y-0 right-0 mr-3 mt-6 flex items-center px-2 text-gray-700">
                        <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"/></svg>
                    </div>
                </div>
            </div>
            <div class="w-full text-center mt-3 lg:mb-6">
                <input class="cursor-pointer rounded font-bold text-white bg-red-500 mx-auto px-12 py-4 hover:bg-red-600" type="submit" value="Reserveren">
            </div>
        </form>
    @endcomponent
    <script src="/js/app.js"></script>
</body>
</html>
