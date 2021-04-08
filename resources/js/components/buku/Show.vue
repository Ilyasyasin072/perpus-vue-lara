<template>
    <div class="container mt-3">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div class="pull-left">
                            <a
                                @click.prevent="backDashboard()"
                                class="btn-sm btn btn-show"
                                style="background-color: #fbb114; color: white;"
                                >Dashboard</a
                            >
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-sm-6" style="text-align: center;">
                                <img
                                    :src="
                                        'https://cdn.pixabay.com/photo/2016/09/16/09/20/books-1673578_1280.png'
                                    "
                                    width="200px"
                                    height="200px"
                                    alt=""
                                />
                            </div>
                            <div class="col-sm-6">
                                <div class="list-group">
                                    <a
                                        href="#"
                                        class="list-group-item list-group-item-action flex-column align-items-start"
                                        v-if="details.buku"
                                    >
                                        <div
                                            class="d-flex w-100 justify-content-between"
                                        >
                                            <h5 class="mb-1">
                                                {{ details.buku.judul_buku }}
                                            </h5>
                                            <small class="text-muted">{{
                                                details.buku.penerbit_buku
                                            }}</small>
                                        </div>
                                        <p class="mb-1">
                                            {{ details.buku.penulis_buku }}
                                        </p>
                                        <small class="text-muted">
                                            {{
                                                details.buku.tahun_penerbit
                                            }}</small
                                        >
                                    </a>
                                    <a v-else>Detail tidak ada</a>
                                </div>
                            </div>
                            <div class="col-sm-12"  v-if="details">
                                <ul class="list-group">
                                    <li
                                        class="list-group-item d-flex justify-content-between align-items-center"
                                    >
                                        {{ details.nama_rak }}
                                        <span
                                            class="badge badge-primary badge-pill"
                                            >{{ details.lokasi_rak }}</span
                                        >
                                    </li>
                                </ul>
                            </div>
                            <div v-else>Rak Tidak Ada</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    data() {
        return {
            details: {}
        };
    },
    created() {
        let uri = this.$baseUrl + `rak/show/${this.$route.params.id}`;
        this.axios.get(uri).then(response => {
            this.details = response.data.result[0];
        });
    },
    methods: {
        backDashboard: function(e) {
            this.$router.push({ name: "dashboard" });
        }
    }
};
</script>
