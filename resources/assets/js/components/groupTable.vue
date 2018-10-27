<template>
    <b-table
            :data="isEmpty ? [] : content" class="w100"
            >

        <template slot-scope="props">

            <b-table-column field="last_name" label="Id" width="60">
                {{ props.row.userdata.username }}
            </b-table-column>

            <b-table-column field="first_name" label="Name">
                {{ props.row.userdata.last_name }} {{ props.row.userdata.first_name }}
            </b-table-column>



        </template>

        <template slot="empty">
            <section class="section">
                <div class="content has-text-grey has-text-centered">

                    <p>Nothing here.</p>
                </div>
            </section>
        </template>
        <template slot="footer" >
            <div class="has-text-right ">

                <a class="button is-danger" >
                    <b-icon icon="minus"></b-icon>
                    <span>Remove Members</span>
                </a>

                <a class="button is-success" >
                    <b-icon icon="plus"></b-icon>
                    <span>Add Members</span>
                </a>



            </div>
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