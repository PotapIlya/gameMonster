@if ($crud->hasAccess('update'))
    <a href="{{ url($crud->route.'/test') }} " class="btn btn-xs btn-default"><i class="fa fa-ban"></i> Moderate</a>
@endif