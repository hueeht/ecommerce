
@forelse ($categories as $category)
<form action="{{ route('admin.categories.destroy', $category->id) }}" method="post">
    @csrf
    @method('DELETE')
<div class="item-menu">
    <span>
        <h3>
            @for ($i = 0; $i < $level; $i++)
            <i class="fas fa-arrow-right"></i> ||
            @endfor
            <i class="fas fa-arrow-right"></i> {{ $category->name }}
        </h3>
    </span>
    <div class="category-fix">
        <a class="btn btn-warning" href="{{ route('admin.categories.edit', $category->id) }}"><i class="fa fa-edit"></i></a>
        <button class="btn btn-danger" type="submit" id="delete"><i class="fas fa-trash-alt"></i></button>
    </div>
</div>
</form>
@includeWhen($category->sub->count() ,'admin.partials.categories_rows', ['categories' => $category->sub, 'level' => $level + 1])
@empty
@endforelse
