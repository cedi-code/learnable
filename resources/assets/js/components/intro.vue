<template>
    <div  id="lottie">
        <lottie :options="defaultOptions"  v-on:animCreated="handleAnimation"/>

    </div>

</template>

<script>
    import Lottie from '../../../../node_modules/vue-lottie/src/lottie';
    import * as animationData from '../../datei.json';
    export default {
        name: "intro",
        components: {
            'lottie': Lottie
        },
        data() {
            return {
                defaultOptions: {
                    animationData: animationData,
                    renderer: 'svg',
                    loop: true, /* TODO es geit mues aber no zit achestelle! */
                    autoplay: true
                },
                animationSpeed: 1
            }
        },
        methods: {
            handleAnimation: function (anim) {
                this.anim = anim;
            },

            stop: function () {
                this.anim.stop();
            },

            play: function () {
                this.anim.play();
            },

            pause: function () {
                this.anim.pause();
            },

            onSpeedChange: function () {
                this.anim.setSpeed(this.animationSpeed);
            }
        }
    }
</script>

<style scoped>
#lottie {
    height: 100vh;
    width: 100%;
}
</style>