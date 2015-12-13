Vue.http.headers.common['X-CSRF-TOKEN'] = document.querySelector('#token').getAttribute('content');

new Vue({
    el: '#tasks',

    data: {
        newTask: {
            name: null,
            deadline: null,
            progress: null
        },

        editTask: null,
    },

    ready: function() {
        this.fetchTasks();
    },

    methods: {
        addTask: function() {
            var newTask = this.newTask;

            // Add new task to vue model
            this.tasks.push(newTask);

            //Send a request to save a new task in database
            this.$http.post('api/tasks/create', newTask);

            // Clearing...
            this.newTask = {name: "", deadline: ""};
        },

        taskDone: function(task) {
            // Mark this task as done
            task.progress = "done";

            // Send a request to change the data in database
            this.$http.post('api/tasks/done', {id: task.id});
        },

        taskRemove: function (task) {
            // Remove task from vue model
            this.tasks.$remove(task);

            // Send a request to remove a task from database
            this.$http.post('api/tasks/remove', {id: task.id});
        },

        taskEdit: function (task, editTask) {
            task = editTask;

            this.editTask = {};

            this.$http.post('api/tasks/edit', task);
        },

        fetchTasks: function() {
            $("div.todo-list").addClass("loading");

            this.$http.get('/api/tasks/all', function(tasks)
            {
                this.$set('tasks',tasks);
            });

            setTimeout(function(){
                $("div.todo-list").removeClass("loading");
            }, 2000);
        },

    }
});