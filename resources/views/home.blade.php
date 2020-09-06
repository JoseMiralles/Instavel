@extends('layouts.app')

@section('content')
<div class="container">
    
    <div class="row">

        <!-- Profile pic -->
        <div class="col-3 p-5 profile-pic-wrapper">
            <img class="rounded-circle" src="https://pyxis.nymag.com/v1/imgs/9b1/3bf/52ecf309c857c380b7187bfc8c59dac441-04-jeb-bush-1.rsquare.w330.jpg"/>
        </div>

        <!-- Profile info -->
        <div class="col-9 pt-5 profile-info">
            <div class="profile-name"><h1>Name LastName</h1></div>
            <div class="d-flex">
                <div class="pr-3"><strong>111</strong> posts</div>
                <div class="pr-3"><strong>111</strong> followers</div>
                <div class="pr-3"><strong>111</strong> following</div>
            </div>
            <div class="pt-4"><strong>MySite.com</strong></div>
            <div>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</div>
            <div>www.google.com</div>
        </div>

    </div>

    <div class="row profile-posts pt-">

        <div class="col-4 p-3 image-post">
            <img class="w-100" src="https://scontent-iad3-1.cdninstagram.com/v/t51.2885-15/sh0.08/e35/s640x640/117532617_329372988207182_2163166929089500044_n.jpg?_nc_ht=scontent-iad3-1.cdninstagram.com&_nc_cat=102&_nc_ohc=J_4DldSndfQAX-z1RKz&oh=784d75d1a00fa38a915e1f2be3862931&oe=5F80DEA6"/>
        </div>
        <div class="col-4 p-3 image-post">
            <img class="w-100" src="https://scontent-iad3-1.cdninstagram.com/v/t51.2885-15/sh0.08/e35/s640x640/117532617_329372988207182_2163166929089500044_n.jpg?_nc_ht=scontent-iad3-1.cdninstagram.com&_nc_cat=102&_nc_ohc=J_4DldSndfQAX-z1RKz&oh=784d75d1a00fa38a915e1f2be3862931&oe=5F80DEA6"/>
        </div>
        <div class="col-4 p-3 image-post">
            <img class="w-100" src="https://scontent-iad3-1.cdninstagram.com/v/t51.2885-15/sh0.08/e35/s640x640/117532617_329372988207182_2163166929089500044_n.jpg?_nc_ht=scontent-iad3-1.cdninstagram.com&_nc_cat=102&_nc_ohc=J_4DldSndfQAX-z1RKz&oh=784d75d1a00fa38a915e1f2be3862931&oe=5F80DEA6"/>
        </div>

    </div>

</div>
@endsection
