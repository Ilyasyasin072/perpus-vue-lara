<template>
    <div>
        <vue-html2pdf
            :show-layout="false"
            :float-layout="true"
            :enable-download="true"
            :preview-modal="true"
            :paginate-elements-by-height="1400"
            filename="hee hee"
            :pdf-quality="2"
            :manual-pagination="false"
            pdf-format="a4"
            pdf-orientation="landscape"
            pdf-content-width="800px"
            @hasStartedGeneration="hasStartedGeneration()"
            @hasGenerated="hasGenerated($event)"
            ref="html2Pdf"
        >
            <section slot="pdf-content">
                <!-- PDF Content Here -->
                <div class="container-fluid mt-3">
                    <div class="row">
                        <div class="col-sm-12">
                            <h1 style="text-align: center;">{{ msg }}</h1>
                            <table class="table table-bordered table-stripped">
                                <thead>
                                    <tr>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr v-for="book in books" :key="book.id">
                                        <td>{{ book.judul_buku }}</td>
                                        <td>{{ book.penerbit_buku }}</td>
                                        <td>{{ book.penulis_buku }}</td>
                                        <td>{{ book.tahun_penerbit }}</td>
                                        <td>{{ book.created_at }}</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </section>
        </vue-html2pdf>
        <button @click="generateReport" class="btn btn-sm btn-primary">
            Download Pdf
        </button>
    </div>
</template>

<script>
import VueHtml2pdf from "vue-html2pdf";
export default {
    name: "hello",
    data() {
        return {
            books: [],
            msg: "Welcome to Your Vue.js App"
        };
    },

    created() {
        let uri = this.$baseUrl + "buku";
        this.axios.get(uri).then(response => {
            this.books = response.data.result;
        });
    },
    methods: {
        generateReport() {
            this.$refs.html2Pdf.generatePdf();
        }
        // async beforeDownload({ html2pdf, options, pdfContent }) {
        //     await html2pdf()
        //         .set(options)
        //         .from(pdfContent)
        //         .toPdf()
        //         .get("pdf")
        //         .then(pdf => {
        //             const totalPages = pdf.internal.getNumberOfPages();
        //             for (let i = 1; i <= totalPages; i++) {
        //                 pdf.setPage(i);
        //                 pdf.setFontSize(10);
        //                 pdf.setTextColor(150);
        //                 pdf.text(
        //                     "Page " + i + " of " + totalPages,
        //                     pdf.internal.pageSize.getWidth() * 0.88,
        //                     pdf.internal.pageSize.getHeight() - 0.3
        //                 );
        //             }
        //         })
        //         .save();
        // }
    },
    components: {
        VueHtml2pdf
    }
};
</script>

<!-- Add "scoped" attribute to limit CSS to this component only -->
<style scoped>
h1,
h2 {
    font-weight: normal;
}

ul {
    list-style-type: none;
    padding: 0;
}

li {
    display: inline-block;
    margin: 0 10px;
}

a {
    color: #7db099;
}
</style>
