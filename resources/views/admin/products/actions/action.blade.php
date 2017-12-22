<a class="btn btn-sm btn-warning" href="{{route('admin.products.edit',$product->id)}}">Edit</a>
{!! Form::open(['route' => ['admin.products.destroy',$product->id],'method' => 'DELETE']) !!}
{!! Form::submit('Delete',['class' => 'btn btn-sm btn-danger']) !!}
{!! Form::close() !!}