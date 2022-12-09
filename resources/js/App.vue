<template>
<h1>Hello App</h1>
</template>

<script >
import Home from './components/home.vue';
import About from './components/About.vue';
export default {
    components: {Home,About},
    mounted() {
        console.log('Component mounted.')
    }
}
</script>
<style>

</style>



