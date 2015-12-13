var commentComponent = Vue.extend(
    {
        template: "#comment-template",

        props: ['comment'],

        data: function () {
            return {
                editing: {
                    body: 0
                },
                edit: {
                    body: null
                }
            }
        },

        methods: {
            save: function (index, property) {
                var tokenMeta = $("meta[name=token]");
                var request   = this.issue;

                request._token = tokenMeta.attr('content');
                request[property] = this.edit[property];

                this.$http.put('/comment/' + this.comment.id, request, function (data) {
                    self = this;

                    this.comment = data;

                    this.editing.body = 0;
                });
            }
        }
    }
);

Vue.component('comment-detail', commentComponent);
