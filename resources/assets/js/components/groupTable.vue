<template>
    <b-table
            :data="isEmpty ? [] : content" class="w100"
            >

        <template slot-scope="props">

            <b-table-column field="last_name" label="Id" width="60">
                {{ props.row.username }}
            </b-table-column>

            <b-table-column field="first_name" label="Name">
                {{ props.row.last_name }} {{ props.row.first_name }}
            </b-table-column>



        </template>

        <template slot="empty">
            <section class="section">
                <div class="content has-text-grey has-text-centered">

                    <p>Nothing here.</p>
                </div>
            </section>
        </template>
    </b-table>
</template>

<script>

    export default {
        name: "group-table",
        props: {
            content: {
                type: Array

            },
            isEmpty: false,
        }
    }
</script>

<style scoped>
.w100 {
    width: 100%;
}
</style>