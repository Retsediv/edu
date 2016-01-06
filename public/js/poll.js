Vue.http.headers.common['X-CSRF-TOKEN'] = document.querySelector('#token').getAttribute('content');

new Vue({
    el: '#poll',

    data: {
        questions: {

        },

        answers: {

        },

        currentQuestion: {

        },

        currentAnswer: {

        },

        showPoll: false,
        count: 0, // Кліки по кнопці
        last: 0, // К-сть питань
        good: 0, // К-сть правильних відповідей
        bad: 0,  // К-сть неправильних відповідей
    },

    ready: function(){
        this.getTest();
    },

    methods: {
        getTest: function(){
            var self = this,
            id = $('#test-id').val();

            $.ajax({
                type: "GET",
                url: '/api/poll/' + id + '/questions' ,
                async: false,
                success: function (questions) {
                    self.$set('questions', questions);
                }});

            this.questions = this.shuffle(this.questions);

                $.ajax({
                    type: "GET",
                    url: '/api/poll/' + id + '/answers',
                    async: false,
                    success: function (answers) {
                        self.$set('answers', answers);
                    }});

            this.last = this.questions.length;

        },

        accept: function () {
            this.count++;
            var accept = document.getElementById("accept");

            var inputs;
            if (this.count / 2 < this.last) { // Питання ще є...
                if (this.count % 2 == 1) { // Показуємо яка правильна відповідь, а яка ні
                    accept.innerHTML = "Далі";

                    inputs = document.getElementsByName("answer");

                    for (var i = 0; i < inputs.length; i++) {
                        if(this.currentAnswer[i].correct == 1){
                            inputs[i].parentNode.classList.add("success");
                        }

                        if (inputs[i].checked) {
                            if (this.currentAnswer[i].correct == 1) { // Відповідь правильна
                                inputs[i].parentNode.classList.add("success");
                                this.good++;
                            }
                            else {
                                inputs[i].parentNode.classList.add("wrong");  // Позначаємо її як невірну
                                this.bad++;
                            }
                        }
                    }


                } else { // Перехід до іншого питання
                    accept.innerHTML = "Прийняти";
                    this.update();
                }
            }
            else { // Питань вже не залишилось, підбиваємо підсумки
                alert(
                    " Вітаємо з закінченням тестування! \n" +
                    " Кількість правильних відповідей - " + this.good + "\n" +
                    " Кількість неправильних відповідей - " + this.bad + "\n" +
                    " У процентному співвідношення правильних відповідей - " + (this.good/(this.good+this.bad))*100  + "%");
            }
        },

        update: function(){
            this.showPoll = true;
            var question = $('.question');


            this.currentQuestion = this.questions.shift();
            this.currentAnswer = this.answers[this.currentQuestion.id];

        },

        shuffle: function(array){
            for (var i = array.length - 1; i > 0; i--) {
                var num = Math.floor(Math.random() * (i + 1));
                var d = array[num];
                array[num] = array[i];
                array[i] = d;
            }
            return array;
        }

    }
});
