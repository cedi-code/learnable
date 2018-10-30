<template>
    <li class="navbar-item">
        <a @click="isImageModalActive = true"> Gruppe Erstellen</a>

        <b-modal :active.sync="isImageModalActive">
            <div class="card">
                <div class="card-content">
                    <div class="columns">
                        <div class="column">
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
                isImageModalActive: false
            }
        },
        mounted() {

        }
    }
</script>

<style scoped>

</style>