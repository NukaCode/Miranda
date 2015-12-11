@section('css')
  <style>
    .issue-vote {
      display:       inline-block;
      text-align:    center;
      padding-right: 5px;
    }

    .issue-title {
      display:        inline-block;
      vertical-align: top;
      margin-top:     16px;
    }

    .issue-description {
      padding-top: 10px;
    }
  </style>
@endsection
<div class="container-fluid" id="vue" v-cloak>
  <pre>@{{ edit | json }}</pre>
  <div class="row">
    <div class="col-md-3">
      <div class="panel panel-dark">
        <div class="panel-heading">
          <h3 class="panel-title">All Issues</h3>
        </div>
        <div class="list-group">
          <a class="list-group-item"
             v-bind:class="{ 'active': issue.id == activeIssue.id }"
             v-for="issue in issues"
             v-on:click="activeIssue = issue"
          >
            @{{ issue.key }}: @{{ issue.name }}
          </a>
        </div>
      </div>
    </div>
    <div class="col-md-9">
      <div class="row">
        <div class="col-md-8">
          <div class="panel panel-inverse" v-if="activeIssue">
            <div class="panel-heading">
              <div class="issue-vote">
                <i class="fa fa-chevron-up"
                   v-bind:class="{'text-primary': vote == 1}"
                   v-on:click="vote < 1 ? vote++ : vote = 1"></i><br />
                @{{ vote }}<br />
                <i class="fa fa-chevron-down"
                   v-bind:class="{'text-info': vote == -1}"
                   v-on:click="vote >= 0 ? vote-- : vote = -1"></i>
              </div>
              <h2 class="issue-title">@{{ activeIssue.key }}: @{{ activeIssue.name }}</h2>
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
                          <a href="/project/@{{ activeIssue.project_id }}">@{{ activeIssue.project_name }}</a></div>
                      </div>
                      <div class="list-group-item row">
                        <div class="col-md-4"><strong>Created By</strong></div>
                        <div class="col-md-8"><a href="{!! route('home') !!}">@{{ activeIssue.creator_name }}</a></div>
                      </div>
                      <div class="list-group-item row">
                        <div class="col-md-4"><strong>Assigned To</strong></div>
                        <div class="col-md-8"><a href="{!! route('home') !!}">@{{ activeIssue.asignee_name }}</a></div>
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
                          <span v-if="editStatus == 0">
                            @{{ activeIssue.status_name }}
                          </span>
                          <span v-else>
                            <select class="custom-select custom-select-sm" v-model="edit.status_id">
                              <option v-for="status in statuses"
                                      v-bind:value="status.id"
                                      v-bind:selected="status.id == activeIssue.status_id"
                              >
                                @{{ status.name }}
                              </option>
                            </select>
                          </span>
                        </div>
                        <div class="col-md-2 text-right">
                          <div v-if="editStatus == 0" v-on:click="editStatus = 1" class="fa fa-edit"></div>
                          <div v-else>
                            <i v-on:click="save($index, 'status_id')" class="fa fa-save" style="display: inline-block;"></i>
                            <i v-on:click="editStatus = 0" class="fa fa-close" style="display: inline-block;"></i>
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
              <div class="issue-description" v-html="activeIssue.parsed_description"></div>
              <div class="hr-divider">
                <h3 class="hr-divider-content hr-divider-heading">
                  Comments
                </h3>
              </div>
              <div class="panel panel-inverse">
                <div class="panel-heading clearfix">
                  <div class="pull-left">
                    <img src="{!! $faker->imageUrl(30, 30) !!}" class="img-circle" />
                    {!! $faker->username !!}
                  </div>
                  <div class="pull-right">
                    <small class="text-muted">{!! $faker->date('F jS, Y h:ia') !!}</small>
                  </div>
                </div>
                <div class="panel-body">
                  {!! implode('<br />', $faker->paragraphs(2)) !!}
                </div>
              </div>
              <div class="hr-divider"></div>
              <div class="panel panel-dark">
                <div class="panel-heading clearfix">
                  <div class="pull-left">
                    <img src="{!! $faker->imageUrl(30, 30) !!}" class="img-circle" />
                    {!! $faker->username !!}
                    <span class="label label-primary">PUBLIC UPDATE</span>
                  </div>
                  <div class="pull-right">
                    <small class="text-muted">{!! $faker->date('F jS, Y h:ia') !!}</small>
                  </div>
                </div>
                <div class="panel-body">
                  {!! implode('<br />', $faker->paragraphs(2)) !!}
                </div>
              </div>
            </div>
            <div class="hr-divider"></div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

@section('js')
  <script>
    new Vue({
      el: '#vue',

      data: {
        issues: window.issues,
        activeIssue: window.issues[0],
        statuses: window.statuses,
        vote: 0,
        editStatus: 0,
        edit: {
          status_id: null
        }
      },

      methods: {
        save: function (index, property) {
          var request = this.activeIssue;
          request._token = '{!! csrf_token() !!}';
          request[property] = this.edit[property];

          this.$http.put('/issue/' + this.activeIssue.id, request, function (data) {
            self = this;

            this.issues.$set(index, data);
            this.activeIssue = data;

            this.editStatus = 0;
          });
        }
      }
    })
  </script>
@endsection
