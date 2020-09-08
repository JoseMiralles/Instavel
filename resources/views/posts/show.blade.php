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
                            <img class="w-100 rounded-circle" src="/storage/{{ $post->user->profile->image }}" alt="">
                        </div>
                        <div>
                            <div class="font-weight-bold">{{ $post->user->username }}</div>
                        </div>
                    </div>

                    <hr/>

                    <p>{{ $post->caption }}</p>
                </div>
            </div>

        </div>
    </div>
@endsection
