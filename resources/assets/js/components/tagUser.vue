<template>
    <section>
        <b-field label="Add Users">
            <b-taginput
                    v-model="tags"
                    :data="filteredTags"
                    autocomplete
                    field="last_name"
                    icon="label"
                    placeholder="Add a User"
                    @typing="getFilteredTags">
                <template slot-scope="props">
                    <strong>{{props.option.username}}</strong>: {{props.option.first_name}} {{props.option.last_name}}
                </template>
                <template slot="empty">
                    There are no items
                </template>
            </b-taginput>
        </b-field>
        <!-- TODO bei den tags nur ein Array von Ids zu value geben! -->
        <input type="hidden" name="tags" v-bind:value="tags"/>
    </section>
</template>

<script>


    export default {
        data() {
            return {
                filteredTags: this.users,
                isSelectOnly: false,

            }
        },
        props: {
            users: {
                type: Array,
            },
            tags: {
                type: Array,
            }
        },
        mounted() {
            console.log(this.users[0].userdata);
        },
        methods: {

            getFilteredTags(text) {
                this.filteredTags = this.users.filter((option) => {
                    return option.first_name
                        .toString()
                        .toLowerCase()
                        .indexOf(text.toLowerCase()) >= 0
                })
            }
        }
    }
</script>