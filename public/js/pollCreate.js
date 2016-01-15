new Vue({
    el: '#pollCreate',

    data: {
        range:{

        },

        question: {
            id:1,
            answers:[
                1,2,3,4
            ]
        }
    },

    ready: function(){
        this.setFirst();
    },

    methods: {
        setFirst: function(){
            this.$set('range', [1,2]);
        },

        add: function(){
            this.question.id = this.question.id + 1;

            var id = this.question.id;
            this.range.push(id);
        },

        remove: function(){
            this.range.pop();
        },
    }
});
