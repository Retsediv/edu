Vue.http.headers.common['X-CSRF-TOKEN'] = document.querySelector('#token').getAttribute('content');

new Vue({
    el: '#admin-user',

    data: {
        sortKey: '',

        reverse: -1,
    },

    ready: function(){
        this.getAllUsers();
    },

    methods: {
        getAllUsers: function(){

            this.loadUsers('/api/admin/users');
        },

        loadNewUsers: function(link){

            this.loadUsers(link);
        },

        loadUsers: function(link){

            var self = this;

            $.ajax({
                type: "GET",
                url: link,
                async: false,
                success: function (users) {

                    self.$set('users', users.data);
                    self.$set('next_link', users.next_page_url);
                    self.$set('prev_link', users.prev_page_url);
                }});

            console.log('load users...');
        },

        sortBy: function(sortKey){
            if(this.sortKey == sortKey){
                if(this.reverse == 1){
                    this.reverse = -1;
                } else {
                    this.reverse = 1;
                }
            } else {
                this.reverse = -1;
            }
            this.sortKey = sortKey;

        }

    }
});

