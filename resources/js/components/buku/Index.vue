<template>
    <div class="container mt-5">
        <div class="row">
            <div class="col-sm">
                <div class="card">
                    <div class="card-header">
                        Management Buku
                    </div>
                    <div class="card-body">
                        <div class="form-group mb-2">
                            <router-link :to="{ name: 'books.create' }"
                                ><a
                                    class="btn btn-sm btn-primary"
                                    href="#"
                                    tabindex="-1"
                                    >Upload Book</a
                                ></router-link
                            >
                        </div>
                        <vue-good-table
                            :columns="columns"
                            :rows="rows"
                            :search-options="{
                                enabled: true
                            }"
                            :pagination-options="{
                                enabled: true,
                                mode: 'records',
                                perPage: 5,
                                position: 'bottom',
                                perPageDropdown: [3, 7, 9],
                                dropdownAllowAll: true,
                                setCurrentPage: 2,
                                nextLabel: 'next',
                                prevLabel: 'prev',
                                rowsPerPageLabel: 'Rows per page',
                                ofLabel: 'of',
                                pageLabel: 'page', // for 'pages' mode
                                allLabel: 'All',
                                infoFn: params =>
                                    `my own page ${params.firstRecordOnPage}`
                            }"
                        />
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import { VueGoodTable } from "vue-good-table";
export default {
    data() {
        return {
            books: [],
            columns: [
                {
                    label: "Name",
                    field: "kode_buku"
                },
                {
                    label: "Age",
                    field: "penerbit_buku",
                    type: "number"
                },
                {
                    label: "Age",
                    field: "penerbit_buku",
                    type: "number"
                },
                {
                    label: "Percent",
                    field: "penulis_buku"
                },
                {
                    label: "Percent",
                    field: "stock"
                },
                {
                    label: "Percent",
                    field: "tahun_penerbit"
                }
            ],
            rows: []
        };
    },

    components: {
        VueGoodTable
    },

    mounted() {
        this.getBooks();
    },

    methods: {
        getBooks: function() {
            let uri = this.$baseUrl + "buku";
            this.axios.get(uri).then(response => {
                console.log(response.data.result);
                this.books = response.data.result;
                this.rows = response.data.result;
            });
        }
    }
};
</script>
