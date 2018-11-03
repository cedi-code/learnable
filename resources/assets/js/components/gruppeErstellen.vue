<template>
    <li class="navbar-item">
        <a @click="onModal()"> Gruppe Erstellen</a>

        <b-modal :active.sync="isImageModalActive">
            <div class="card">
                <div class="card-content">
                    <div class="columns" v-if="decide">
                        <div class="column" v-on:click="decide = false">
                            <b-icon
                                    icon="account-multiple"
                                    size="is-large"
                                    type="is-primary">
                            </b-icon>
                            <h3>Bestehnder Termin auswählen</h3>
                        </div>
                        <div class="column">
                            <b-icon
                                    icon="account-multiple-plus"
                                    size="is-large"
                                    type="is-primary">
                            </b-icon>
                            <h3>Neuer Termin erstellen</h3>
                        </div>
                    </div>

                    <b-table v-if="!decide"
                            :data="isEmpty ? [] : content" class="w100"
                             :hoverable="true"
                    >

                        <template slot-scope="props">
                            <a v-bind:href="'/events/edit/' + props.row.id">


                            <b-table-column field="lesson" label="Datum">
                                {{ props.row.lesson }}
                            </b-table-column>

                            <b-table-column field="title" >
                                {{ props.row.title }}
                            </b-table-column>



                            </a>



                        </template>

                        <template slot="empty">
                            <section class="section">
                                <div class="content has-text-grey has-text-centered">
                                    <p>
                                        <b-icon
                                                icon="emoticon-sad"
                                                size="is-large">
                                        </b-icon>
                                    </p>
                                    <p>Keine eigenen Errinerungen gefunden</p>
                                </div>
                            </section>
                        </template>
                    </b-table>
                </div>
            </div>
        </b-modal>

    </li>
</template>

<script>
    export default {
        name: "gruppe-erstellen",
        data() {
            return {
                isImageModalActive: false,
                decide: true,
                content: []
            }
        },
        methods: {
          onModal: function () {
              this.isImageModalActive = true
              axios.get('/eventlist/')
                  .then((response) => {
                      for(var i = 0; i < response.data.length; i++) {
                          this.content[i] = JSON.parse(response.data);
                      }

                  })
          }


        },
        props: {

            isEmpty: false,
        }
    }
</script>

<style scoped>

</style>