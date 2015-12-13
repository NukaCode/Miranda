@include('components.comment')
<template id="issue-template">
  <div class="row">
    <div class="col-md-8">
      <div class="panel panel-inverse" v-if="issue">
        <div class="panel-heading">
          <div class="issue-vote">
            <i class="fa fa-chevron-up"
               v-bind:class="{'text-primary': vote == 1}"
               v-on:click="vote < 1 ? vote++ : vote = 1"
            ></i><br />
            @{{ vote }}<br />
            <i class="fa fa-chevron-down"
               v-bind:class="{'text-info': vote == -1}"
               v-on:click="vote >= 0 ? vote-- : vote = -1"></i>
          </div>
          <h2 class="issue-title">@{{ issue.key }}: @{{ issue.name }}</h2>
        </div>
        <div class="panel-body">
          <div class="hr-divider">
            <h3 class="hr-divider-content hr-divider-heading">
              Details
            </h3>
          </div>
          <div class="row">
            <div class="col-md-6">
              <div class="panel panel-inverse project-panel">
                <div class="list-group">
                  <div class="list-group-item row">
                    <div class="col-md-4"><strong>Project</strong></div>
                    <div class="col-md-8">
                      <a href="/project/@{{ issue.project_id }}">@{{ issue.project_name }}</a></div>
                  </div>
                  <div class="list-group-item row">
                    <div class="col-md-4"><strong>Created By</strong></div>
                    <div class="col-md-8"><a href="{!! route('home') !!}">@{{ issue.creator_name }}</a></div>
                  </div>
                  <div class="list-group-item row">
                    <div class="col-md-4"><strong>Assigned To</strong></div>
                    <div class="col-md-8"><a href="{!! route('home') !!}">@{{ issue.asignee_name }}</a></div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-6">
              <div class="panel panel-inverse project-panel">
                <div class="list-group">
                  <div class="list-group-item row">
                    <div class="col-md-3"><strong>Status</strong></div>
                    <div class="col-md-7">
                          <span v-if="editing.status == 0">
                            @{{ issue.status_name }}
                          </span>
                          <span v-else>
                            <select class="custom-select custom-select-sm" v-model="edit.status_id">
                              <option v-for="status in statuses"
                                      v-bind:value="status.id"
                                      v-bind:selected="status.id == issue.status_id"
                              >
                                @{{ status.name }}
                              </option>
                            </select>
                          </span>
                    </div>
                    <div class="col-md-2 text-right">
                      <div v-if="editing.status == 0" v-on:click="editing.status = 1" class="fa fa-edit"></div>
                      <div v-else>
                        <i v-on:click="save($index, 'status_id')" class="fa fa-save" style="display: inline-block;"></i>
                        <i v-on:click="editing.status = 0" class="fa fa-close" style="display: inline-block;"></i>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="hr-divider">
            <h3 class="hr-divider-content hr-divider-heading">
              Description
            </h3>
          </div>
          <div class="issue-description" v-html="issue.parsed_description"></div>
          <div class="hr-divider">
            <h3 class="hr-divider-content hr-divider-heading">
              Comments
            </h3>
          </div>
          <comment-detail v-for="comment in issue.comments" v-bind:comment="comment"></comment-detail>
          <button v-if="commenting == 0" v-on:click="startComment()" class="btn btn-primary">Comment</button>
          <div v-else>
            <textarea v-model="comment.body" class="form-control" rows="8"></textarea>
            <br />
            <div class="clearfix">
              <div class="pull-left">
                <button class="btn btn-primary" v-on:click="saveComment()">Add</button>
                <button class="btn btn-default" v-on:click="cancelComment()">Cancel</button>
              </div>
              <div class="pull-right">
                <select class="custom-select" v-model="comment.type_id">
                  <option v-for="type in types"
                          v-bind:value="type.id"
                  >
                    @{{ type.name }}
                  </option>
                </select>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>
