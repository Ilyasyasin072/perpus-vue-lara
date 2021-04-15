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
                            theme="polar-bear"
                            @on-row-click="onRowClick"
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
                                infoFn: params =>
                                    `my own page ${params.firstRecordOnPage}`
                            }"
                        />
                    </div>
                </div>
            </div>
        </div>
         <modal name="example">This is an example</modal>
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
                    field: "kode_buku",
                    filterOptions: {
                        styleClass: "class1", // class to be added to the parent th element
                        enabled: true, // enable filter for this column
                        trigger: "enter" //only trigger on enter not on keyup
                    }
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
        },
        onRowClick(params) {
            console.log(params.row.kode_buku);
            this.$modal.show('example')
            // params.row - row object
            // params.pageIndex - index of this row on the current page.
            // params.selected - if selection is enabled this argument
            // indicates selected or not
            // params.event - click event
        }
    }
};
</script>
