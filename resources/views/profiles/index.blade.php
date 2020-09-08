@extends('layouts.app')

@section('content')
    <div class="container">

        <div class="row">

            <!-- Profile pic -->
            <div class="col-md-3 p-5 profile-pic-wrapper">
                <img class="rounded-circle"
                    src="https://pyxis.nymag.com/v1/imgs/9b1/3bf/52ecf309c857c380b7187bfc8c59dac441-04-jeb-bush-1.rsquare.w330.jpg" />
            </div>

            <!-- Profile info -->
            <div class="col-md-9 pt-5 profile-info">
                <div class="profile-name d-flex justify-content-between align-items-baseline">
                    <h1>{{ $user->username }}</h1>
                    @can('update', $user->profile)
                        <a href="/p/create">add new post</a>
                    @endcan
                </div>

                <!-- Only render this part if the user is properly authenticated to edit this profile. -->
                @can('update', $user->profile)
                    <a href="/profile/{{ $user->id }}/edit">Edit profile</a>
                @endcan

                <div class="d-flex">
                    <div class="pr-3"><strong>{{ $user->posts->count() }}</strong> posts</div>
                    <div class="pr-3"><strong>111</strong> followers</div>
                    <div class="pr-3"><strong>111</strong> following</div>
                </div>
                <div class="pt-4"><strong>{{ $user->profile->title }}</strong></div>
                <div>{{ $user->profile->description }}</div>
                <a href="{{ $user->profile->url }}">
                    <div>{{ $user->profile->url }}</div>
                </a>
            </div>

        </div>

        <div class="row profile-posts pt-4">

            <!-- Render all the posts. -->
            @foreach ($user->posts as $post)

                <div class="col-4 p-3 image-post">
                    <a href="/p/{{ $post->id }}">
                        <img class="w-100" src="/storage/{{ $post->image }}" />
                    </a>
                </div>

            @endforeach

        </div>

    </div>
@endsection
