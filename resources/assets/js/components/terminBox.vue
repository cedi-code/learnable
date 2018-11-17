<template>
    <section>

        <b-collapse class="card" v-on:open="onOpen()" :open="false">
            <div slot="trigger" slot-scope="props" class="card-header">
                <div class="card-header-icon">

                </div>
                <p class="card-header-title">

                    {{title}}
                </p>

                <a class="card-header-icon">
                    <b-icon
                            :icon="props.open ? 'menu-down' : 'menu-up'">
                    </b-icon>
                </a>
            </div>
            <div class="card-content" >
                <div class="content">
                    <nav class="level">
                        <div class="level-item has-text-centered">
                            <div>
                                <p class="heading">Art</p>
                                <p  ><slot name="eventtype"></slot></p>
                            </div>
                        </div>
                        <div class="level-item has-text-centered">
                            <div>
                                <p class="heading">Fach</p>
                                <p ><slot name="lessontype"></slot></p>
                            </div>
                        </div>
                        <div class="level-item has-text-centered">
                            <div>
                                <p class="heading">Datum</p>
                                <p ><slot name="date"></slot></p>
                            </div>
                        </div>
                        <div class="level-item has-text-centered">
                            <div>
                                <p class="heading">Ersteller</p>
                                <p ><slot name="creator"></slot></p>
                            </div>
                        </div>
                    </nav>
                    <div class="box" >
                        <slot name="descr"></slot>
                    </div>

                    <br/>
                    <div class="box" v-if="isCreator">
                        <h6>Mitglieder:</h6>
                        <group-box  v-if="isCreator"  :content="members" ></group-box>
                        <b-loading  :active.sync="isLoading" :is-full-page="isFullPage" ></b-loading>
                    </div>
                </div>



            </div>
            <footer class="card-footer">
                <a class="card-footer-item">Stundenplan</a>
                <a class="card-footer-item" v-if="!isCreator">Entfernen</a>

                <a  v-if="isCreator" :href="'events/edit/' + this.id" class="card-footer-item">Edit</a>

                <form v-if="isCreator" method="POST" id="deleteFrom" class="card-footer-item" :action="'/events/delete/' + this.id">
                    <input type="hidden" name="_token" :value="csrf">
                    <a  @click="confirmCustomDelete"   >Delete</a>
                </form>

            </footer>
        </b-collapse>

    </section>
</template>

<script>


    export default {
        name: "termin-box",
        data () {
            return {
                showDetail : false,
                csrf: document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                members: [],
                isLoading: false,
                isFullPage: false,
            }
        },
        props: {
            title: {
                default: 'Event',
                type: String

            },
            isCreator: {
                default: false,
                type: Boolean
            },
            id: {
                type: Number
            },

        },
        methods: {
            onOpen() {
                this.isLoading = true
                if(this.isCreator) {

                    axios.get('/eventusers/' + this.id)
                        .then((response) => {
                            this.members = response.data
                        })

                }
                setTimeout(() => {
                    this.isLoading = false
                }, 100)

            },
            confirmCustomDelete() {
                this.$dialog.confirm({
                    title: 'Errinnerung Löschen',
                    message: 'Are you sure you want to <b>delete</b> this event?',
                    confirmText: 'Löschen',
                    type: 'is-danger',
                    onConfirm: () => this.deleteSubmit()
                })
            },
            deleteSubmit() {
                document.getElementById("deleteFrom").submit();
                this.$toast.open('Errinnerung wird gelöscht...')

            }

        }
    }
</script>

<style scoped>
    .content p:not(:last-child) {
        margin-bottom: 0;
    }

</style>