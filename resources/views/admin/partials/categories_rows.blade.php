
@forelse ($categories as $category)
<form action="{{ route('admin.categories.destroy', $category->id) }}" method="post">
    @csrf
    @method('DELETE')
<div class="item-menu">
    <div class="row">
        <div class="col-md-3">
            <h5>
                @for ($i = 0; $i < $level; $i++)
                    <i class="fas fa-level-down-alt"></i>
                @endfor
                    {{ $category->name }}
            </h5>
        </div>
        <div class="col-md-3">
            <a class="btn btn-warning" href="{{ route('admin.categories.edit', $category->id) }}"><i class="fa fa-edit"></i></a>
            <button class="btn btn-danger" type="submit" id="delete"><i class="fas fa-trash-alt"></i></button>
        </div>
    </div>
</div>
</form>
@includeWhen($category->sub->count() ,'admin.partials.categories_rows', ['categories' => $category->sub, 'level' => $level + 1])
@empty
@endforelse
