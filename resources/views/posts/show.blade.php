@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">

            <div class="col-8">
                <img class="w-100" src="/storage/{{ $post->image }}" alt="">
            </div>

            <div class="col-4">
                <div>

                    <div class="d-flex pb-1 align-items-center">
                        <div  class="pr-2"  style="width:45px;">
                            <img class="w-100 rounded-circle" src="{{$post->user->profile->profileImage()}}" alt="">
                        </div>
                        <div>
                            <span class="font-weight-bold">
                                <a class="text-dark" href="/profile/{{$post->user->id}}">
                                    {{ $post->user->username }}
                                </a>
                                •<a href=""> Follow</a>
                            </span>
                        </div>
                    </div>

                    <hr/>

                    <p>
                        <span class="font-weight-bold pr-1">
                            <a class="text-dark" href="/profile/{{$post->user->id}}">
                                {{ $post->user->username }}
                            </a>
                        </span>
                        {{ $post->caption }}
                    </p>
                </div>
            </div>

        </div>
    </div>
@endsection
