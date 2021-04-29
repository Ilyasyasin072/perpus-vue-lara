<template>
    <div class="container-fluid mt-5">
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
        <modal name="show_modal" :width="700" :height="1000">
            <div class="container mt-3">
                <div class="list-group">
                    <a
                        href="#"
                        class="list-group-item list-group-item-action flex-column align-items-start active"
                    >
                        <div class="d-flex w-100 justify-content-between">
                            <h5 class="mb-1">{{ showId.judul_buku }}</h5>
                            <small>{{ showId.kode_buku }}</small>
                        </div>
                        <p class="mb-1">
                            {{ showId.desc_buku }}
                        </p>
                        <small> {{ showId.penebit_buku }}</small>
                    </a>
                </div>
                <div class="container mt-3">
                    <div class="form-group">
                        <label for="">Kode Buku</label>
                        <input
                            type="text"
                            v-model="showId.kode_buku"
                            placeholder="Kode Buku"
                            autocomplete="off"
                            class="form-control"
                            readonly
                        />
                    </div>
                    <div class="form-group">
                        <label for="">Kode Buku</label>
                        <input
                            type="text"
                            v-model="showId.judul_buku"
                            placeholder="Judul Buku"
                            autocomplete="off"
                            class="form-control"
                        />
                    </div>
                     <div class="form-group">
                        <label for="">Kode Buku</label>
                        <input
                            type="text"
                            v-model="showId.penerbit_buku"
                            placeholder="Judul Buku"
                            autocomplete="off"
                            class="form-control"
                        />
                    </div>
                     <div class="form-group">
                        <label for="">Kode Buku</label>
                        <input
                            type="text"
                            v-model="showId.penulis_buku"
                            placeholder="Judul Buku"
                            autocomplete="off"
                            class="form-control"
                        />
                    </div>
                     <div class="form-group">
                        <label for="">Kode Buku</label>
                        <input
                            type="text"
                            v-model="showId.stock"
                            placeholder="Judul Buku"
                            autocomplete="off"
                            class="form-control"
                        />
                    </div>
                     <div class="form-group">
                        <label for="">Kode Buku</label>
                        <input
                            type="text"
                            v-model="showId.tahun_penerbit"
                            placeholder="Judul Buku"
                            autocomplete="off"
                            class="form-control"
                        />
                    </div>
                     <div class="form-group">
                        <label for="">Kode Buku</label>
                        <input
                            type="text"
                            v-model="showId.images"
                            placeholder="Judul Buku"
                            autocomplete="off"
                            class="form-control"
                        />
                    </div>
                     <div class="form-group">
                        <label for="">Kode Buku</label>
                        <input
                            type="text"
                            v-model="showId.desc_buku"
                            placeholder="Judul Buku"
                            autocomplete="off"
                            class="form-control"
                        />
                    </div>
                    <button class="btn" @click="updateBook">
                        Update
                    </button>
                </div>
            </div>
        </modal>
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
            rows: [],
            showId: {
                id_ :null,
                kode_buku: null,
                judul_buku: null,
                penerbit_buku: null,
                penulis_buku: null,
                stock: null,
                tahun_penerbit: null,
                images: null,
                desc_buku: null
            }
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
            this.$modal.show("show_modal");
            this.showId.kode_buku = params.row.kode_buku;
            this.showId.judul_buku = params.row.judul_buku;
            this.showId.penerbit_buku = params.row.penerbit_buku;
            this.showId.penulis_buku = params.row.penulis_buku;
            this.showId.stock = params.row.stock;
            this.showId.tahun_penerbit = params.row.tahun_penerbit;
            this.showId.images = params.row.images;
            this.showId.desc_buku = params.row.desc_buku;
            this.showId.id_ = params.row.id;
        },
        updateBook() {
            if (confirm("Do you really want to update ?")) {
                this.$modal.hide("show_modal");
                const formData = {
                    kode_buku: this.showId.kode_buku,
                    judul_buku: this.showId.judul_buku,
                    penerbit_buku: this.showId.penerbit_buku,
                    penulis_buku: this.showId.penulis_buku,
                    stock: this.showId.stock,
                    tahun_penerbit: this.showId.tahun_penerbit,
                    // images: this.showId.images,
                    desc_buku: this.showId.desc_buku
                };
                let uri = this.$baseUrl + "buku";
                this.axios.put(uri + '/update/' + this.showId.id_, formData).then((res) => {
                    console.log(res);
                })
            }
            return false;
        }
    }
};
</script>
