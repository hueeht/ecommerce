@forelse ($categories as $categoryValue)
    <option value="{{ $categoryValue->id }}" selected={{ ($categoryValue->id==$product->id)?"selected":"" }}>
        @for ($i = 0; $i < $level; $i++)
            --|
        @endfor
        {{ $categoryValue->name }}
    </option>
    @includeWhen($categoryValue->sub->count(), 'admin.products.category_options', [
        'categories' => $categoryValue->sub,
        'level' => $level+1
    ])
@empty
@endforelse
