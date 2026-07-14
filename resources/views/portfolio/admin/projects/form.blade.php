<div class="form-grid">
    <div class="form-group">
        <label>Title *</label>
        <input type="text" name="title" value="{{ old('title',$project->title??'') }}" placeholder="My Awesome Project" required>
        @error('title')<span class="field-error">{{ $message }}</span>@enderror
    </div>
    <div class="form-group">
        <label>Category *</label>
        <select name="category" required>
            @foreach(['web','app','design','other'] as $cat)
                <option value="{{ $cat }}" {{ old('category',$project->category??'')==$cat?'selected':'' }}>{{ ucfirst($cat) }}</option>
            @endforeach
        </select>
    </div>
    <div class="form-group form-span-2">
        <label>Short Description *</label>
        <input type="text" name="description" value="{{ old('description',$project->description??'') }}" placeholder="Brief description" required>
    </div>
    <div class="form-group form-span-2">
        <label>Full Description</label>
        <textarea name="long_description" rows="4">{{ old('long_description',$project->long_description??'') }}</textarea>
    </div>
    <div class="form-group">
        <label>Live Demo URL</label>
        <input type="url" name="live_url" value="{{ old('live_url',$project->live_url??'') }}" placeholder="https://example.com/demo">
    </div>
    <div class="form-group form-span-2">
        <label>Technologies <small>(comma-separated)</small></label>
        <input type="text" name="technologies" value="{{ old('technologies',isset($project)?implode(', ',$project->technologies??[]):'') }}" placeholder="Laravel, Vue.js, MySQL">
    </div>
    <div class="form-group">
        <label>Image</label>
        @if(isset($project) && $project->image)
            <div class="current-image">
                <img src="{{ asset('storage/'.$project->image) }}" alt="">
                <span>Current image</span>
            </div>
        @endif
        <input type="file" name="image" accept="image/*">
    </div>
    <div class="form-group">
        <label>Sort Order</label>
        <input type="number" name="sort_order" value="{{ old('sort_order',$project->sort_order??0) }}" min="0">
    </div>
    <div class="form-group form-checkbox">
        <label>
            <input type="checkbox" name="featured" value="1" {{ old('featured',$project->featured??false)?'checked':'' }}>
            <span>Featured Project</span>
        </label>
    </div>
</div>z