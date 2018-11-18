<template>
    <div class="userTile">
            <article class="tile media is-child notification userTile ">
                <p class="title"><slot name="title"></slot></p>
                <p class="subtitle"><slot name="under-title"></slot></p>

                  <a href="/changePW" class="icon is-medium" style=" cursor: pointer">
                         <span class="mdi-stack">
                              <i class="mdi mdi-24px mdi-lock-reset"></i>
                         </span>
                    </a>
            </article>

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
.userTile {
    background-color: #C0495E;
    color: white;
}
</style>