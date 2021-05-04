<template>
    <div>
        <h1>Anggota Mahasiswa</h1>
        <div v-for="item in employees" :key="item.id">
            <h5>{{ item.alamat_petugas }}</h5>
        </div>
    </div>
</template>

<script>
export default {
    data() {
        return {};
    },

    computed: {
        employees() {
            console.log(this.$store.getters)
            return this.$store.getters.allEmployees;
        },
    },

    mounted() {
        this.$store.dispatch("getEmployees");
    }
};
</script>
