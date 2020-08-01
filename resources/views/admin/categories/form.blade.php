<?php $title = isset($item) ? $item->name: "add new category" ?>
<?php $status = config('variables.status'); ?>

{!! Form::myInput('text', 'title', 'Name', ['required']) !!}
{!! Form::myInput('text', 'slug', 'Slug' ) !!}
{!! Form::mySelect('status', 'Status', $status) !!}
