@extends('layouts.admin')
@section('title', 'Edit Skill')
@section('page-title', 'Edit: ' . $skill->name)

@section('content')
<div class="admin-card">
    <form action="{{ route('admin.skills.update', $skill) }}" method="POST" class="admin-form">
        @csrf
        @method('PUT')
        <div class="form-grid">
            <div class="form-group">
                <label>Name *</label>
                <input type="text" name="name" value="{{ old('name', $skill->name) }}" required>
            </div>
            <div class="form-group">
                <label>Category *</label>
                <select name="category" required>
                    <option value="frontend" {{ $skill->category == 'frontend' ? 'selected' : '' }}>Frontend</option>
                    <option value="backend" {{ $skill->category == 'backend' ? 'selected' : '' }}>Backend</option>
                    <option value="database" {{ $skill->category == 'database' ? 'selected' : '' }}>Database</option>
                    <option value="tools" {{ $skill->category == 'tools' ? 'selected' : '' }}>Tools</option>
                </select>
            </div>
            <div class="form-group">
                <label>Icon (emoji)</label>
                <input type="text" name="icon" value="{{ old('icon', $skill->icon) }}">
            </div>
            <div class="form-group">
                <label>Level (0-100)</label>
                <input type="number" name="level" value="{{ old('level', $skill->level) }}" min="0" max="100">
            </div>
            <div class="form-group">
                <label>Sort Order</label>
                <input type="number" name="sort_order" value="{{ old('sort_order', $skill->sort_order) }}">
            </div>
        </div>
        <div class="form-footer">
            <button type="submit" class="btn-admin-primary">Update Skill</button>
            <a href="{{ route('admin.skills.index') }}" class="btn-admin-secondary">Cancel</a>
        </div>
    </form>
</div>
@endsection