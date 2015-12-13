Vue.http.headers.common['X-CSRF-TOKEN'] = document.querySelector('#token').getAttribute('content');

new Vue({
    el: '#blog',

    data: {

    },

    ready: function(){
        this.getAllPosts();
    },

    methods: {
        getAllPosts: function(){

            this.loadPosts('/api/blog/all');
        },

        loadNewPosts: function(link){

            this.loadPosts(link);
        },

        loadPosts: function(link){

            var self = this;

            $.ajax({
                type: "GET",
                url: link,
                async: false,
                success: function (posts) {

                    self.$set('posts', posts.data);
                    self.$set('next_link', posts.next_page_url);
                    self.$set('prev_link', posts.prev_page_url);
                }});


            console.log('load...');

            //this.$http.get(link, function(posts)
            //{
            //    this.$set('posts', posts.data);
            //    this.$set('next_link', posts.next_page_url);
            //    this.$set('prev_link', posts.prev_page_url);
            //
            //});
        }

    }
});