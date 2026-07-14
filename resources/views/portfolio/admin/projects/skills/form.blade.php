<div class="form-grid">
    <div class="form-group">
        <label>Skill Name *</label>
        <input type="text" name="name" value="{{ old('name',$skill->name??'') }}" placeholder="Laravel" required>
        @error('name')<span class="field-error">{{ $message }}</span>@enderror
    </div>
    <div class="form-group">
        <label>Icon (emoji)</label>
        <input type="text" name="icon" value="{{ old('icon',$skill->icon??'') }}" placeholder="🔴">
    </div>
    <div class="form-group">
        <label>Category *</label>
        <select name="category" required>
            @foreach(['frontend','backend','tools','design','other'] as $cat)
                <option value="{{ $cat }}" {{ old('category',$skill->category??'')==$cat?'selected':'' }}>{{ ucfirst($cat) }}</option>
            @endforeach
        </select>
    </div>
    <div class="form-group">
        <label>Level (%) *</label>
        <input type="number" name="level" min="0" max="100" value="{{ old('level',$skill->level??80) }}" required>
    </div>
    <div class="form-group">
        <label>Sort Order</label>
        <input type="number" name="sort_order" min="0" value="{{ old('sort_order',$skill->sort_order??0) }}">
    </div>
</div>