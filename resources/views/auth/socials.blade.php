@foreach (socials_getProviders() as $item)
    @switch($item)
        @case('facebook')
            <a style="background-color: #3b5998;border-color: #3b5998;" class="btn btn-primary" href="{{ url('/login/facebook') }}"><i class="fab fa-facebook-square"></i> Sign-in with FaceBook</a>
            @break
        @case('twitter')
            <a style="background-color: #00acee;border-color: #00acee;" class="btn btn-primary" href="{{ url('/login/twitter') }}"><i class="fab fa-twitter-square"></i> Sign-in with Twitter</a>
            @break
        @case('steam')
            <a style="background-color: #34aa57;border-color: #34aa57;" class="btn btn-primary" href="{{ url('/login/steam') }}"><i class="fab fa-steam-square"></i> Sign-in with Steam</a>
            @break
        @case('discord')
            <a style="background-color: #3b5998;border-color: #3b5998;" class="btn btn-primary" href="{{ url('/login/discord') }}"><i class="fab fa-discord"></i> Sign-in with Discord</a>
            @break
        @case('google')
            <a style="background-color: #992c1d;border-color: #992c1d;" class="btn btn-primary" href="{{ url('/login/google') }}"><i class="fab fa-google"></i> Sign-in with Google</a>
            @break
        @case('sign-in-with-apple')
            <a style="background-color: #000000;border-color: #000000;" class="btn btn-primary" href="{{ url('/login/sign-in-with-apple') }}"><i class="fab fa-apple"></i> Sign-in with Apple</a>
            @break
        @default
    @endswitch
@endforeach
