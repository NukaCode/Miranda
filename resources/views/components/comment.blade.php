<template id="comment-template">
  <div class="panel panel-inverse" v-bind:class="{ 'panel-dark': comment.type_id != 1}">
    <div class="panel-heading clearfix">
      <div class="pull-left">
        <img src="@{{ comment.avatar }}" class="img-circle" />
        @{{ comment.user.display_name }}
      </div>
      <div class="pull-right">
        <span v-if="comment.type_id == 2" class="label label-primary">Public Update</span>
        <span v-if="comment.type_id == 3" class="label label-warning">External User Update</span>
        <small class="text-muted">@{{ comment.created_at_readable }}</small>
      </div>
    </div>
    <div class="panel-body">
      @{{ comment.body }}
    </div>
  </div>
</template>
