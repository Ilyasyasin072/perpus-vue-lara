<template>
    <div class="container-fluid mt-5">
        <h1>Anggota</h1>
        <div v-for="item in members" :key="item.id">
            <h6>{{ item.id }}</h6>
        </div>
    </div>
</template>

<script>
export default {
    data(){
        return {}
    },

    computed: {
        members() {
            return this.$store.getters.allMembers;
        }
    },

    mounted() {
        this.$store.dispatch('getMembers')
    }
};
</script>
