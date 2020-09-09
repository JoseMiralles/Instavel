@extends('layouts.app')

@section('content')
    <div class="container">

        @foreach ($posts as $post)

            <div class="border rounded col-7 offset-3 mb-5">
                <div class="row">
                    <div>
                        <div class="d-flex pb-1 align-items-center p-3">
                            <div class="pr-2" style="width:45px;">
                                <a href="/profile/{{ $post->user->id }}">
                                    <img class="w-100 rounded-circle" src="{{ $post->user->profile->profileImage() }}"
                                        alt="">
                                </a>
                            </div>
                            <div>
                                <span class="font-weight-bold">
                                    <a class="text-dark" href="/profile/{{ $post->user->id }}">
                                        {{ $post->user->username }}
                                    </a>
                                </span>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div>
                        <img class="w-100" src="/storage/{{ $post->image }}" alt="">
                    </div>
                </div>

                <div class="row">
                    <div class="p-3">
                        <span class="font-weight-bold pr-1">
                            <a class="text-dark" href="/profile/{{ $post->user->id }}">
                                {{ $post->user->username }}
                            </a>
                        </span>
                        {{ $post->caption }}
                    </div>
                </div>
            </div>

        @endforeach

        <div class="row">
            <div class="col-12 d-flex justify-content-center">
                <!-- Add the pagination links. -->
                {{$posts->links()}}
            </div>
        </div>

    </div>
@endsection
