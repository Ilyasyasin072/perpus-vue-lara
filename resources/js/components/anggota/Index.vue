<template>
    <div class="container-fluid mt-5">
        <!-- <div v-for="item in members" :key="item.id">
            <table class="table table-bordered">
                <thead>
                    <th>Anggota</th>
                </thead>
                <tbody>
                    <tr>
                        <td>
                            <h6>{{ item.nama_anggota }}</h6>
                            <p>{{ item.no_tlp_anggota }}</p>
                            <p>{{ item.jurusan.nama_jurusan }}</p>
                            <p>{{ item.jurusan.prodi }}</p>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div> -->
        <div class="form-group">
            <router-link to="/member/create">Member Create</router-link>
        </div>
        <vue-good-table
            :columns="columns"
            :rows="rows"
            :search-options="{
                enabled: true
            }"
            theme="polar-bear"
            :pagination-options="{
                enabled: true,
                mode: 'records',
                perPage: 10,
                position: 'bottom',
                perPageDropdown: [5, 10, 15, 20],
                dropdownAllowAll: true,
                setCurrentPage: 2,
                nextLabel: 'next',
                prevLabel: 'prev',
                rowsPerPageLabel: 'Rows per page',
                ofLabel: 'of',
                pageLabel: 'page', // for 'pages' mode
                allLabel: 'All',
                infoFn: params => `Page ${params.firstRecordOnPage}`
            }"
        ></vue-good-table>
    </div>
</template>

<script>
import { mapGetters, mapActions } from "vuex";

import { VueGoodTable } from "vue-good-table";
export default {
    data() {
        return {
            columns: [
                {
                    label: "Name",
                    field: "nama_anggota"
                },
                {
                    label: "Name",
                    field: "jurusan.nama_jurusan"
                },
                {
                    label: "Name",
                    field: "jurusan.prodi"
                },
                {
                    label: "Name",
                    field: "no_tlp_anggota"
                }
            ]
        };
    },
    components: {
        VueGoodTable
    },
    // computed: {
    //     members() {
    //         return this.$store.getters.allMembers;
    //     }
    // },
    computed: mapGetters({
        members: "allMembers",
        rows: "allMembers"
    }),
    mounted() {
        this.$store.dispatch("getMembers");
    }
};
</script>
