@if(Session::has('info'))
    <?php $info = Session::get('info');?>
    <div class="x_content bs-example-popovers">
        <div class="alert alert-{!!  array_get($info->get('type'), 0) !!} alert-dismissible fade in" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
            </button>
            {!!  array_get($info->get('info'), 0) !!}
        </div>
    </div>
@endif