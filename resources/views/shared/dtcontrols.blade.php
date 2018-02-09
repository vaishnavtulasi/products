@if(isset($deleteUrl))
    {{ html()->form('DELETE', $deleteUrl )->open() }}
    {!!
        html()->submit('<i class="fa fa-trash-o"></i>')
                ->class('btn btn-primary')
                ->attribute('data-id', $id)
                ->attribute('onclick', "return confirm('Are You Want To Delete This Record?');")
    !!}
@else
    {{ html()->form()->open() }}

@endif


@if(isset($editUrl))
    <a class="btn btn-success" href="{{ $editUrl }}"><i class="fa fa-edit"></i></a>
@endif

{{ html()->form()->close() }}


