<div class="container-fluid" id="vue" v-cloak>
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
      <issue-detail v-bind:issue="activeIssue"></issue-detail>
    </div>
  </div>
</div>

@include('components.issue')
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
