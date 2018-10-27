<template>
    <section>

    <b-table :data="content"
             :striped="true"
             :hoverable="true"
    >
        <template slot-scope="props">
            <b-table-column field="id" label="db" :visible="false">
                {{ props.row.id }}
            </b-table-column>
            <b-table-column field="username" label="ID" :visible="showId" width="50"  >
                {{ props.row.username }}
            </b-table-column>

            <b-table-column field="first_name" label="First Name" sortable>
                {{ props.row.first_name }}
            </b-table-column>

            <b-table-column field="last_name" label="Last Name" sortable>
                {{ props.row.last_name }}
            </b-table-column>
            <b-table-column field="email" label="E-Mail" >
                <a v-bind:href="'mailto:'+props.row.email">{{ props.row.email }}</a>
            </b-table-column>
            <b-table-column label="Edit" v-if="isAdmin" width="50">
                <a v-bind:href="'edit/user/'+props.row.id">
                    <span class="icon is-medium">
                         <span class="mdi-stack">
                              <i class="mdi mdi mdi-24px mdi-pencil"></i>
                         </span>
                    </span>
                </a>
            </b-table-column>
            <b-table-column label="Delete" v-if="isAdmin" width="50">
                <a @click="confirmCustomDelete(props.row.first_name,props.row.last_name)">
                    <span class="icon is-medium">
                         <span class="mdi-stack">
                              <i class="mdi mdi mdi-24px mdi-delete"></i>
                         </span>
                    </span>
                </a>
            </b-table-column>
        </template>
    </b-table>
    </section>

</template>

<script>
    export default {
        data() {
            return {

                columns: [
                    {
                        field: 'id',
                        label: 'db',
                        visible: false
                    },
                    {
                        field: 'username',
                        label: 'ID',
                        width: '50',

                    },
                    {
                        field: 'first_name',
                        label: 'First Name',
                    },
                    {
                        field: 'last_name',
                        label: 'Last Name',
                    },
                    {
                        field: 'email',
                        label: 'E-Mail',

                    },

                ]
            }
        },
        props: {
            isAdmin: {

                default: false
            },
            showId: {
                type: Boolean,
                default: true

            },
            content: {
                type: Array

            },
        },
        methods: {
            confirmCustomDelete(firstname,lastname) {
                this.$dialog.confirm({
                    title: 'Deleting account',
                    message: 'Are you sure you want to <b>delete</b> ' + firstname + ' ' + lastname +' account? This action cannot be undone.',
                    confirmText: 'Delete Account',
                    type: 'is-danger',
                    hasIcon: true,
                    onConfirm: () => this.$toast.open('This function is in development!')
                })
            }
        }
    }
</script>

<style scoped>

</style>