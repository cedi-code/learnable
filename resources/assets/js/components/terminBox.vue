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
                <a v-if="isCreator" class="card-footer-item">Edit</a>
                <a v-if="isCreator" class="card-footer-item">Delete</a>
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
            }
        }
    }
</script>

<style scoped>
    .content p:not(:last-child) {
        margin-bottom: 0;
    }
</style>