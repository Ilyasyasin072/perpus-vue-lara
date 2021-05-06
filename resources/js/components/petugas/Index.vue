<template>
    <div class="container-fluid mt-5">
        <div class="row">
            <div class="col-sm-12 col-xs-12 col-md-12">
                <h1><strong>Anggota</strong>&nbsp;Petugas</h1>
                <div class="form-group">
                                    <button style="float: right">Tambah Petugas</button>
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
        </div>
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
                    field: "nama_petugas"
                },
                 {
                    label: "Jabatan",
                    field: "jabatan_petugas"
                },
                 {
                    label: "Alamat",
                    field: "alamat_petugas"
                },
                 {
                    label: "Handphone",
                    field: "no_tlp_petugas"
                },
                 {
                    label: "date",
                    field: "created_at"
                }
            ]
        };
    },
    components: {
        VueGoodTable
    },

    computed: mapGetters({
        rows: "allEmployees"
    }),

    // computed: {
    //     employees() {
    //         console.log(this.$store.getters);
    //         return this.$store.getters.allEmployees;
    //     }
    // },

    mounted() {
        this.$store.dispatch("getEmployees");
    }
};
</script>
