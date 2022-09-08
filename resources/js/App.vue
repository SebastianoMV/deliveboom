<template>
    <div>
        <header-comp/>
        <router-view></router-view>
        <footer-comp/>
    </div>
</template>
<script>
import HeaderComp from './components/partials/HeaderComp.vue'
import FooterComp from './components/partials/FooterComp.vue'

export default {
    components: { HeaderComp, FooterComp},
    name: 'App'
}
</script>
<style lang="scss">
@import'~bootstrap/dist/css/bootstrap.css';
.fluid-container{
    transition: .2s all;
}
</style>
