

<div class="form-group">
	<label>Category lavel select</label>
	<select name="parent_id" id="parent_id" class="appendcategory-select form-control select2"  style="width: 100%;">
	<option value="0" @if(isset($categorydata['parent_id']) && $categorydata['parent_id']==0) selected="" @endif >Main Category</option>
	@if(!empty($getCategories))
		@foreach($getCategories as $category)
			<option value="{{ $category['id'] }}" @if(isset($categorydata['parent_id']) && $categorydata['parent_id'] == $category['id']) selected="" @endif>&bull;{{ $category['name'] }}</option>
			@if(!empty($category['subcategories']))
				@foreach($category['subcategories'] as $subcategory)
					<option value="{{ $subcategory['id'] }}">&nbsp;&nbsp;&nbsp;&raquo;{{ $subcategory['name'] }}</option>
				@endforeach
			@endif
		@endforeach
	@endif
	</select>
</div>