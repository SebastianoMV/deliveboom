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
import HomeComp from './components/pages/HomeComp.vue'


export default {
    components: { HeaderComp, FooterComp, HomeComp},
    name: 'App'
}
</script>

<style lang="scss">
    @import'~bootstrap/dist/css/bootstrap.css';
</style>
