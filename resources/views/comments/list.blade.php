<div class="comments pt-3 px-3">
    <h6>Комментарии {{$post->comments->count()}}</h6>

    @php
        if($post){
            $comments = $post->comments;
            /*
             * Группируем комментарии по полю parent_id. При этом данное поле становится ключами массива
             * коллекций содержащих модели комментариев
             */
            $comments_list = $comments->groupBy('parent_id');
        } else $comments_list = null;
    @endphp
    <div class="list">
@if($comments_list)
    @foreach($comments_list as $k => $comments)
        <!--Выводим только родительские комментарии parent_id = 0-->

            @if($k)
                @break
            @endif
            @include('comments.partials.item',['items'=>$comments])

        @endforeach
    @else
        <div class="alert">
            <p>Нет комментариев!</p>
        </div>
    @endif

    </div>
{{--{{$post->comments->count()}}--}}


	    <?php

//	    function treeComments( $all ) {
//		    $parent = $all->where( 'parent_id', 0 );
//		    return treeCommentsHandler( $parent, $all );
//	    }
//
//	    function treeCommentsHandler( $parentList, $all ) {
//		    $result = array();
//		    foreach ( $parentList as $comment ) {
//			    if ( $all->where( 'parent_id', $comment->id )->count() > 0 ) {
//			    	$oner = array();
//			    	$oner['elem'] = $comment;
//			    	$oner['childs'] = treeCommentsHandler( $all->where( 'parent_id', $comment->id ), $all );
//				    array_push( $result, $oner );
//			    } else {
//				    $oner = array();
//				    $oner['elem'] = $comment;
//				    $oner['childs'] = null;
//				    array_push( $result, $oner );
//			    }
//		    }
//
//
//		    return $result;
//	    }

	    ?>


        <?php //print_r(treeComments($post->comments)) ?>
        {{--@forelse ($post->comments as $comment)--}}



            {{--{{$comment->children->count()}}--}}
            {{--@include('comments.partials.item',['comment'=>treeComments($post->comments)])--}}

        {{--@empty--}}



        {{--@endforelse--}}


</div>