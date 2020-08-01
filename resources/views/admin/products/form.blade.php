<?php $title = isset($item) ? $item->name: "add new product" ?>
<?php $status = config('variables.status'); ?>
<?php 
	$all_categories = App\Category::whereStatus(1)->get(); 
	$categories = [];
	
?>


{!! Form::myInput('text', 'product_title', 'Name', ['required']) !!}
{!! Form::myInput('text', 'slug', 'Slug' ) !!}
{!! Form::textarea('description',null,['id'=>'editor1']) !!}
{!! Form::mySelect('status', 'Status', $status) !!}
<div class="form-group">
    <label for="status">Categories</label><br/>
    @if($all_categories)
    @foreach ($all_categories as $category) 
    {!! Form::checkbox('categories[]', $category->id,null) !!} {{ $category->title }}
    <br/>
    @endforeach
    @endif
</div>
{!! Form::myFileImage('featured_image', 'Feature Image',(isset($item) && $item->featured_image)?Helper::getStorageImage($item->featured_image):'' ) !!}

<div class="form-group">
    {!! Form::label('gallery_images[]','Gallery Images') !!}
    @if(isset($item) && is_array($item->gallery_images) && count($item->gallery_images)>0)
<div class=" rowimage">
    @foreach($item->gallery_images as $gallary_image)
    <!--<label>-->
        <img src="{{Helper::getStorageImage($gallary_image)}}" class="img-fluid" style="width:200px; height:auto; clear:both; display:inline; padding:2px; border:1px solid #ddd; margin-bottom:10px;">
    <!--</label>-->

    @endforeach
</div>
@endif
    {!! Form::file('gallery_images[]',['multiple' => true, "class"=>'inputfile']) !!}
</div>
<style>
    .rowimage { 
  display: flex; 
  padding: 0 -8px;
} 
.rowimage img { 
  margin: 0 8px; 
} 
</style>


