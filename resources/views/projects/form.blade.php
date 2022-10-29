@csrf

<div class="form-group">
  <label for="title">العنوان</label>
  <input type="text" name="title" id="title" class="form-control" value="{{ old('title') ?? $project->title ?? '' }}">
</div>

<div class="form-group">
  <label for="description">الوصف</label>
  <textarea name="description" id="description" class="form-control">{{ old('description') ?? $project->description ?? '' }}</textarea>
</div>