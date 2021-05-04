<template>
    <div>
        <h1>petugas</h1>
        <div v-for="item in employees" :key="item.id">
            <h5>{{ item.alamat_petugas }}</h5>
        </div>
    </div>
</template>

<script>
export default {
    data() {
        return {
        }
    },

    computed: {
        employees() {
            return this.$store.state.employees
        },

        posts() {
      return this.$store.state.posts;
    }
    },
    mounted() {
        this.$store.dispatch('getEmployees')
    }
}
</script>
