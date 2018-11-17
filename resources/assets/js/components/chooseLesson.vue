<template>
    <section>


        <b-field label="Select a date"  >
            <b-datepicker
                    v-on:input="showLessons()"
                    v-model="datee"
                    placeholder="Type or select a date..."
                    icon="calendar-today"
                    :min-date="minDate" required>
            </b-datepicker>

        </b-field>
        <b-modal :active.sync="isModalActive">
            <div class="container">
                <div class="notification">
                    <h2 class="subtitle">
                        Wählen Sie eine Lektion aus:
                    </h2>
                    <div class="columns is-mobile" id="listebox">
                        <div class="column is-narrow" id="liste" >
                            <article class="media box lesson"  v-for="lesson in content" v-on:click="chooseLesson(lesson.id, lesson.start)">
                                <figure class="media-left">
                                    {{lesson.start + "-"}}<br>
                                    {{lesson.end}}
                                </figure>
                                <div class="media-content">
                                    {{lesson.course}}
                                </div>
                            </article>
                        </div>
                    </div>
                </div>
            </div>
            <b-loading  :active.sync="isLoading" ></b-loading>
        </b-modal>
        <input type="hidden" name="lesson" v-bind:value="selectedLesson">
    </section>

</template>

<script>
    export default {
        name: "choose-lesson",
        data() {
            return {
                datee: null,
                isModalActive: false,
                isLoading: false,
                content: [],
                selectedLesson: null,
                minDate: new Date()
            }
        },
        methods: {
            showLessons: function() {
                if(this.datee != null) {
                    this.isModalActive = true
                    this.isLoading = true
                    var phpDate = this.datee.getDate() + "-" + (this.datee.getMonth()+1) + "-" + this.datee.getFullYear();
                    axios.get('/lessonday/'+ phpDate)
                        .then((response) => {
                            for(var i = 0; i < response.data.length; i++) {
                                this.content[i] = JSON.parse(response.data[i]);
                            }
                            this.selectedLesson = this.content[0].id

                        })
                    setTimeout(() => {
                        this.isLoading = false
                    }, 1 * 1000)


                }
            },
            chooseLesson: function (id,start) {

                this.selectedLesson = id
                this.isModalActive = false;

            }
        }
    }
</script>

<style scoped>
#listebox {
    padding: 20px;
}
#liste {
    width: 50%;
}
.lesson {
    width: 80%;
    padding: 5%;
    overflow: inherit;

    }
.lesson:hover {
   background-color: #6638C0;
    color:  #E7CBE7;
    cursor: pointer;
}

@media (max-width: 1000px) {
    #liste {
        width: 100%;
    }
}
</style>