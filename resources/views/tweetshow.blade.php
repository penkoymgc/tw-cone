@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Tweet</div>

                <div class="card-body">
                    {{ $tweets->tweet }}
                    <br>
                    <div style="display:flex; justify-content: left;align-items: center;">
                        <div style="float:left">
                            <a href="{{ route('userProfile') }}?user_id={{$tweets->users->id}}">{{ $tweets->users->name }} </a>/ {{ $tweets->created_at }}
                        </div>
                        <div style="float:left;" class="heart"></div>
                        <div style="float:left;" class="reply"></div>
                    </div>
                </div>

                <div class="card">
                    <div class="card-body">
                        <form method="POST" action="/tweet/reply">
                            <dl>
                                <dt>Comment</dt>
                                <dd><textarea type="text" name="text" class="form-control"></textarea></dd>

                            </dl>
                            <button type="submit" class="btn btn-light">Tweet</button>

                            <input type="hidden" name="id" value="{{ Auth::user()->id }}">
                            <input type="hidden" name="tweet_id" value="{{ $tweets->id }}">

                            @csrf
                        </form>
                    </div>
                </div>

                <div class="card">                    
                    <div class="card-header">Reply</div>

                    <div class="card-body">
                        @foreach ($replies as $reply)

                        {{ $reply->text }}
                        <br>
                        <div style="display:flex; justify-content: left;align-items: center;">
                            <div style="float:left">
                               {{ $reply->user_id }} </a>/ {{ $reply->created_at }}
                           </div>
                           <div style="float:left;" class="heart"></div>
                           <div style="float:left;" class="reply"></div>
                       </div>
                       <hr style="margin-top:0px; margin-bottom:10px">
                       @endforeach
                   </div>
               </div>
           </div>
       </div>
   </div>
</div>
</div>
@endsection