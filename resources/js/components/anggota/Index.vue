<template>
    <div class="container-fluid mt-5">
        <h1>Anggota</h1>
        <div v-for="item in members" :key="item.id">
            <ul>
                <li>
                    <h6>{{ item.nama_anggota }}</h6>
                    <p>{{ item.no_tlp_anggota }}</p>
                    <p>{{ item.jurusan.nama_jurusan }}</p>
                    <p>{{ item.jurusan.prodi }}</p>
                </li>
            </ul>
        </div>
    </div>
</template>

<script>
export default {
    data() {
        return {};
    },

    computed: {
        members() {
            return this.$store.getters.allMembers;
        }
    },

    mounted() {
        this.$store.dispatch("getMembers");
    }
};
</script>
