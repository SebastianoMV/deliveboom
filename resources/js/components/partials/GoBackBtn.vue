<template>
    <button @click="goBack()">
        <i class="fa-solid fa-arrow-left"></i>
    </button>
</template>

<script>
export default {
    name: "GoBackBtn",
    methods: {
        goBack(){
            return this.$router.go(-1);
        }
    }
}
</script>

<style lang="scss" scoped>
button{
    border: none;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 23px;
    color: white;
    background-color: #4E54C8;
    width: 37px;
    height: 37px;
    border-radius: 7px;
    transition: .2s all;
    &:hover{
        background-color: #3f439b;
    }
    &:active{
        background-color: #dd3546;
    }
}
</style>
