<template>
    <div class="tile">
        <div class="tile is-parent is-vertical">
            <article class="tile is-child notification is-primary">
                <p class="title"><slot name="title"></slot></p>
                <p class="subtitle"><slot name="under-title"></slot></p>
            </article>
        </div>

    </div>
</template>

<script>
    export default {
        name: "user-tile"
    }
</script>

<style scoped>

</style>