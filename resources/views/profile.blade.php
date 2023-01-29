@extends("layouts.app")

@section("content")
    @if($errorUser)
        <div class="err-user-not-found-container">
            <h1>El perfil que buscas no existe</h1>
        </div>
    @else
        <div class="profile-background-img">
            <div class="profile-info-content">
                <div>
                    <img src="{{url("image/profile/".$user->image)}}" alt="image profile {{$user->name}}">
                </div>
                <div>
                    <h3>{{$user->name}} {{$user->last_name}} ({{$user->nick}})</h3>
                    @if(Auth::user() && Auth::user()->id == $user->id)
                        <button data-bs-toggle="modal" data-bs-target="#exampleModal">
                            <svg width="40px" height="40px" stroke-width="1.5" viewBox="0 0 24 24" fill="none"
                                 xmlns="http://www.w3.org/2000/svg" color="#000000">
                                <path
                                    d="M13.02 5.828L15.85 3l4.949 4.95-2.829 2.828m-4.95-4.95l-9.606 9.607a1 1 0 00-.293.707v4.536h4.536a1 1 0 00.707-.293l9.606-9.607m-4.95-4.95l4.95 4.95"
                                    stroke="#000000" stroke-width="1.5" stroke-linecap="round"
                                    stroke-linejoin="round"></path>
                            </svg>
                        </button>
                    @endif
                </div>
            </div>
        </div>
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Edita tu perfil</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form action="{{route("update.profile")}}" method="post" enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" value="{{$user->id}}" name="profileId">
                            <div class="mb-3">
                                <label for="image" class="form-label">Imagen</label>
                                <input type="file" name="image" class="form-control" id="image-update-profile"
                                       aria-describedby="emailHelp">
                            </div>
                            <div class="mb-3">
                                <label for="name" class="form-label">Nombre</label>
                                <input type="text" name="name" class="form-control" id="name"
                                       aria-describedby="emailHelp"
                                       value="{{$user->name}}">
                            </div>
                            <div class="mb-3">
                                <label for="lastName" class="form-label">Apellidos</label>
                                <input type="text" name="lastName" class="form-control" id="lastName"
                                       value="{{$user->last_name}}">
                            </div>
                            <div class="mb-3">
                                <label for="lastName" class="form-label">Nick</label>
                                <input type="text" name="nick" class="form-control" id="lastName"
                                       value="{{$user->nick}}">
                            </div>
                            <div class="mb-3">
                                <label for="email" class="form-label">Email</label>
                                <input type="email" name="email" class="form-control" id="email"
                                       value="{{$user->email}}">
                            </div>
                            <button type="submit" class="btn btn-primary">Save changes</button>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>
        <div class="secrets-profile-container">
            @if(session("message"))
                <div class="alert alert-success mx-auto" role="alert">
                    {{session("message")}}
                </div>
            @endif
            @if($errors->any())
                @foreach($errors->all() as $error)
                    <div class="alert alert-danger mx-auto" role="alert">
                        {{$error}}
                    </div>
                @endforeach
            @endif
            <div class="add-secrete-container">
                <span>Agrega un secreto de manera anonima para {{$user->name}}</span>
                <form id="form-send-sceret" action="{{route("save.secret")}}" method="POST">
                    @csrf
                    <input type="hidden" name="profileId" value="{{$user->id}}">
                    <textarea name="secret" class="@error('secret') is-invalid @enderror"
                              placeholder="Escribe un secreto"
                              required></textarea>
                    @error('secret')
                    <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                    @enderror
                    <button>Enviar</button>
                </form>
            </div>
            @if( count($user->secrets) >= 1)
                @foreach($user->secrets as $secret)
                    <div class="secret-container">
                        <div class="secret-header">
                            <div>
                                <img src="{{url("image/profile/default.jpg")}}" alt="default profile image">
                            </div>
                            <div>
                                <span>Anonymous</span>
                                <spa>{{$secret->created_at}}</spa>
                            </div>
                        </div>
                        <div class="secret-content">
                        <span>
                            {{$secret->secret}}
                        </span>
                        </div>
                    </div>
                @endforeach
            @else
                <h3>No hay secretos</h3>
            @endif
        </div>
    @endif
@endsection
