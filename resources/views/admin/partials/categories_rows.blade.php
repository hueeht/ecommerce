@forelse ($categories as $category)
<form action="{{ route('admin.categories.destroy', $category->id) }}" method="post">
    @csrf
    @method('DELETE')
    <div class="item-menu">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <h5>
                        <div id="treeCate">
                            <ul>
                                @for ($i = 0; $i < $level; $i++)
                                    <ul>
                                @endfor
                                <li>{{ $category->name }}</li></ul>
                            </ul>
                        </div>
                    </h5>
                </div>
                <div class="col-md-6">
                    @if ($category->name != "root")
                        <a class="btn btn-warning btn-sm" href="{{ route('admin.categories.edit', $category->id) }}"><i class="fa fa-edit"></i></a>
                        <button class="btn btn-danger btn-sm delete" type="submit"><i class="fas fa-trash-alt"></i></button>
                    @endif
                </div>
            </div>
        </div>
    </div>
</form>
@includeWhen($category->sub->count() ,'admin.partials.categories_rows', ['categories' => $category->sub, 'level' => $level + 1])
@empty
@endforelse
