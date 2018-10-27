<template>
    <div class="tile">
        <div class="tile is-parent is-vertical">
            <article class="tile media is-child notification is-primary">
                <p class="title"><slot name="title"></slot></p>
                <p class="subtitle"><slot name="under-title"></slot></p>

                  <a href="/changePW" class="icon is-medium" style="float: right; cursor: pointer">
                         <span class="mdi-stack">
                              <i class="mdi mdi-24px mdi-lock-reset"></i>
                         </span>
                    </a>
            </article>

        </div>

    </div>
</template>

<script>
    export default {
        name: "user-tile",
        mounted() {
            if(this.changePw)
            {
                console.log(this.changePw);
                this.$snackbar.open(`Passwort wurde erfolgreich geändert`)
            }
        },
        props: {
            changePw: {
                default: false,
                type: Boolean
            }
        }
    }
</script>

<style scoped>

</style>