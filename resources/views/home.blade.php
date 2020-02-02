@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
         <div class="col-3 p-5">
            <img src="/svg/logo.jpg" class="rounded-circle" style="height:100px; margin-left:20px">
         </div>
            <div class="col-9 pt-5">
                <div><h1>{{$user->username}}</h1></div>

                    <div class="d-flex">
                        <div class="pr-5"><strong>153</strong> posts</div>
                        <div class="pr-5"><strong>23k</strong> followers</div>
                        <div class="pr-5"><strong>212</strong> following</div>
                    </div>
                    <div class="pt-4 font-weight-bold">{{$user->profile->title}}</div>
                    <div>{{$user->profile->description}}</div>
                    <!-- <div>We're a global community of pepole learning to code together. We are an open source project foundation!</div> -->
                    <div><a href="#">{{$user->profile->url}}</a></div>
            </div>
    </div>
    
     <!-- Image containers -->
    <div class="row pt-5">
        <div class="col-4">
        <img src="https://scontent-lht6-1.cdninstagram.com/v/t51.2885-15/e35/79002474_631701964304696_904759830227592469_n.jpg?_nc_ht=scontent-lht6-1.cdninstagram.com&amp;_nc_cat=108&amp;_nc_ohc=2wlkuzxCxYMAX-xEvAl&amp;oh=f55bf4af8a1f005d9654d4f3f19447d0&amp;oe=5EC60E04" class="w-100">
        </div>

        <div class="col-4">
        <img src="/svg/iamtheone.jpg" class="w-100" style="height:350px;">
        </div>

        <div class="col-4">
        <img src="/svg/myeffort.jpg" class="w-100">
        </div>
    </div>
</div>  
@endsection
