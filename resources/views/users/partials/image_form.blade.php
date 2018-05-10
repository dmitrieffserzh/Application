<form action="{{ route('image.upload') }}" enctype="multipart/form-data" method="POST">
    {{ csrf_field() }}
    <div class="alert alert-danger print-error-msg" style="display:none">
        <ul></ul>
    </div>
    <input id="image" type="file" name="image" class="form-control">
    <button id="image-submit" class="btn btn-success upload-image" type="submit">Upload Image</button>
</form>
<style>

    .modal-body img,
    .jcrop-active{
        width: 100% !important;
        height: auto !important;
    }

</style>

<!-- Button trigger modal -->
<button class="btn btn-primary" data-toggle="modal" data-target="#myModal">
    Launch modal
</button>



<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="myModalLabel">Modal title</h4>
            </div>
            <div class="modal-body">


                <div>

                    <img id="target" src="{{ getImage('original', $user->profile->avatar) }}" alt="{{$user->nickname}}">



                    <div id="preview" style="width: 100px; height: 100px;"></div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save changes</button>
            </div>
        </div>
    </div>
</div>