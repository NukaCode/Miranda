var issueComponent = Vue.extend(
    {
        template: "#issue-template",

        props: ['issue'],

        data: function () {
            return {
                statuses: window.statuses,
                types: window.types,
                commenting: 0,
                editing: {
                    status: 0
                },
                edit: {
                    status_id: null
                },
                comment: {
                    body: null,
                    type_id: window.types[0].id
                }
            }
        },

        methods: {
            save: function (index, property) {
                var tokenMeta = $("meta[name=token]");
                var request = this.issue;

                request._token = tokenMeta.attr('content');
                request[property] = this.edit[property];

                this.$http.put('/issue/' + this.issue.id, request, function (data) {
                    self = this;

                    this.issue = data;

                    this.editing.status = 0;
                });
            },
            startComment: function () {
                this.commenting = 1;

                setTimeout(function () {
                    $('#comment_body').focus();
                }, 1);
            },
            cancelComment: function () {
                $('#comment_body').val('');

                this.commenting = 0;
            },
            saveComment: function () {
                var tokenMeta = $("meta[name=token]");

                var request = this.comment;
                request. _token = tokenMeta.attr('content');

                this.$http.put('/issue/' + this.issue.id +'/comment', request, function (data) {
                    self = this;

                    this.issue = data;

                    this.commenting = 0;
                });
            }
        }
    }
);

Vue.component('issue-detail', issueComponent);
