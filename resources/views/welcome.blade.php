@extends("layouts.app")

@section("content")
    <div class="header-image-background-content">
        <div class="header-image-background"></div>
    </div>
    <div class="section-about-container">
        <div class="section-about-text">
            <div class="section-about-title">
                <h1>¿Que es SecretsApp?</h1>
            </div>
            <div class="section-about-description">
                <h3>
                    SecretsApp es un sitio web para poder crear y compartir
                    secretos de manera anonima con tus amigos y personas cercanas a ti
                </h3>
            </div>
        </div>
    </div>
    <div class="section-started-container">
        <div class="section-started-title">
            <h1>¡Comienza Ahora!</h1>
        </div>
        <div class="section-started-description">
            <h3>
                Crea una cuenta y comienza a compartir el enalce de tu perfil para que tus amigos te escriban secretos
            </h3>
        </div>
        <div class="section-started-cards">
            <a href="{{route("login")}}">
                <div>
                    <div>
                        <img src="{{ url("image/login-card.webp") }}">
                    </div>
                    <div>
                        <span>Login</span>
                    </div>
                </div>
            </a>
            <a href="{{route("register")}}">
                <div>
                    <div>
                        <img src="{{url("image/register-card.webp")}}">
                    </div>
                    <div>
                        <span>Register</span>
                    </div>
                </div>
            </a>
        </div>
    </div>
@endsection

