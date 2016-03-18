Vue.http.headers.common['X-CSRF-TOKEN'] = document.querySelector('#token').getAttribute('content');

new Vue({
    el: '#admin-classes',

    data: {
        sortKey: '',

        reverse: -1,

        newClass: {
            name: null,
            count: 0
        },
    },

    ready: function(){
        this.getAllClasses();
    },

    methods: {
        getAllClasses: function(){

            this.loadClasses('/api/admin/classes');
        },

        loadClasses: function(link){

            var self = this;

            $.ajax({
                type: "GET",
                url: link,
                async: false,
                success: function (classes) {
                    self.$set('classes', classes);
                }});

            console.log('load classes...');
        },

        removeClass: function(oneClass){

            this.classes.$remove(oneClass);

            // Send a request to remove class from database
            this.$http.post('/api/admin/classes/delete', {id: oneClass.id});
        },

        addClass: function(){
            var newClass = this.newClass;

            // Add new task to vue model
            this.classes.push(newClass);

            //Send a request to save a new task in database
            this.$http.post('/api/admin/classes/create', {name: newClass.name});

            // Clearing...
            this.newClass = {name: ""};
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

