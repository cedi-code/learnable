<template>
    <section>

        <b-collapse class="card" :open="false">
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
                    <slot name="descr"></slot>
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
                csrf: document.querySelector('meta[name="csrf-token"]').getAttribute('content')
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
            }
        },
        methods: {
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